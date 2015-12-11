<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function activities() {
        # Activity belongs to many schedules
        return $this->belongsToMany('\App\Activity')->withTimestamps();
    }
}
