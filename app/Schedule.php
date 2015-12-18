<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function activities() {
        # Activity belongs to many schedules
        return $this->belongsToMany('\App\Activity')->withTimestamps();
    }

    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function getSchedulesForDropdown() {
        # Only let the user see their schedules
        $schedules = $this->where('user_id','=',\Auth::id())->orderby('name','ASC')->get();

        $schedules_for_dropdown = [];
        foreach($schedules as $schedule) {
            $schedules_for_dropdown[$schedule->id] = $schedule->name;
        }

        return $schedules_for_dropdown;

    }
}
