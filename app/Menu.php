<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  /**
*
*/
  public function recipe() {
      # menu has many recipes
      # Define a one-to-many relationship.
      return $this->hasMany('\App\Recipe');
  }
  /**
*
*/
  public function getMenusForDropdown() {
      $menus = $this->orderby('menu_type','ASC')->get();
      $menus_for_dropdown = [];
      foreach($menus as $menu) {
          $menus_for_dropdown[$menu->id] = $menu->menu_type;
      }
      return $menus_for_dropdown;
  }
}
