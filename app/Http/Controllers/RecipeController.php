<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RecipeController extends Controller {
    public function __construct() {
    # Put anything here that should happen before any of the other actions
    }

    //get index
    public function getIndex(Request $request) {
      // Get all the books "owned" by the current logged in users
       // Sort in descending order by id
       $recipes = \App\Recipe::where('user_id','=',\Auth::id())->orderBy('id','DESC')->get();
      return view('recipes.index')->with('recipes',$recipes);
      }

      //get /recipes/edit/{id}
  public function getEdit($id = null) {
  # Get this recipe and eager load its specifics
    $recipe = \App\Recipe::with('specifics')->find($id);
    if(is_null($recipe)) {
    \Session::flash('flash_message','Recipe not found.');
    return redirect('\recipes');
    }
    # Get all the possible menus so we can build the menus dropdown in the view
    $menuModel = new \App\Menu();
    $menus_for_dropdown = $menuModel->getMenusForDropdown();
    # Get all the possible specifics so we can include them with checkboxes in the view
    $specificModel = new \App\Specific();
    $specifics_for_checkbox = $specificModel->getSpecificsForCheckboxes();
    /*
    Create a simple array of just the specific names for spceicifcs associated with this recipe;
    will be used in the view to decide which specifics should be checked off
    */
    $specifics_for_this_recipe = [];
    foreach($recipe->specifics as $specific) {
      $specific_for_this_recipe[] = $specific->name;
    }
    return view('recipes.edit')
      ->with([
        'recipe' => $recipe,
        'menus_for_dropdown' => $menus_for_dropdown,
        'specifics_for_checkbox' => $specifics_for_checkbox,
        'specifics_for_this_recipe' => $specifics_for_this_recipe,
        ]);
  }
  /**
  * Responds to requests to POST /recipes/edit
  */
  public function postEdit(Request $request) {
      $recipe = \App\Recipe::find($request->id);

      $recipe->recipe_name = $request->recipe_name;
      $recipe->menu_id = $request->menu;
      $recipe->image_url = $request->image_url;

      $recipe->save();
      if($request->specifics) {
          $specifics = $request->specifics;
      }
      else {
          $specifics = [];
      }
      $recipe->specifics()->sync($specifics);
      \Session::flash('flash_message','Your recipe was updated.');
      return redirect('/recipes/edit/'.$request->id);
  }



    //get create for recipes
    public function getCreate() {
      $menuModel = new \App\Menu();
      $menus_for_dropdown = $menuModel->getMenusForDropdown();
      # Get all the possible tags so we can include them with checkboxes in the view
      $specificModel = new \App\Specific();
      $specifics_for_checkbox = $specificModel->getSpecificsForCheckboxes();
      return view('recipes.create')
        ->with('menus_for_dropdown',$menus_for_dropdown)
        ->with('specifics_for_checkbox',$specifics_for_checkbox);
    }
    /**
     * Responds to requests to POST /recipes/create
     */
    public function postCreate(Request $request) {
        $this->validate(
            $request,
            [
              'recipe_name' => 'required|min:5',
              'image_url' => 'required|url',
              ]
        );
        # Enter recipe into the database
        $recipe = new \App\Recipe();
        $recipe->recipe_name = $request->recipe_name;
        $recipe->menu_id = $request->menu;
        $recipe->user_id = \Auth::id(); # <--- NEW LINE
        $recipe->image_url = $request->image_url;
        $recipe->save();
        # Add the specifics
        if($request->specifics) {
            $specifics = $request->specifics;
            }
        else {
              $specifics = [];
              }
        $recipe->specifics()->sync($specifics);
        # Done
        \Session::flash('flash_message','Your recipe was added!');
        return redirect('/recipes');
    }




    /**
    * Responds to requests to GET /recipes/show/{recipe_name}
    */
    public function getShow($recipe_name = null) {
        return view('recipes.show')->with('recipe_name', $recipe_name);
    }
    /**
    *confirm delete
    */
    public function getConfirmDelete($recipe_id) {
        $recipe = \App\Recipe::find($recipe_id);
        return view('recipes.delete')->with('recipe', $recipe);
    }
    /**
    *delete
    */
    public function getDoDelete($recipe_id) {
        $recipe = \App\Recipe::find($recipe_id);
          if(is_null($recipe)) {
            \Session::flash('flash_message','Recipe not found.');
            return redirect('\recipes');
          }
          if($recipe->specifics()) {
              $recipe->specifics()->detach();
          }
          $recipe->delete();
            \Session::flash('flash_message',$recipe->recipe_name.' was deleted.');
            return redirect('/recipes');
          }


}
