<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function group() {
        # Activity belongs to one group
        # Define a one-to-many relationship.
        return $this->belongsTo('\App\Group');
    }

    public function activity_dow() {
        # Activity belongs to many days of the week
        # Define a one-to-many relationship.
        return $this->hasMany('\App\Activity_Dow');
    }
}
