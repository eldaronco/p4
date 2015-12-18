<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
    * Responds to requests to GET /
    */
    public function getIndex() {

        # Logged in users should not see the welcome page, send them to the schedule index instead.
      if(\Auth::check()) {
            return redirect()->to('/schedules');
        }

        return view('welcome.index');
        return 'Welcome to Plan My Week!';
    }
}
