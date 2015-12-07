<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
    * Responds to requests to GET /activities
    */

    public function getIndex()
    {
        return 'List all of my activities';
    }

    /**
    * Responds to requests to GET /activities/create
    */
    public function getCreate()
    {
        return 'Create a new activity form';
    }

    /**
    * Responds to requests to POST /activities/create
    */
    public function postCreate() {
        return 'Process adding new activity';
    }



    public function getShow($id)
    {
        return 'Show activity: '.$id;
    }

    /**
    * Responds to requests to GET /activities/edit
    */
    public function getEdit($id)
    {
        return 'Edit activity: '.$id;
    }

    /**
    * Responds to requests to POST /activities/edit
    */
    public function postEdit($id)
    {
        return 'Process editing activity: '.$id;
    }



}
