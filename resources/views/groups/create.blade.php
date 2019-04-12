@extends('layouts.app')
@section('content')
<h2>Add a post</h2>
@if($errors->all())
  <div>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif
<form action="{{route('groups.store')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
  </div>
  <div class="form-group">
    <label for="venue">Venue</label>
    <textarea name="venue" id="venue" cols="30" rows="10"></textarea>
  </div>

  <div class="form-group">
    <label for="meeting_day">meeting day</label>
    <input name="meeting_day" id="meeting_day" cols="30" rows="10"/>
  </div>
  <div>
    <button type="submit">Add a Group</button>
  </div>
</form>
@endsection
