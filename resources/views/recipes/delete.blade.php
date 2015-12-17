@extends('layouts.master')

@section('title')
    Delete Recipe
@stop

@section('content')

    <h1>Delete Recipe</h1>

    <p>
        Are you sure you want to delete <em>{{$recipe->recipe_name}}</em>?
    </p>

    <p>
        <a href='/recipes/delete/{{$recipe->id}}'>Yes...</a>
    </p>

@stop
