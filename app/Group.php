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

  public function getGroupsForDropdown() {

      $groups = $this->orderby('name','ASC')->get();

      $groups_for_dropdown = [];
      foreach($groups as $group) {
          $groups_for_dropdown[$group->id] = $group->name;
      }

      return $groups_for_dropdown;

  }
}
