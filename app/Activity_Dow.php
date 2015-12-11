<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity_Dow extends Model
{
    public function activity() {
        # Activity Day of the week belongs to one activity
        # Define a one-to-many relationship.
        return $this->belongsTo('\App\Activity');
    }
}
