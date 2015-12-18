<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
    * Responds to requests to GET /activities
    */
    protected $days_for_checkbox = Array(1 => 'Su', 2=> 'M', 3=> 'Tu', 4 => 'We', 5 => 'Th', 6 => 'F', 7 => 'Sa');

    public function getIndex()
    {
        return 'List all of my activities';
    }

    /**
    * Responds to requests to GET /activities/create
    */
    public function getCreate()
    {
        $groupModel = new \App\Group();
        $groups_for_dropdown = $groupModel->getGroupsForDropdown();
        # Get all the possible tags so we can include them with checkboxes in the view

        return view('activities.create')
        ->with('groups_for_dropdown',$groups_for_dropdown)
        ->with('days_for_checkbox',$this->days_for_checkbox);
    }

    /**
    * Responds to requests to POST /activities/create
    */
    public function postCreate(Request $request) {
        $this->validate(
            $request,
            [
                'name' => 'required|min:2',
                'duration_minutes' => 'required|min:1',
                'group' => 'required',
                'days' => 'required',
                'default_time' => 'required|digits:4'
            ]
        );
    # Enter activity into the database
        $activity = new \App\Activity();
        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->group_id = $request->group;
        $activity->duration_minutes = $request->duration_minutes;
        $activity->default_time = $request->default_time;

        if($request->days) {
            $days = $request->days;
        }
        else {
            $days = [];
        }
        $activity_days = '';
        foreach($days as $day){
            $activity_days = $activity_days . ' '. $this->days_for_checkbox[$day];
        }
        $activity->days = $activity_days;
        $activity->save();

        foreach($days as $day) {
            $activity_dow = new \App\Activities_Dow();
            $activity_dow->day_of_week = $day;
            $activity->activities_dow()->save($activity_dow);
        }
        \Session::flash('flash_message','Your activity has been added.');
        return redirect('/activities/show');
    }



    public function getShow()
    {
        $activities = \App\Activity::with('activities_dow')->orderBy('id','DESC')->get();

        return view('activities.show')->with('activities',$activities);
    }

    /**
    * Responds to requests to GET /activities/edit
    */
    public function getEdit($id = null)
    {
        $activity = \App\Activity::with('activities_dow')->find($id);

        $groupModel = new \App\Group();
        $groups_for_dropdown = $groupModel->getGroupsForDropdown();
        # Get all the possible days so we can include them with check
        $days_for_this_activity = [];
        foreach($activity->activities_dow as $dow) {
            $days_for_this_activity[] = $dow->day_of_week;
        }
        return view('activities.edit')
        ->with([
            'activity' => $activity,
            'groups_for_dropdown' => $groups_for_dropdown,
            'days_for_checkbox' => $this->days_for_checkbox,
            'days_for_this_activity' => $days_for_this_activity,
        ]);

    }

    /**
    * Responds to requests to POST /activities/edit
    */
    public function postEdit(Request $request) {
        $this->validate(
            $request,
            [
                'name' => 'required|min:2',
                'duration_minutes' => 'required|min:1',
                'group' => 'required',
                'days' => 'required',
                'default_time' => 'required|digits:4'
            ]
        );
        $activity = \App\Activity::find($request->id);
        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->group_id = $request->group;
        $activity->duration_minutes = $request->duration_minutes;
        $activity->default_time = $request->default_time;

        if($request->days) {
            $days = $request->days;
        }
        else {
            $days = [];
        }
        $activity_days = '';
        foreach($days as $day){
            $activity_days = $activity_days . ' '. $this->days_for_checkbox[$day];
        }
        $activity->days = $activity_days;
        $activity->save();

        // Get rid of all of the current activity->day_of_week rows in Activities_dow
        $old_activity_dow = [];
        $old_activity_dow = \App\Activities_Dow::where('activity_id', '=', $activity->id)->get();

        foreach ($old_activity_dow as $odow) {
            $odow->delete();
        }

        // Add back the new ones
        foreach($days as $day) {
            $activity_dow = new \App\Activities_Dow();
            $activity_dow->day_of_week = $day;
            $activity->activities_dow()->save($activity_dow);
        }


        \Session::flash('flash_message','Your activity was updated.');
        return redirect('/activities/show');
    }

    public function getConfirmDelete($activity_id) {

        $activity = \App\Activity::find($activity_id);

        return view('activities.delete')->with('activity', $activity);
    }

    public function getDoDelete($activity_id) {

        # Get the book to be deleted
        $activity = \App\Activity::find($activity_id);

        if(is_null($activity)) {
            \Session::flash('flash_message','Activity not found.');
            return redirect('/activities/show');
        }


        # Then delete the book
        $activity->activities_dow()->delete();
        $activity->delete();

        # Done
        \Session::flash('flash_message',$activity->name.' was deleted.');
        return redirect('/activities/show');

    }


}
