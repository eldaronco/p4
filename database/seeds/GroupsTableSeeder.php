<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Flexibility',
        'description' => 'Yoga, Pilates, Stretching',
        ]);

        DB::table('groups')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Fitness',
        'description' => 'Aerobic Exercise, Weight Training',
        ]);

        DB::table('groups')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Work',
        'description' => 'Hours at workplace or working from home.',
        ]);
        DB::table('groups')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Recreation',
        'description' => 'Anything that is just for fun.',
        ]);
        DB::table('groups')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Sleep',
        'description' => 'Sleep.',
        ]);

        DB::table('groups')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Family',
        'description' => 'Family time.',
        ]);

        DB::table('groups')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Social Obligation',
        'description' => 'Parties, non-work meetings.',
        ]);

        DB::table('groups')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Charity Work',
        'description' => 'Activities to benefit others.',
        ]);

        DB::table('groups')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Education',
        'description' => 'Classes or lectures, classwork, training.',
        ]);

    }
}
