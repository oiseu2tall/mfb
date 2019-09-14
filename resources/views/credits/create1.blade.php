@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
<h2>Add a loan request </h2>
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

<form action="{{route('credits.store')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="start_date">Start Date</label>
    <input type="text" class="form-control" name="start_date" id="start_date">
  </div>
  <div class="form-group">
    <label for="end_date">End Date</label>
    <input name="end_date" type="text" class="form-control" id="end_date" />
  </div>

  <div class="form-group">
    <label for="loan_id">Loan Type</label>
   <select name="loan_id" id="loan_id">
    <option value="" selected>Select Loan Type</option>
@foreach($loans as $loan)
        <option value="{{ $loan->id }}" >{{$loan->name}}</option>
@endforeach
    </select>

  </div>
<?php $customer_id = session('customerid'); ?>
 <input name="customer_id" type="hidden" id="customer_id" value="{{$customer_id}}" /> <p> {{$customer_id}}</p>

<p>after here {{ session('customerid') }}</p>
  <div>

    <button type="submit" class="btn btn-primary-outline" >Create Loan Request</button>
  </div>
</form>
</div>
</div>
@endsection
