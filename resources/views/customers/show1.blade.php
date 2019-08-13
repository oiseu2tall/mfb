@extends('layouts.app')

@section('content')
@if (session()->has('message'))
  <div>
    {{session()->get('message')}}
  </div>
@endif



@if($errors->all())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif


<div>
  <div>
    <h2>{{$customer->first_name}} {{$customer->surname}}</h2>
    <img src="{{ asset('storage/images/'.$customer->image_name) }}" width="250px">
  </div>
  <div>
    <p>
      {{$customer->address}}
    </p>
    <p>
      {{$customer->phone}}
    </p>
    <p>
      {{$customer->dateOfBirth}}
    </p>
    <p>
      {{$customer->email}}
    </p>
    <p>
      {{$customer->group_id}}
    </p>

    @foreach($groups as $group)
    @if($customer->group_id==$group->id)
    <p>
      {{$group->name}} 
      
    </p>
    @endif
    @endforeach

<p>{{$customer->group->name}} </p>
  </div>


<a href="{{route('customers.edit', $customer->id)}}">Edit</a>
        <form onsubmit="return confirm('Are you sure you want to delete this customer?')" method="post" action="{{route('customers.destroy', $customer->id)}}">
          @csrf
          @method('delete')
          <button type="submit">Delete</button>
        </form>




        <h3>Repayments</h3>
        <table>
         <h4> <th>
            <tr>
              <td>DATE</td> <td>INSTALLMENT</td> <td>SAVINGS</td> <td>EXTRA SAVINGS</td> <td>BALANCE</td>
            </tr>
          </th></h4>
@foreach($customer->repayments as $repayment)
<tr>
    <td><a href="{{route('repayments.show', $repayment->id)}}">{{$repayment->payment_date}} </a></td>
    <td>{{$repayment->installment}}</td> 
    <td>{{$repayment->savings}}</td> 
    <td>{{$repayment->extra_savings}}</td> 
    <td>{{$repayment->balance}}</td>
  </tr>
@endforeach
</table>



    <div>

      <a href="{{route('credits.create')}}" onclick="{{session(['customerid' => $customer->id])}}">Request for loan {{session('customerid')}}</a>

    </div>


<div>
    <h2>Customer Loans</h2>
    <ul>
@foreach($customer->credits as $credit)
  <li>
    <a href="{{route('credits.show', $credit->id)}}">{{$credit->loan->name}} {{$credit->loan->principal}}</a>
  </li>



<form action="{{route('repayments.store')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Repayment Installment</label>
    <input type="text" class="form-control" name="installment" id="installment">
  </div>

  <div class="form-group">
    <label for="name">Savings</label>
    <input type="text" class="form-control" name="savings" id="savings">
  </div>

<div class="form-group">
    <label for="name">extra savings</label>
    <input type="text" class="form-control" name="extra_savings" id="extra_savings">
</div>
<div class="form-group">
    <label for="name">Payment date</label>
    <input type="text" class="form-control" name="payment_date" id="payment_date">
  </div>


<div>

 <input name="customer_id" type="hidden" id="customer_id" value="{{$credit->customer_id}}" />
 <input name="loan_id" type="hidden" id="loan_id" value="{{$credit->loan_id}}" />
 <input name="credit_id" type="hidden" id="credit_id" value="{{$credit->id}}" />



  </div>



<div>
    <button type="submit" class="btn btn-primary-outline">Add a Repayment</button>
  </div>
</form>




@endforeach
</ul>
</div>




</div>


@stop