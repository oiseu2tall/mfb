@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
@if($errors->all())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif


<form action="{{route('groups.store')}}" method="post" class="register">
  @csrf
<h1>Create New Group</h1>
<fieldset class="row1">
                <legend>Group Information
                </legend>
                  <label class="obinfo">* obligatory fields
                    </label>
                <p>
                    <label>Name *
                    </label>
                    <input type="text" name="name" id="name" class="long"/>
                    <label>Meeting Days *
                    </label>
                    <select name="meeting_day" id="meeting_day" class="select"/>
                    <option selected></option>
                      <option value="Monday">Monday</option>
<option value="Tuesday">Tuesday</option>
<option value="Wednesday">Wednesday</option>
<option value="Thursday">Thursday</option>
<option value="Friday">Friday</option>
<option value="Saturday">Saturday</option>
<option value="Sunday">Sunday</option>
                    </select>
                 </p>
                 <p>
                  <label>Venue *
                    </label>
                    <textarea name="venue" id="venue"></textarea>
                 </p>

  </fieldset>

<div><button class="button">Submit &raquo;</button></div>
</form>
        </div>
    </div>

@endsection




