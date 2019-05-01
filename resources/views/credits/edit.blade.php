@extends('layouts.app')
@section('content')
<h2>Update the credit</h2>
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

<form action="{{route('credits.update', $credit->id)}}" onsubmit="return confirm('Are you sure you want to update this customer loan request?')" method="post">
  @csrf
  @method('put')
  <div>
    <label for="start_date">Start Date</label>
    <input type="text" name="start_date" id="start_date" value='{{$credit->start_date}}'>
  </div>
  <div>
    <label for="end_date">End Date</label>
    <input type="text" name="end_date" id="end_date" value='{{$credit->end_date}}'/>
  </div>
  
  <div>
  <label for="loan_id">loan Type</label>
   <select name="loan_id" id="loan_id">
@foreach($loans as $loan)
        @if($loan->id==$credit->loan_id)
        <option value='{{ $loan->id }}' selected>{{$loan->name}}</option>
        @else
        <option value='{{ $loan->id }}'>{{$loan->name}}</option>
        @endif
@endforeach
    </select>
  </div>

  <div>
    <button type="submit">update customer Loan request</button>
  </div>
</form>
@endsection

