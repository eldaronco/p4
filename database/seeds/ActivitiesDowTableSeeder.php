<?php

use Illuminate\Database\Seeder;

class ActivitiesDowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activity_id = \App\Activity::where('name','=','Sleep 7 Hours')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '1',
        'activity_id' => $activity_id,
        ]);

        $activity_id = \App\Activity::where('name','=','Sleep 7 Hours')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '2',
        'activity_id' => $activity_id,
        ]);

        $activity_id = \App\Activity::where('name','=','Sleep 7 Hours')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '3',
        'activity_id' => $activity_id,
        ]);

        $activity_id = \App\Activity::where('name','=','Sleep 7 Hours')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '4',
        'activity_id' => $activity_id,
        ]);

        $activity_id = \App\Activity::where('name','=','Sleep 7 Hours')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '5',
        'activity_id' => $activity_id,
        ]);

        $activity_id = \App\Activity::where('name','=','Sleep 7 Hours')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '6',
        'activity_id' => $activity_id,
        ]);

        $activity_id = \App\Activity::where('name','=','Sleep 7 Hours')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '7',
        'activity_id' => $activity_id,
        ]);

        $activity_id = \App\Activity::where('name','=','Gentle Yoga')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '2',
        'activity_id' => $activity_id,
        ]);
        $activity_id = \App\Activity::where('name','=','Gentle Yoga')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '3',
        'activity_id' => $activity_id,
        ]);
        $activity_id = \App\Activity::where('name','=','Gentle Yoga')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '7',
        'activity_id' => $activity_id,
        ]);

        $activity_id = \App\Activity::where('name','=','Fun Run')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '3',
        'activity_id' => $activity_id,
        ]);

        $activity_id = \App\Activity::where('name','=','Fun Run')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '5',
        'activity_id' => $activity_id,
        ]);

        $activity_id = \App\Activity::where('name','=','Work Hours')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '1',
        'activity_id' => $activity_id,
        ]);
        $activity_id = \App\Activity::where('name','=','Work Hours')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '2',
        'activity_id' => $activity_id,
        ]);
        $activity_id = \App\Activity::where('name','=','Work Hours')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '3',
        'activity_id' => $activity_id,
        ]);
        $activity_id = \App\Activity::where('name','=','Work Hours')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '4',
        'activity_id' => $activity_id,
        ]);
        $activity_id = \App\Activity::where('name','=','Work Hours')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '5',
        'activity_id' => $activity_id,
        ]);

        $activity_id = \App\Activity::where('name','=','Happy Hour')->pluck('id');
        DB::table('activities_dow')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'day_of_week' => '6',
        'activity_id' => $activity_id,
        ]);


    }
}
