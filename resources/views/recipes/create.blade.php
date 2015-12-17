@extends('layouts.master')

@section('title')
  create recipes
@stop

@section('content')
<h2> Add new recipe to your list here</h2><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          Please Add the following details:</div>
            @include('errors.errors')
          <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" actions="/recipes/create">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <div class="form-group">
                  <label class="col-md-4 control-label" for="recipe_name">Recipe Name:</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="recipe_name" value="{{ old('recipe_name') }}">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label" for='menu'>Type :</label>
                    <div class="col-md-6">
                      <select name='menu' id='menu'>
                        @foreach($menus_for_dropdown as $menu_id => $menu_name)
                          <option value='{{ $menu_id }}'> {{ $menu_name }} </option>
                            @endforeach
                        </select>
                      </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label" for="image_url">Image</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="image_url" value="{{ old('image_url') }}">
                    </div>
                </div>

                <div class='form-group'>
                  <label class="col-md-4 control-label" for='specifics'>Add No. of ingredients to recipe:</label>
                    <div class="col-md-6">
                      @foreach($specifics_for_checkbox as $specific_id => $specific)
                        <input type='checkbox' name='specifics[]' value='{{$specific_id}}'> {{ $specific['name'] }}<br>
                      @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

                </form>
              </div>
          </div>
        </div>
    </div>
</div>
@stop
