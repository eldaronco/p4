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
                'duration' => 'required|min:1',
                'group' => 'required',
            ]
        );
    # Enter activity into the database
        $activity = new \App\Activity();
        $activity->name = $request->name;
        $activity->group_id = $request->group;
        $activity->duration_minutes = $request->duration;
        $activity->default_time = $request->default_time;
        $activity->save();
        if($request->days) {
            $days = $request->days;
        }
        else {
            $days = [];
        }

        foreach($days as $day) {
            $activity_dow = new \App\Activities_dow();
            $activity_dow->day_of_week = $day;
            $activity->activities_dow()->save($activity_dow);
        }
        \Session::flash('flash_message','Your activity has been added.');
        return redirect('/activities/edit/'.$activity->id);
    }



    public function getShow($id)
    {
        return 'Show activity: '.$id;
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
        $activity = \App\Activity::find($request->id);
        $activity->name = $request->name;
        $activity->group_id = $request->group;
        $activity->duration_minutes = $request->duration_minutes;
        $activity->default_time = $request->default_time;
        $activity->save();
        if($request->days) {
            $days = $request->days;
        }
        else {
            $days = [];
        }
            $old_activity_dow = [];
            $old_activity_dow = \App\Activities_dow::where('activity_id', '=', $activity->id);
        
            foreach ($old_activity_dow as $odow) {
                \Session::flash('flash_message','Deleting activity!');
                Debugbar::info($activity->id);
                $odow->delete();
            }
        foreach($days as $day) {
            $activity_dow = new \App\Activities_dow();
            $activity_dow->day_of_week = $day;
            $activity->activities_dow()->save($activity_dow);
        }
        \Session::flash('flash_message','Your activity was updated.');
        return redirect('/activities/edit/'.$activity->id);
    }



}
