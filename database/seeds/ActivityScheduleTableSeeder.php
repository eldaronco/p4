<?php

use Illuminate\Database\Seeder;

class ActivityScheduleTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        # First, create an array of all the schedule we want to associate activities with
        # The *key* will be the schedule name, and the *value* will be an array of activities.
        $schedules =[
            'Schedule_1' => ['Fun Run','Work Hours','Happy Hour','Sleep 7 Hours'],
            'Schedule_2' => ['Gentle Yoga','Playground','Sleep 7 Hours'],
        ];

        # Now loop through the above array, creating a new pivot for each schedule to activity
        foreach($schedules as $name => $activity) {

            # First get the schedule
            $schedule = \App\Schedule::where('name','like',$name)->first();

            # Now loop through each activity for this schedule, adding the pivot
            foreach($activity as $activityName) {
                $activity = \App\Activity::where('name','LIKE',$activityName)->first();

                # Connect this activity to this book
                $schedule->activities()->save($activity);
            }

        }
    }
}
