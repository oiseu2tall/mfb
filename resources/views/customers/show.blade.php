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
          <h2><span>{{$customer->surname}} </span>{{$customer->middle_name}} {{$customer->first_name}}</h2>

<a href="{{route('credits.create')}}" onclick="{{session(['customerid' => $customer->id])}}" style="float: right; font-size: 22px;">
  <i class="fa fa-money" aria-hidden="true"></i>  Give Loan</a>

          <img src="{{ asset('images/'.$customer->image_name) }}" alt="Profile Picture" width="300" class="floated" />


    <div style="float:left; width: 60%; display: block; border: 1px solid #eee; padding: 20px; font-size: 14px; ">
<h4>
  CASH OFFICER: {{$customer->group->user->name}} {{$customer->group->user->middle_name}} {{$customer->group->user->first_name}}
</h4>          
<h4>GROUP: <a href="{{route('groups.show', $customer->group_id)}}">{{$customer->group->name}}</a></h4>

<p>GROUP LEADER: 

@foreach($customer->group->customers as $leader)
    @if($leader->group_leader == $customer->group_id)
    <a href="{{route('customers.show', $leader->id)}}">{{$leader->surname}} {{$leader->middle_name}} {{$leader->first_name}}</a>
    @endif
    @endforeach
  </p>

<div class="col-sm-5 col-xs-6 tital " >CARD NUMBER:</div><div class="col-sm-7 col-xs-6 ">{{$customer->card_number}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br/>

<div class="col-sm-5 col-xs-6 tital " >ALIAS:</div><div class="col-sm-7 col-xs-6 ">{{$customer->aka}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br/>

<div class="col-sm-5 col-xs-6 tital " >D.O.B:</div><div class="col-sm-7 col-xs-6 ">{{Carbon\Carbon::parse($customer->dateOfBirth)->toFormattedDateString()}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br/>

<div class="col-sm-5 col-xs-6 tital " >ADDRESS:</div><div class="col-sm-7 col-xs-6 ">{{$customer->address}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br/>

<div class="col-sm-5 col-xs-6 tital " >EMAIL:</div><div class="col-sm-7 col-xs-6 ">{{$customer->email}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br/>

<div class="col-sm-5 col-xs-6 tital " >PHONE:</div><div class="col-sm-7 col-xs-6 ">{{$customer->phone}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br/>

<div class="col-sm-5 col-xs-6 tital " >GUARANTOR:</div><div class="col-sm-7 col-xs-6 ">{{$customer->guarantor_name}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br/>

<div class="col-sm-5 col-xs-6 tital " >GUARANTOR ADDRESS:</div><div class="col-sm-7 col-xs-6 ">{{$customer->guarantor_address}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br/>

<div class="col-sm-5 col-xs-6 tital " >GUARANTOR PHONE:</div><div class="col-sm-7 col-xs-6 ">{{$customer->guarantor_phone}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<br/><br/>


@if(Auth::user()->can('isAdmin') || Auth::user()->can('isManager') || ($customer->group->user_id == Auth::user()->id))
<div class="floate">
<a href="{{route('customers.edit', $customer->id)}}" class="btn btn-info btn-sm mb-1">edit </a>&nbsp;<form onsubmit="return confirm('Are you sure you want to delete this customer?')" method="post" action="{{route('customers.destroy', $customer->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button> 
      </form>
  </div>
    @endif 
    </div>

  </div>
<hr>


<div class="row">
      <div class="col-xs-12">
<h1>Loan Disbursed to {{$customer->surname}} {{$customer->first_name}}</h1>
    <ul>
@foreach($customer->credits as $credit)
  <li style="list-style: none;">
    <a href="{{route('credits.show', $credit->id)}}"><span class="loan" style="font-size: 25px;">{{$credit->loan->name}}</span></a> {{$credit->loan->principal}} Start Date:  {{Carbon\Carbon::parse($credit->start_date)->toFormattedDateString()}} End Date:  {{Carbon\Carbon::parse($credit->end_date)->toFormattedDateString()}}
 </li>


          <h3>Repayment Details</h3>
                    <table class="table table-striped" style="display: inline-table;font-size: 12px;">
          <thead>
            <tr>
              <td>DATE</td> <td>REPAYMENT</td> <td>SAVINGS</td> <td>EXTRA SAVS</td><td>OUTSTANDING</td><td>ACTIONS</td>
            </tr>   
          </thead>
          
          @php 
          $balance = $credit->loan->principal;
          $x = $credit->loan->principal;
          @endphp
<tbody>          
@foreach($customer->repayments->sortBy('payment_date') as $repayment)
@if($repayment->loan_id == $credit->loan_id)
 @php $balance = $balance - $repayment->installment @endphp
 
    <tr>
    <td><a href="{{route('repayments.show', $repayment->id)}}">{{Carbon\Carbon::parse($repayment->payment_date)->toFormattedDateString()}} </a></td>
    <td>{{$repayment->installment}}</td> 
    <td>{{$repayment->savings}}</td> 
    <td>{{$repayment->extra_savings}}</td> 
    <td>{{$balance}}</td>

    <td style="display:inline-flex;">

@if(Auth::user()->can('isAdmin') || Auth::user()->can('isManager') || ($customer->group->user_id == Auth::user()->id))
    <a href="{{route('repayments.edit', $repayment->id)}}" class="btn btn-info btn-sm mb-2">Edit</a> &nbsp; &nbsp;
        <form onsubmit="return confirm('Are you sure you want to delete this payment?')" method="post" action="{{route('repayments.destroy', $repayment->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-2">Delete</button>
        </form>
@endif
    </td>
    
  </tr>

  @endif

@endforeach
</tbody>
</table>




@if(Auth::user()->can('isAdmin') || Auth::user()->can('isManager') || ($customer->group->user_id == Auth::user()->id))

<form action="{{route('repayments.store')}}" method="post" class="repay">
  @csrf
<fieldset class="row1">
                <legend><h4>Make payment</h4>
                </legend>
                  <label class="obinfo">* obligatory fields
                    </label>
                <p>
                    <label>Installment *
                    </label>
                    <input type="text" name="installment" id="installment"/>
                    <label>Savings
                    </label>
                    <input type="text" name="savings" id="savings"/>
                </p>
                <p>
                    <label>Extra savings
                    </label>
                    <input type="text" name="extra_savings" id="extra_savings"/>
                    <label>Date *
                    </label>
                    <input type="input" name="payment_date" id="payment_date"/>
                    
                </p>
                <input name="customer_id" type="hidden" id="customer_id" value="{{$credit->customer_id}}" />
 <input name="loan_id" type="hidden" id="loan_id" value="{{$credit->loan_id}}" />
 <input name="credit_id" type="hidden" id="credit_id" value="{{$credit->id}}" />

                
            </fieldset>
            <div><button>Submit &raquo;</button></div>
</form>
@endif
<hr>

@endforeach
</ul>
 </div>

  </div>






 </div><!--/center-->



</div><!--/container-fluid-->

<script>
$('#payment_date').datetimepicker({
inline:false,timepicker: false,
});
</script>

@endsection
       


