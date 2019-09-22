

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

@if (session()->has('message'))
  <div>
    {{session()->get('message')}}
  </div>
@endif


<form action="{{route('credits.update', $credit->id)}}" onsubmit="return confirm('Are you sure you want to update this customer loan request?')" method="post" class="register">
  @csrf
  @method('put')
<h1>Edit loan Request</h1>
<fieldset class="row1">
                <legend>Loan Request
                </legend>
                  <label class="obinfo">* obligatory fields
                    </label>
                <p>
                    <label>Start Date *
                    </label>
                    <input type="date" name="start_date" id="start_date" 
                    value='{{$credit->start_date}}'/>
                    <label>End Date *
                    </label>
                    <input type="date" name="end_date" id="end_date" value='{{$credit->end_date}}' />
                 </p>
                 <p>
                  <label>Loan Type *
                    </label>
                    <select name="loan_id" id="loan_id">
                        <option selected>Select Loan Type
                        </option>
                        @foreach($loans as $loan)
         @if($loan->id==$credit->loan_id)
        <option value='{{ $loan->id }}' selected>{{$loan->name}}</option>
        @else
        <option value='{{ $loan->id }}'>{{$loan->name}}</option>
        @endif
                        @endforeach
                    </select>
                 </p>
  
  </fieldset>

<div><button class="button">Submit &raquo;</button></div>
</form>
        </div>
    </div>

@endsection
  

