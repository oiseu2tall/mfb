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

@if (session()->has('message'))
  <div>
    {{session()->get('message')}}
  </div>
@endif

<form action="{{route('groups.update', $group->id)}}" method="post" class="register">
  @csrf
  @method('put')
<h1>Edit Group</h1>
<fieldset class="row1">
                <legend>Group Information
                </legend>
                  <label class="obinfo">* obligatory fields
                    </label>
                <p>
                    <label>Name *
                    </label>
    <input type="text" name="name" id="name" value='{{$group->name}}' class="long"/>
                    <label>Meeting Days *
                    </label>
    <!--
      <input type="text" name="meeting_day" id="meeting_day" value='{{$group->meeting_day}}'/>-->
    <select name="meeting_day" id="meeting_day" class="select"/>
    
    <option value='{{$group->meeting_day}}' selected>{{$group->meeting_day}}</option>
                    
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
    <input type="text" name="venue" id="venue" value='{{$group->venue}}' class="long"/>
                
                 @if(Auth::user()->can('isAdmin') || Auth::user()->can('isManager'))
                  <label>Cash Officer *
                    </label>        
    <select name="user_id" id="user_id" class="select">
      <option selected></option>
      @foreach($users->sortBy('name') as $user)
          @if($user->id==$group->user_id)
      <option value="{{ $user->id }}" selected>{{$user->name}} {{$user->middle_name}} {{$user->first_name}}</option>
          @else
          <option value="{{$user->id}}">{{$user->name}} {{$user->middle_name}} {{$user->first_name}}</option>
          @endif
      @endforeach
      @elseif(Auth::user()->can('isCashOfficer') && Auth::user()->id == $group->user_id)
      <input type="hidden" name="user_id" id="user_id" value='{{$group->user_id}}'>
      @endif
                 </select>
                 
                 </p>

  </fieldset>

<div><button class="button">Submit &raquo;</button></div>

  <!--
  <div>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value='{{$group->name}}'>
  </div>
  <div>
    <label for="venue">Venue</label>
    <textarea name="venue" id="venue" cols="30" rows="10">{{$group->venue}}</textarea>
  </div>
  <div>
    <label for="meeting_day">Meeting day</label>
    <input type="text" name="meeting_day" id="meeting_day" value='{{$group->meeting_day}}'>
  </div>
  <div>
    <button type="submit">update the group</button>
  </div>
-->

</form>

</div>
    </div>
@endsection

