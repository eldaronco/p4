<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function activities() {
        # Activity belongs to many schedules
        return $this->belongsToMany('\App\Activity')->withTimestamps();
    }

    public function getSchedulesForDropdown() {

        $schedules = $this->orderby('name','ASC')->get();

        $schedules_for_dropdown = [];
        foreach($schedules as $schedule) {
            $schedules_for_dropdown[$schedule->id] = $schedule->name;
        }

        return $schedules_for_dropdown;

    }
}
