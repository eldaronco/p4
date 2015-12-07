<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    /**
    * Responds to requests to GET /activities
    */

    public function getIndex()
    {
        return 'List all of my schedules';
    }

    /**
    * Responds to requests to GET /activities/create
    */
    public function getCreate()
    {
        return 'Create a new schedule form';
    }

    /**
    * Responds to requests to POST /activities/create
    */
    public function postCreate() {
        return 'Process adding new schedule';
    }


    
    public function getShow($title)
    {
        return 'Show schedule: '.$title;
    }

    /**
    * Responds to requests to GET /activities/edit
    */
    public function getEdit($id)
    {
        return 'Edit schedule: '.$id;
    }

    /**
    * Responds to requests to POST /activities/edit
    */
    public function postEdit($id)
    {
        return 'Process editing schedule: '.$id;
    }


    public function destroy($id)
    {
        //
    }
}
