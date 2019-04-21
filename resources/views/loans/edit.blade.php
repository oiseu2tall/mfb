@extends('layouts.app')
@section('content')
<h2>Update the loan</h2>
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

<form action="{{route('loans.update', $loan->id)}}" method="post">
  @csrf
  @method('put')
  <div>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value='{{$loan->name}}'>
  </div>
  <div>
    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="10">{{$loan->description}}</textarea>
  </div>
  <div>
    <label for="duration">Duration</label>
    <input type="text" name="duration" id="duration" value='{{$loan->duration}}'>
  </div>

  <div>
    <label for="principal">Principal</label>
    <input type="text" name="principal" id="principal" value='{{$loan->principal}}'>
  </div>

   <div>
    <label for="interest">Interest</label>
    <input type="text" name="interest" id="interest" value='{{$loan->interest}}'>
  </div>

  <div>
    <label for="total_savings">Total Savings</label>
    <input type="text" name="total_savings" id="total_savings" value='{{$loan->total_savings}}'>
  </div>

  <div>
    <label for="weekly_remittance">Weekly Remittance</label>
    <input type="text" name="weekly_remittance" id="weekly_remittance" value='{{$loan->weekly_remittance}}'>
  </div>

  <div>
    <label for="weekly_savings">Weekly Savings</label>
    <input type="text" name="weekly_savings" id="weekly_savings" value='{{$loan->weekly_savings}}'>
  </div>
  <div>
    <label for="interest_rate">Interest Rate</label>
    <input type="text" name="interest_rate" id="interest_rate" value='{{$loan->interest_rate}}'>
  </div>

  <div>
    <button type="submit">update the loan</button>
  </div>
</form>
@endsection

