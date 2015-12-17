<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
  public function menu() {
      # recipe belongs to menu
      # Define an inverse one-to-many relationship.
      return $this->belongsTo('\App\Menu');
  }
  public function user() {
      return $this->belongsTo('\App\User');
  }
  public function specifics() {
      return $this->belongsToMany('\App\Specific')->withTimestamps();;
  }
}
