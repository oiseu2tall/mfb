@extends('layouts.form')
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
                    <input type="text" name="meeting_day" id="meeting_day"/>
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


<!--
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
-->

