@extends('layouts.app')
@section('content')

@if($errors->all())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif


<div class="container-fluid">


  <!--center-->
  <div class="col-sm-8">
    <div class="row">
      <div class="col-xs-12">


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


</form>

    </div>

  </div>






 </div><!--/center-->



</div><!--/container-fluid-->
@endsection

