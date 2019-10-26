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
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="long"/>
                    <label>Duration(weeks) *
                    </label>
                    <input type="text" name="duration" id="duration" value="{{ old('duration') }}" maxlength="3"/>
                 </p>
                  <p>
                    <label>Description *
                    </label>
                    <textarea name="description" id="description" value="{{ old('description') }}"> </textarea>               
                  </p>
            </fieldset>
  <fieldset class="row2">
                <legend>Loan Details
                </legend>
                <p>
                    <label>Principal *
                    </label>
                    <input type="text" name="principal" id="principal" value="{{ old('principal') }}"/>
                </p>
                <p>
                    <label>Total Interest *
                    </label>
                    <input type="text" name="interest" id="interest" value="{{ old('interest') }}"/>
                </p>
                <p>
                    <label>Total Savings *
                    </label>
                    <input type="text" name="total_savings" id="total_savings" value="{{ old('total_savings') }}">
                </p>
                
   </fieldset>

   <fieldset class="row3">
                <legend>Weekly Repayment Details
                </legend>
                <p>
                    <label>Weekly Installment*
                    </label>
                    <input type="text" name="weekly_remittance" id="weekly_remittance" value="{{ old('weekly_remittance') }}"/>
                </p>
                <p>
                    <label>Weekly Savings*
                    </label>
                    <input type="text" name="weekly_savings" id="weekly_savings" value="{{ old('weekly_savings') }}"/>

 <input name="interest_rate" type="hidden" id="interest_rate" value="0.10" /> 
                </p>
    </fieldset>
    <div><button class="button">Submit &raquo;</button></div>

</form>
</div>
</div>
@endsection
