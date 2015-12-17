@extends('layouts.master')

@section('title')
    Edit your recipe
@stop

@section('content')
<h2>You can edit your recipe here.</h2>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            Please edit the following details for your recipe:</div>
              @include('errors.errors')
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method='POST' action='/recipes/edit'>
                    <input type='hidden' value='{{ csrf_token() }}' name='_token'>
                    <input type='hidden' name='id' value='{{ $recipe->id }}'>

                    <div class='form-group'>
                      <label class="col-md-4 control-label" for="recipe_name">Recipe Name:</label>
                      <div class="col-md-6">
                      <input type='text' class="form-control" id='recipe_name' name='recipe_name' value='{{$recipe->recipe_name}}'>
                    </div>
                  </div>
                  <div class="form-group">
                        <label class="col-md-4 control-label" for='menu_type'>Type :</label>
                        <div class="col-md-6">
                          <select name='menu_type' id='menu'>
                            @foreach($menus_for_dropdown as $menu_id => $menu_name)
                              <option value='{{ $menu_id }}'> {{ $menu_name }} </option>
                                @endforeach
                            </select>
                          </div>
                  </div>
                  <div class='form-group'>
                    <label class="col-md-4 control-label" for='image_url'>Image Of Recipe:(URL):</label>
                      <div class="col-md-6">
                        <input  type='text'id='image_url' class="form-control"  name="image_url" value='{{$recipe->image_url}}'>
                      </div>
                  </div>
                  <div class='form-group'>
                    <label class="col-md-4 control-label" for='specifics'>Add No. of ingredients to recipe:</label>
                      <div class="col-md-6">
                        @foreach($specifics_for_checkbox as $specific_id => $specific)
                        <?php $checked = (in_array($specific['name'],$specifics_for_this_recipe)) ? 'CHECKED' : '' ?>
                        <input type='checkbox'  name='specifics[]' {{ $checked }}  value='{{$specific_id}}'> {{ $specific['name'] }}<br>
                        @endforeach
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
@stop
