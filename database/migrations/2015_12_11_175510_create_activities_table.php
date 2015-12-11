<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('activities', function (Blueprint $table) {

             # Increments method will make a Primary, Auto-Incrementing field.
             # Most tables start off this way
             $table->increments('id');

             # This generates two columns: `created_at` and `updated_at` to
             # keep track of changes to a row
             $table->timestamps();

             # The rest of the fields...
             $table->string('name');
             $table->string('description')->nullable();
             $table->string('days');
             $table->integer('duration_minutes');

             # 0000-2359
             $table->integer('default_time');

         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activities');
    }
}
