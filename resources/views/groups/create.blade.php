@extends('layouts.app')
@section('content')

@if($errors->all())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif

<div class="container-fluid">


  <!--center-->
  <div class="col-sm-8">
    <div class="row">
      <div class="col-xs-12">

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
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="long"/>

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
                    <textarea name="venue" id="venue">{{ old('venue') }}</textarea>

@if(Auth::user()->can('isAdmin') || Auth::user()->can('isManager'))
                  <label>Cash Officer *
                    </label>        
    <select name="user_id" id="user_id" class="select">
      <option selected></option>
      @foreach($users->sortBy('name') as $user)
      <option value="{{ $user->id }}" >{{$user->name}} {{$user->middle_name}} {{$user->first_name}}</option>
      @endforeach
                 </select> 

          @elseif(Auth::user()->can('isCashOfficer'))
          <input type="hidden" name="user_id" id="user_id" value='{{Auth::user()->id}}' />
          @endif


                 </p>

  </fieldset>

<div><button class="button">Submit &raquo;</button></div>
</form>
        </div>

  </div>






 </div><!--/center-->



</div><!--/container-fluid-->

@endsection




