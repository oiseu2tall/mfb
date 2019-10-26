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


<form action="{{route('loans.update', $loan->id)}}" method="post" class="register">
  @csrf
  @method('put')

<h1>Edit Loan Stage</h1>

 <fieldset class="row1">
                <legend>Loan Information
                </legend>
                  <label class="obinfo">* obligatory fields
                    </label>
                <p>
                    <label>Name *
                    </label>
      <input type="text" name="name" id="name" value='{{$loan->name}}' class="long"/>
                    <label>Duration(weeks) *
                    </label>
      <input type="text" name="duration" id="duration" value='{{$loan->duration}}'/>
                 </p>
                  <p>
                    <label>Description *
                    </label>
    <textarea name="description" id="description">{{$loan->description}}</textarea>               
                  </p>
            </fieldset>
  <fieldset class="row2">
                <legend>Loan Details
                </legend>
                <p>
                    <label>Principal *
                    </label>
  <input type="text" name="principal" id="principal" value='{{$loan->principal}}'/>
                </p>
                <p>
                    <label>Total Interest *
                    </label>
    <input type="text" name="interest" id="interest" value='{{$loan->interest}}'/>
                </p>
                <p>
                    <label>Total Savings *
                    </label>
  <input type="text" name="total_savings" id="total_savings" value='{{$loan->total_savings}}'>
                </p>
                
   </fieldset>

   <fieldset class="row3">
                <legend>Weekly Repayment Details
                </legend>
                <p>
                    <label>Weekly Installment*
                    </label>
                         <input type="text" name="weekly_remittance" id="weekly_remittance" value='{{$loan->weekly_remittance}}'/>
                </p>
                <p>
                    <label>Weekly Savings*
                    </label>
                    <input type="text" name="weekly_savings" id="weekly_savings" value='{{$loan->weekly_savings}}'/>
      <input name="interest_rate" type="hidden" id="interest_rate" value="0.10" /> 
                  </p>
    </fieldset>
      <div><button class="button">Submit &raquo;</button></div>




  <!--
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
-->
</form>

    </div>
    </div>
@endsection

