<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectActivitiesAndGroups extends Migration
{
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {

            # Add a new INT field called `group_id` that has to be unsigned (i.e. positive)
            $table->integer('group_id')->unsigned();

            # This field `group_id` is a foreign key that connects to the `id` field in the `groups` table
            $table->foreign('group_id')->references('id')->on('groups');

        });
    }

    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {

            # ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('activities_group_id_foreign');

            $table->dropColumn('group_id');
        });
    }
}
