<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities_Dow extends Model
{
    protected $table = 'activities_dow';
    public function activity() {
        # Activity Day of the week belongs to one activity
        # Define a one-to-many relationship.
        return $this->belongsTo('\App\Activity');
    }

}
