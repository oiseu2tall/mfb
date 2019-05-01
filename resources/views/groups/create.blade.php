@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
<h2>Add a Group</h2>
@if($errors->all())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif
<form action="{{route('groups.store')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name">
  </div>
  <div class="form-group">
    <label for="venue">Venue</label>
    <textarea name="venue" class="form-control" id="venue" cols="30" rows="10"></textarea>
  </div>

  <div class="form-group">
    <label for="meeting_day">meeting day</label>
    <input name="meeting_day" class="form-control" id="meeting_day" cols="30" rows="10"/>
  </div>
  <div>
    <button type="submit" class="btn btn-primary-outline">Create Group</button>
  </div>
</form>
</div>
</div>
@endsection
