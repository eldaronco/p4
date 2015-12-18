<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    /**
    * Responds to requests to GET /schedules.  Show all schedules.
    */

    public function getIndex()
    {
        $schedules = \App\Schedule::orderBy('id','DESC')->get();

        return view('schedules.index')->with('schedules',$schedules);
    }

    /**
    * Responds to requests to GET /schedules/calendar/id.  Shows the schedule in calendar view.
    */
    public function showCalendar($schedule_id=null)
    {
        return view('schedules.calendar')->with('schedule_id', $schedule_id);
    }

    /**
    * Responds to requests to POST /schedules/create.  Create a new schedule.
    */
    public function postCreate(Request $request) {
        $this->validate(
        $request,
        [
            'name' => 'required|min:3',
            'startDt' => 'required|date'
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

    /**
    * Responds to requests to GET /schedules/show/ (add a schedule) or /schedules/show/id (edit a schedule).
    */

    public function getShow($id=null)
    {
        if ($id > 0) {
            // Edit an existing schedule
            $scheduleModel = new \App\Schedule();
            // Grab existing schedules for the dropdown list.  Selected schedule will be selected in the view.
            $schedules_for_dropdown = $scheduleModel->getSchedulesForDropdown();

            // Get activities to choose from.
            $activityModel = new \App\Activity();
            $activities_for_lists = $activityModel->getActivitiesForLists();

            // Find the activities that go with this schedule.
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
            // Create a new schedule.  Otherwise same as above but no current activities.
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

    /**
    * Responds to requests to GET /schedules/getCalendar/{id} from the calendar view.  This creates the json
    * object with the array of calendar activities to be rendered in the FullCalendar jquery plugin calendar.
    */
    public function getCalendar($id=null)
    {
        $calendarArray = [];
        $schedule = \App\Schedule::with('activities')->find($id);
        // The toughest part of this was creating the input data in the json format that FullCalendar required.  I didn't exactly design
        // the data to plug right in.
        // First grab each activity in the schedule
        foreach ($schedule->activities as $activity){
            $activity_dow = \App\Activities_dow::where('activity_id', '=', $activity->id)->get();
            // Then find each day of the week that the activity is on.  Add the DOW number - 1 to the start date (Monday is DOW 2, but start date is always
            // Sunday so need to subtract 1)
            foreach ($activity_dow as $dow) {
                $start = $schedule->start_dt ;
                $inputDate = $start . " + " . ($dow->day_of_week - 1) . " days";
                // format the time of the activity to 4 digits i.e. in case someone entered 800 instead of 0800.
                $activityTime = sprintf("%04d", $activity->default_time);
                // Split string into an array of 2 digit elements
                $chunks = str_split($activityTime, 2);
                // Convert array to string with : between the elements.  Makes 0800 into 08:00 which is the format I need.
                $activityTime = implode(':', $chunks);
                // Take the input date that I calculated earlier and make it a date in the right format
                $activityDate = date('Y-m-d',strtotime($inputDate));
                // Add on the time and reformat
                $activityStartDate = date('Y-m-d H:i', strtotime($activityDate . " " . $activityTime));
                // Calculate the time of the activity end by adding the duration in minutes.  Format that too.
                $activityEnd = date('Y-m-d H:i',strtotime($activityStartDate . " + " . $activity->duration_minutes . " minutes"));
                // Phew!  Now build my array element.
                $calendarArray[] = Array(
                "title"  => $activity->name,
                "start"  => $activityStartDate,
                "end"    => $activityEnd
            );
        }
    }
    // convert the array to json
    return response()->json($calendarArray);
    }

    /**
    * Responds to requests to POST /schedules/edit
    */
    public function postEdit(Request $request)
    {
        $this->validate(
        $request,
        [
            'name' => 'required|min:3',
            'startDt' => 'required|date'
        ]
        );
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

    // Confirm deletion view
    public function getConfirmDelete($schedule_id) {

        $schedule = \App\Schedule::find($schedule_id);

        return view('schedules.delete')->with('schedule', $schedule);
    }

    // Do the delete.
    public function getDoDelete($schedule_id) {

        # Get the schedule to be deleted
        $schedule = \App\Schedule::find($schedule_id);

        if(is_null($schedule)) {
            \Session::flash('flash_message','Schedule not found.');
            return redirect('/schedules/');
        }


        # Detach any activities that go with the schedule.
        if($schedule->activities()) {
            $schedule->activities()->detach();
        }

        # Delete the schedule.
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
