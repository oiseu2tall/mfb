@extends('layouts.app')
@section('content')
<h2>Update the group</h2>
@if($errors->all())
  <div>
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

<form action="{{route('groups.update', $group->id)}}" method="post">
  @csrf
  @method('put')
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
</form>
@endsection

