@extends('layouts.form')
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
          <img src="{{ asset('storage/images/'.$customer->image_name) }}" alt="Profile Picture" width="150" class="floated" />
<h4>Group: <a href="{{route('groups.show', $customer->group_id)}}">{{$customer->group->name}}</a></h4>
<h4>Card Number: {{$customer->card_number}}</h4>
<h4>Alias: {{$customer->aka}}</h4>
<h4>Date of birth: {{$customer->dateOfBirth}}</h4>
<h4>Address: {{$customer->address}}</h4>
<h4>Email: {{$customer->email}}</h4>
<h4>Phone: {{$customer->phone}}</h4>
<h4>Guarantor name: {{$customer->guarantor_name}}</h4>
<h4>Guarantor Address: {{$customer->guarantor_address}}</h4>
<h4>Guarantor Phone: {{$customer->guarantor_phone}}</h4>



<div class="floate">
<a href="{{route('customers.edit', $customer->id)}}" class="btn btn-info btn-sm mb-1">edit </a>&nbsp;<form onsubmit="return confirm('Are you sure you want to delete this customer?')" method="post" action="{{route('customers.destroy', $customer->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button> 
      </form>
  </div>
           
        </div>
            <div class="bg"></div>


              <div class="left">


<h2>Customer Loans</h2>
    <ul>
@foreach($customer->credits as $credit)
  <li class="bg">
    <a href="{{route('credits.show', $credit->id)}}"><span class="loan">{{$credit->loan->name}} {{$credit->loan->principal}}</span></a>
 </li>



          <h1>Repayment Details</h1>
                    <table class="table table-striped">
          <thead>
            <tr>
              <td>DATE</td> <td>INSTALLMENT</td> <td>SAVINGS</td> <td>EXTRA SAVINGS</td> <td>LOAN TYPE</td><td>BALANCE</td><td>ACTIONS</td>
            </tr>   
          </thead>
@foreach($customer->repayments as $repayment)
@if($repayment->loan_id == $credit->loan_id)
<tbody>
    <tr>
    <td><a href="{{route('repayments.show', $repayment->id)}}">{{$repayment->payment_date}} </a></td>
    <td>{{$repayment->installment}}</td> 
    <td>{{$repayment->savings}}</td> 
    <td>{{$repayment->extra_savings}}</td> 
    <td>{{$repayment->loan->name}}</td>
    <td>{{$repayment->balance}}</td>
    <td style="display:inline-flex;">
    <a href="{{route('repayments.edit', $repayment->id)}}" class="btn btn-info btn-sm mb-1">Edit</a> &nbsp; &nbsp;
        <form onsubmit="return confirm('Are you sure you want to delete this payment?')" method="post" action="{{route('repayments.destroy', $repayment->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button>
        </form>
    </td>

    <!--
    <td><a href="{{route('repayments.edit', $repayment->id)}}">Edit </a> <a href="{{route('repayments.destroy', $repayment->id)}}">DELETE</a></td>
    -->

    
  </tr>
</tbody>
  @endif
@endforeach
</table>






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
                    <input type="text" name="payment_date" id="payment_date"/>
                    
                </p>
                <input name="customer_id" type="hidden" id="customer_id" value="{{$credit->customer_id}}" />
 <input name="loan_id" type="hidden" id="loan_id" value="{{$credit->loan_id}}" />
 <input name="credit_id" type="hidden" id="credit_id" value="{{$credit->id}}" />

                
            </fieldset>
            <div><button style="background-color: #abda0f; color: #fff;">Submit &raquo;</button></div>
</form>



@endforeach
</ul>
                
      </div>




</div><!--end left resise blk-->



             <div class="right_resize">
        <div class="right block">
          <h2><span>Quick</span> Links</h2>
          <ul>
            <li><a href="{{route('credits.create')}}" onclick="{{session(['customerid' => $customer->id])}}">Request for loan {{session('customerid')}}</a></li>
            <li><a href="{{route('groups.index')}}">Groups</a></li>
            <li><a href="{{route('customers.index')}}">Customers</a></li>
            <li><a href="{{route('loans.index')}}">Loan Types</a></li>
            <li><a href="{{route('credits.index')}}">Loan Requests</a></li>
          </ul>
        </div>




</div> 

</div>



    </div>
        </div>
@endsection


