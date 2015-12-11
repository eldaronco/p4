<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function activity() {
      # Group has many Activities
      # Define a one-to-many relationship.
      return $this->hasMany('\App\Activity');
  }
}
