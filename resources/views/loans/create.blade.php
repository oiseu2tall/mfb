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
<form action="{{route('loans.store')}}" method="post" class="register">
  @csrf



  <h1>Add a Loan Stage</h1>

 <fieldset class="row1">
                <legend>Loan Information
                </legend>
                  <label class="obinfo">* obligatory fields
                    </label>
                <p>
                    <label>Name *
                    </label>
                    <input type="text" name="name" id="name" class="long"/>
                    <label>Duration(weeks) *
                    </label>
                    <input type="text" name="duration" id="duration"/>
                 </p>
                  <p>
                    <label>Description *
                    </label>
                    <textarea name="description" id="description"> </textarea>               
                  </p>
            </fieldset>
  <fieldset class="row2">
                <legend>Loan Details
                </legend>
                <p>
                    <label>Principal *
                    </label>
                    <input type="text" name="principal" id="principal"/>
                </p>
                <p>
                    <label>Total Interest *
                    </label>
                    <input type="text" name="interest" id="interest"/>
                </p>
                <p>
                    <label>Total Savings *
                    </label>
                    <input type="text" name="total_savings" id="total_savings">
                </p>
                
   </fieldset>

   <fieldset class="row3">
                <legend>Weekly Repayment Details
                </legend>
                <p>
                    <label>Weekly Installment*
                    </label>
                    <input type="text" name="weekly_remittance" id="weekly_remittance"/>
                </p>
                <p>
                    <label>Weekly Savings*
                    </label>
                    <input type="text" name="weekly_savings" id="weekly_savings"/>

 <input name="interest_rate" type="hidden" id="interest_rate" value="0.10" /> 
                </p>
    </fieldset>
    <div><button class="button">Submit &raquo;</button></div>



  <!--
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
-->
</form>
</div>
</div>
@endsection
