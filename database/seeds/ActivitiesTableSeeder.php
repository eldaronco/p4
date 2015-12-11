<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group_id = \App\Group::where('name','=','Flexibility')->pluck('id');
        DB::table('activities')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Gentle Yoga',
        'description' => 'Hatha Yoga, Gentle flow. 90 minutes.',
        'days' => 'M W Sa',
        'duration_minutes' => '90',
        'default_time' => '1700',
        'group_id' => $group_id,
        ]);

        $group_id = \App\Group::where('name','=','Fitness')->pluck('id');
        DB::table('activities')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Fun Run',
        'description' => 'Run with Pacers group from Clarendon Starbucks.',
        'days' => 'T Th',
        'duration_minutes' => '60',
        'default_time' => '0500',
        'group_id' => $group_id,
        ]);

        $group_id = \App\Group::where('name','=','Work')->pluck('id');
        DB::table('activities')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Work Hours',
        'description' => 'Normal work hours.',
        'days' => 'M Tu W Th F',
        'duration_minutes' => '480',
        'default_time' => '0800',
        'group_id' => $group_id,
        ]);

        $group_id = \App\Group::where('name','=','Recreation')->pluck('id');
        DB::table('activities')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Happy Hour',
        'description' => 'Hang out with work folks.',
        'days' => 'F',
        'duration_minutes' => '120',
        'default_time' => '1630',
        'group_id' => $group_id,
        ]);

        $group_id = \App\Group::where('name','=','Family')->pluck('id');
        DB::table('activities')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Playground',
        'description' => 'Take kids to park.',
        'days' => 'Su',
        'duration_minutes' => '120',
        'default_time' => '1300',
        'group_id' => $group_id,
        ]);

        $group_id = \App\Group::where('name','=','Sleep')->pluck('id');
        DB::table('activities')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Sleep 7 Hours',
        'description' => 'Sleep.',
        'days' => 'M Tu W Th F Sa Su',
        'duration_minutes' => '420',
        'default_time' => '2200',
        'group_id' => $group_id,
        ]);
    }
}
