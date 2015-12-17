<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    /**
    * Responds to requests to GET /activities
    */

    public function getIndex()
    {
        $schedules = \App\Schedule::orderBy('id','DESC')->get();

        return view('schedules.index')->with('schedules',$schedules);
    }

    /**
    * Responds to requests to GET /activities/create
    */
    public function showCalendar()
    {
        return view('schedules.calendar');

    }

    /**
    * Responds to requests to POST /activities/create
    */
    public function postCreate(Request $request) {
        $this->validate(
        $request,
        [
            'name' => 'required|min:3'
        ]
    );
    # Enter schedule into the database
    $schedule = new \App\Schedule();
    $schedule->name = $request->name;
//    $schedule->user_id = \Auth::id(); # <--- NEW LINE
    $startDt = date_create($request->startDt);
    $schedule->start_dt = date_format($startDt,"Y-m-d");
    $schedule->save();
    # Add the activities
    if($request->activities) {
        $activities = $request->activities;
    }
    else {
        \Session::flash('flash_message','No activities');
        $activities = [];
    }
    $schedule->activities()->sync($activities);
    # Done
    \Session::flash('flash_message','Your schedule was added!');
    return redirect('/schedules');
    }



    public function getShow($id=null)
    {
        if ($id > 0) {
            $scheduleModel = new \App\Schedule();
            $schedules_for_dropdown = $scheduleModel->getSchedulesForDropdown();
            $activityModel = new \App\Activity();
            $activities_for_lists = $activityModel->getActivitiesForLists();


            $schedule = \App\Schedule::with('activities')->find($id);
            $activities_for_this_schedule = [];
            foreach ($schedule->activities as $activity){
                $activities_for_this_schedule[] = $activity;
            }
            return view('schedules.show')
            ->with('schedule', $schedule)
            ->with('schedules_for_dropdown',$schedules_for_dropdown)
            ->with('activities_for_this_schedule',$activities_for_this_schedule)
            ->with('activities_for_lists',$activities_for_lists);
        }
        else {
            $scheduleModel = new \App\Schedule();
            $schedules_for_dropdown = $scheduleModel->getSchedulesForDropdown();
            $schedules = \App\Schedule::with('activities')->orderBy('id','DESC')->get();

            $activityModel = new \App\Activity();
            $activities_for_lists = $activityModel->getActivitiesForLists();

            return view('schedules.create')
            ->with('schedules', $scheduleModel)
            ->with('schedules_for_dropdown',$schedules_for_dropdown)
            ->with('activities_for_lists',$activities_for_lists);
        }

    }
/*
    public function getActivities($id)
    {

        $scheduleModel = new \App\Schedule();
        $schedules_for_dropdown = $scheduleModel->getSchedulesForDropdown();

        $schedule = \App\Schedule::where('id','=',$id)->first();
        $activities_for_this_schedule = [];
        foreach ($schedule->activities as $activity){
            $activities_for_this_schedule[] = $activity->name;
        }
        return view('schedules.show')
        ->with('schedule', $schedule)
        ->with('schedules_for_dropdown',$schedules_for_dropdown)
        ->with('activities_for_this_schedule',$activities_for_this_schedule);
    }
*/
    /**
    * Responds to requests to GET /activities/edit
    */
    public function getCalendar($id=null)
    {
        $calendarArray = [];
        $schedule = \App\Schedule::with('activities')->find($id);


        foreach ($schedule->activities as $activity){
            $activity_dow = \App\Activities_dow::where('activity_id', '=', $activity->id)->get();

            foreach ($activity_dow as $dow) {
                $start = $schedule->start_dt ;
                $inputDate = $start . " + " . ($dow->day_of_week - 1) . " days";
                $activityTime = sprintf("%04d", $activity->default_time);
                //Split string into an array.  Each element is 2 chars
                $chunks = str_split($activityTime, 2);
                //Convert array to string.  Each element separated by the given separator.
                $activityTime = implode(':', $chunks);

                $activityDate = date('Y-m-d',strtotime($inputDate));
                $activityStartDate = date('Y-m-d H:i', strtotime($activityDate . " " . $activityTime));
                $activityEnd = date('Y-m-d H:i',strtotime($activityStartDate . " + " . $activity->duration_minutes . " minutes"));

                $calendarArray[] = Array(
                "title"  => $activity->name,
                "start"  => $activityStartDate,
                "end"    => $activityEnd
            );

            }

        }
        // return json_encode($calendarArray);
        return response()->json($calendarArray);
    }

    /**
    * Responds to requests to POST /activities/edit
    */
    public function postEdit(Request $request)
    {
        # Enter schedule into the database
        $schedule = \App\Schedule::with('activities')->find($request->id);
        $schedule->name = $request->name;
    //    $schedule->user_id = \Auth::id(); # <--- NEW LINE
        $startDt = date_create($request->startDt);
        $schedule->start_dt = date_format($startDt,"Y-m-d");
        $schedule->save();
        # Add the activities
        if($request->activities) {
            $activities = $request->activities;
        }
        else {
            \Session::flash('flash_message','No activities');
            $activities = [];
        }
        $schedule->activities()->sync($activities);
        # Done
        \Session::flash('flash_message','Your schedule was updated!');
        return redirect('/schedules');

    }

    public function getConfirmDelete($schedule_id) {

        $schedule = \App\Schedule::find($schedule_id);

        return view('schedules.delete')->with('schedule', $schedule);
    }

    public function getDoDelete($schedule_id) {

        # Get the book to be deleted
        $schedule = \App\Schedule::find($schedule_id);

        if(is_null($schedule)) {
            \Session::flash('flash_message','Schedule not found.');
            return redirect('/schedules/');
        }


        # Then delete the book
        if($schedule->activities()) {
            $schedule->activities()->detach();
        }

        $schedule->delete();

        # Done
        \Session::flash('flash_message',$schedule->name.' was deleted.');
        return redirect('/schedules/');

    }


    public function destroy($id)
    {
        //
    }
}
