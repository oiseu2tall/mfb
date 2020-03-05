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

@if(Auth::user()->can('isAdmin') || Auth::user()->can('isManager') || (Auth::user()->can('isCashOfficer'))
                        &&($repayment->customer->group->user_id == Auth::user()->id))

<form action="{{route('repayments.update', $repayment->id)}}" method="post" class="register">
  @csrf
  @method('put')

  <h1>Edit Repayment</h1>

 <fieldset class="row1">
                <legend>Payment Information
                </legend>
                  <label class="obinfo">* obligatory fields
                    </label>
                <p>
                    
                    <label>Installment *
                    </label>
  <input type="text" name="installment" id="installment" value='{{$repayment->installment}}'/>
                 
                    <label class="optional">Savings
                    </label>
    <input type="text" name="savings" id="savings" value='{{$repayment->savings}}'/>
  </p>
  <p>
                    <label class="optional">Extra Savings
                    </label>
    <input type="text" name="extra_savings" id="extra_savings" value='{{$repayment->extra_savings}}'/>
                
                    <label>Payment Date *
                    </label>
  <input type="date" name="payment_date" id="payment_date" value='{{$repayment->payment_date}}'/>
           </p>
                
            </fieldset>
   

<div><button class="button">Submit &raquo;</button></div>
</form>
@endif
    </div>

  </div>






 </div><!--/center-->



</div><!--/container-fluid-->

@endsection

