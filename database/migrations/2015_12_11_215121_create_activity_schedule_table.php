<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_schedule', function (Blueprint $table) {

        $table->increments('id');
        $table->timestamps();

        # `activity_id` and `schedule_id` will be foreign keys, so they have to be unsigned
        #  Note how the field names here correspond to the tables they will connect...
        # `activity_id` will reference the `activities table` and `schedule_id` will reference the `schedules` table.
        $table->integer('activity_id')->unsigned();
        $table->integer('schedule_id')->unsigned();

        # Make foreign keys
        $table->foreign('activity_id')->references('id')->on('activities');
        $table->foreign('schedule_id')->references('id')->on('schedules');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activity_schedule');
    }
}
