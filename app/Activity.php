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

    public function activities_dow() {
        # Activity has many days of the week
        # Define a one-to-many relationship.
        return $this->hasMany('\App\Activities_Dow');
    }

    public function schedules() {
        # Activity belongs to many schedules
        return $this->belongsToMany('\App\Schedule')->withTimestamps();
    }

    public function getActivitiesForLists() {
        # This is for the lists that users can pick from to create schedules.
        $activities = $this->orderby('name','ASC')->get();

        $activities_for_lists = [];
        foreach($activities as $activity) {
            $activities_for_lists[] = $activity;
        }

        return $activities_for_lists;

    }

}
