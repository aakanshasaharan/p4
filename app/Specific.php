<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specific extends Model
{
  /**
*
*/
  public function recipes() {
      return $this->belongsToMany('\App\Recipe')->withTimestamps();;
  }

  public function getSpecificsForCheckboxes() {
      $specifics = $this->orderBy('name','ASC')->get();
      $specificsForCheckboxes = [];
      foreach($specifics as $specific) {
          $specificsForCheckboxes[$specific['id']] = $specific;
      }
      return $specificsForCheckboxes;
  }
}
