@extends('layouts.master')

@section('title')
    All recipes
@stop

@section('content')

  <h2>All Recipes. </h2>

    @if(sizeof($recipes) == 0)
        You have not added any recipe.
        <a href='/recipes/create'>Add</a> recipes to your list.
    @else
        @foreach($recipes as $recipe)
            <div>
                <h2>{{ $recipe->recipe_name }}</h2>
                <a href='/recipes/edit/{{$recipe->id}}'>Edit</a> |
                <a href='/recipes/confirm-delete/{{$recipe->id}}'>Delete</a><br>
                <img src='{{ $recipe->image_url }}'>
            </div>
        @endforeach
    @endif

@stop
