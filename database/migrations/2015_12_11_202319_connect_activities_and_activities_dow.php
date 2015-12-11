<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectActivitiesAndActivitiesDow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities_dow', function (Blueprint $table) {

            # Add a new INT field called `activity_id` that has to be unsigned (i.e. positive)
            $table->integer('activity_id')->unsigned();

            # This field `activity_id` is a foreign key that connects to the `id` field in the `activities` table
            $table->foreign('activity_id')->references('id')->on('activities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities_dow', function (Blueprint $table) {

            # ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('activities_dow_activity_id_foreign');

            $table->dropColumn('activity_id');
        });
    }
}
