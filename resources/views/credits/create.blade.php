@extends('layouts.app')
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


<form action="{{route('credits.store')}}" method="post" class="register">
  @csrf
<h1>Create Loan Request</h1>
<fieldset class="row1">
                <legend>Loan Request
                </legend>
                  <label class="obinfo">* obligatory fields
                    </label>
                <p>
                    <label>Start Date *
                    </label>
                    <input type="date" name="start_date" id="start_date"/>
                    <!--
                    <label>End Date *
                    </label>
                    <input type="text" name="end_date" id="end_date" />
                  -->
                  <label>Loan Type *
                    </label>
                    <select name="loan_id" id="loan_id">
                        <option selected>Select Loan Type
                        </option>
                        @foreach($loans as $loan)
        <option value="{{ $loan->id }}" >{{$loan->name}}</option>
                        @endforeach
                    </select>
                 </p>
                 <?php $customer_id = session('customerid'); ?>
 <input name="customer_id" type="hidden" id="customer_id" value="{{$customer_id}}" /> 
 <!--
 <p> {{$customer_id}}</p>

<p>after here {{ session('customerid') }}</p>
-->

  </fieldset>

<div><button class="button">Submit &raquo;</button></div>
</form>
        </div>
    </div>

@endsection
  

