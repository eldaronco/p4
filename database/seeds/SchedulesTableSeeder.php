<?php

use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table('schedules')->insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'name' => 'Schedule_1',
             'start_dt' => date('2015-11-29'),
             'user_id' => 2,
         ]);

         DB::table('schedules')->insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'name' => 'Schedule_2',
             'start_dt' => date('2015-12-06'),
             'user_id' => 2,
         ]);



     }
}
