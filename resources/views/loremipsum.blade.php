@extends('layouts.master')

@section('title')
  Register
@stop

@section('content')
  <h1>Register page for New Users of this App</h1>
  <h4>Please fill all the information about you.</h4>
  <form method="POST" actions="/loremipsum">
      <input type="hidden" value="{{ csrf_token() }}" name="_token">
      <fieldset>
        <label for="Name"><h4>Name:</h4></label>
        <input type="text" id="Name" name="Name" value={{ $paragraphs or '3' }}><br>

        <label for="email"><h4>Email:</h4></label>
        <input type="text" id="email" name="email" value={{ $paragraphs or '3' }}><br>

        <label for="password"><h4>Password:</h4></label>
        <input type="text" id="password" name="password" value={{ $paragraphs or '3' }}><br>

        <label for="address"><h4>Address:</h4></label>
        <input type="text" id="address" name="address" value={{ $paragraphs or '3' }}><br>

        <label for="contactNumber"><h4>Contact Number:</h4></label>
        <input type="text" id="contactNumber" name="contactNumber" value={{ $paragraphs or '3' }}><br>
      </fieldset>
      <button type="submit" class="btn btn-primary">Register</button>
  </form>


  @if(count($errors) > 0)
    @foreach ($errors->all() as $error)
      <h3><span class="label label-danger">{{ $error }}</span></h3>
    @endforeach
  @endif


  @if ($_SERVER['REQUEST_METHOD'] == 'POST')
    <?php
      $generator = new Badcow\LoremIpsum\Generator();
      $text = $generator->getParagraphs($paragraphs);
      echo implode('<p>', $text );
    ?>
  @endif
	@stop
