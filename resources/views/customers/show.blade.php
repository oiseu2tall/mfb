<!--use Carbon\Carbon;-->
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

<div class="body_bg">
    <div class="body">

<div class="left_resize block">
        <div class="left">
          <h2><span>{{$customer->surname}} </span>{{$customer->middle_name}} {{$customer->first_name}}</h2>
          <img src="{{ asset('images/'.$customer->image_name) }}" alt="Profile Picture" width="200" class="floated" />
    <div style="float:right; width: 400px; display: block; border: 1px solid #eee; padding: 20px; font-size: 14px; ">
<h4>
  CASH OFFICER: {{$customer->group->user->name}} {{$customer->group->user->middle_name}} {{$customer->group->user->first_name}}
</h4>          
<h4>GROUP: <a href="{{route('groups.show', $customer->group_id)}}">{{$customer->group->name}}</a></h4>
<h6>CARD NUMBER:</h6> {{$customer->card_number}}<br/>
<h6>ALIAS:</h6> {{$customer->aka}}<br/>
<h6>D.O.B:</h6> {{Carbon\Carbon::parse($customer->dateOfBirth)->toFormattedDateString()}}<br/>
<h6>ADDRESS:</h6> <span style="text-align: center; display: inline-block;">{{$customer->address}}</span><br/>
<h6>EMAIL:</h6> {{$customer->email}}<br/>
<h6>PHONE:</h6> {{$customer->phone}}<br/>
<h6>GUARANTOR:</h6> {{$customer->guarantor_name}}<br/>
<h6>GUARANTOR ADDRESS:</h6><span style="text-align: center; display: inline-block;"> {{$customer->guarantor_address}}</span><br/><br/>
<h6>GUARANTOR PHONE: </h6>{{$customer->guarantor_phone}}<br/><br/>


@if(Auth::user()->can('isAdmin') || Auth::user()->can('isManager') || ($customer->group->user_id == Auth::user()->id))
<div class="floate">
<a href="{{route('customers.edit', $customer->id)}}" class="btn btn-info btn-sm mb-1">edit </a>&nbsp;<form onsubmit="return confirm('Are you sure you want to delete this customer?')" method="post" action="{{route('customers.destroy', $customer->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button> 
      </form>
  </div>
    @endif 
    </div><!--dummy-->      
        </div>
            <div class="bg"></div>


              <div class="left">


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
                    <input type="date" name="payment_date" id="payment_date"/>
                    
                </p>
                <input name="customer_id" type="hidden" id="customer_id" value="{{$credit->customer_id}}" />
 <input name="loan_id" type="hidden" id="loan_id" value="{{$credit->loan_id}}" />
 <input name="credit_id" type="hidden" id="credit_id" value="{{$credit->id}}" />

                
            </fieldset>
            <div><button style="background-color: #abda0f; color: #fff;">Submit &raquo;</button></div>
</form>
@endif
<div class="bg"></div>

@endforeach
</ul>
                
      

 </div>


</div><!--end left resise blk-->



             <div class="right_resize">
        <div class="right block">
          <h4><a href="{{ route('home') }}">My Dashboard</a></h4>
          <h2><span>Quick</span> Links</h2>
          <ul>

            <li><a href="{{route('credits.create')}}" onclick="{{session(['customerid' => $customer->id])}}">Give Loan to {{$customer->surname}} {{$customer->middle_name}} {{$customer->first_name}} <!--{{session('customerid')}}--></a></li>
            <li><a href="{{route('customers.create')}}">Create New Customer</a></li>
            <li><a href="{{route('groups.index')}}">Groups</a></li>
            <li><a href="{{route('customers.index')}}">Customers</a></li>
            <li><a href="{{route('loans.index')}}">All Loans Types</a></li>
            
            @can('isAdmin')
            <li><a href="{{route('loans.create')}}">Create New Loan Stage</a></li>
            <li><a href="{{ route('register') }}">Create New User</a></li>
            @endcan
            @cannot('isCashOfficer')
            <li><a href="{{route('credits.index')}}">All Disbursed Loans</a></li>
            @endcannot
            
          </ul>
        </div>




            <div class="right block">
          <h2><span>Search</span></h2>
          <div class="search">



<form action="/search" method="post" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q" id="q" placeholder="Customer name" maxlength="50">
      <button type="submit" class="btn btn-info btn-sm mb-1">Submit</button>
    </div>
</form>

          </div>
          <div class="clr"></div>
        </div>
</div><!--end right resize block-->



</div> 

</div>



    </div>
        </div>
        

@endsection


