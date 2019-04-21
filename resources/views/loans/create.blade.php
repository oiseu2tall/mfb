@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
<h2>Add a Loan Type</h2>
@if($errors->all())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif
<form action="{{route('loans.store')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
  </div>

  <div class="form-group">
    <label for="name">Duration</label>
    <input type="text" class="form-control" name="duration" id="duration">
  </div>

<div class="form-group">
    <label for="name">Principal</label>
    <input type="text" class="form-control" name="principal" id="principal">
</div>
<div class="form-group">
    <label for="name">Interest</label>
    <input type="text" class="form-control" name="interest" id="interest">
  </div>

  <div class="form-group">
    <label for="name">Total Savings</label>
    <input type="text" class="form-control" name="total_savings" id="total_savings">
  </div>


<div class="form-group">
    <label for="name">weekly remittance</label>
    <input type="text" class="form-control" name="weekly_remittance" id="weekly_remittance">
  </div>

  <div class="form-group">
    <label for="name">weekly savings</label>
    <input type="text" class="form-control" name="weekly_savings" id="weekly_savings">
  </div>
  <div class="form-group">
    <label for="name">Interest Rate</label>
    <input type="text" class="form-control" name="interest_rate" id="interest_rate">
  </div>

  <div>
    <button type="submit" class="btn btn-primary-outline">Add a loan</button>
  </div>
</form>
</div>
</div>
@endsection