@extends('layouts.app')
@section('content')
<h2>Update the customer</h2>
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

<form action="{{route('customers.update', $customer->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="col-md-6">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control">
  </div>
  <div>
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" value='{{$customer->first_name}}'>
  </div>
  <div>
    <label for="surname">Surname</label>
    <input type="text" name="surname" id="surname" value='{{$customer->surname}}'>
  </div>
  <div>
    <label for="dateOfBirth">Date of Birth</label>
    <input type="text" name="dateOfBirth" id="dateOfBirth" value='{{$customer->dateOfBirth}}'>
  </div>
    <div>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value='{{$customer->email}}'>
  </div>
    <div>
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value='{{$customer->phone}}'>
  </div>
  <div>
    <label for="address">Address</label>
    <input type="text" name="address" id="address" value='{{$customer->address}}'>
  </div>

<div>
  <label for="group_id">Group</label>
   <select name="group_id" id="group_id">
@foreach($groups as $group)
        @if($group->id==$customer->group_id)
        <option value='{{ $group->id }}' selected>{{$group->name}}</option>
        @else
        <option value='{{ $group->id }}'>{{$group->name}}</option>
        @endif
@endforeach
    </select>
  </div>

  <div>
    <button type="submit">update the customer</button>
  </div>
</form>
@endsection

