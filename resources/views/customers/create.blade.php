@extends('layouts.app')
@section('content')
<h2>Add a Customer</h2>
@if($errors->all())
  <div>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif
<form action="{{route('customers.store')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="first_name">first Name</label>
    <input type="text" name="first_name" id="first_name">
  </div>
  <div class="form-group">
    <label for="surname">surname</label>
    <input type="text" name="surname" id="surname"/>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input name="address" id="address"/>
  </div>

  <div class="form-group">
    <label for="phone">Phone</label>
    <input name="phone" id="phone"/>
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input name="email" id="email"/>
  </div>

  <div class="form-group">
    <label for="dateOfBirth">Date of birth</label>
    <input name="dateOfBirth" id="dateOfBirth"/>
  </div>

<div class="form-group">
    <label for="group_id">Group</label>
   <select name="group_id" id="group_id">
    <option value="" selected>Select Group</option>
@foreach($groups as $group)
        <option value="{{ $group->id }}" >{{$group->name}}</option>
@endforeach
    </select>
  </div>

  <div>
    <button type="submit">Add a Customer</button>
  </div>
</form>
@endsection