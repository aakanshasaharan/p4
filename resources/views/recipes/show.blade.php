@extends('layouts.master')

@section('title')
    Show Recipe
@stop

@section('content')

    @if(!isset($recipe_name))
        You have not specified a recipe
    @else
        <h1>Show Recipe: {{ $recipe_name }}</h1>
        <p>get details about your recipe<p>
    @endif

@stop
