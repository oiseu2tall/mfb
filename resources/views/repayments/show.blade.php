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
          <h2>{{$repayment->customer->surname}} {{$repayment->customer->first_name}} <span>{{$repayment->loan->name}}</span> Repayment</h2>
          
<h4>Installment: <span>{{$repayment->installment}}</span></h4>
<h4>Savings: {{$repayment->savings}}</h4>
<h4>Extra Savings: {{$repayment->extra_savings}}</h4>
<h4>Payment Date: {{Carbon\Carbon::parse($repayment->payment_date)->toFormattedDateString()}}</h4>



<div class="floate">
  @if(
        (Auth::user()->can('isAdmin'))
            ||($repayment->customer->group->user_id == Auth::user()->id)||
                (Auth::user()->can('isManager'))
                      )
<a href="{{route('repayments.edit', $repayment->id)}}" class="btn btn-info btn-sm mb-1">edit </a>&nbsp;<form onsubmit="return confirm('Are you sure you want to delete this customer repayment?')" method="post" action="{{route('repayments.destroy', $repayment->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button> 
      </form>
      @endif
  </div>
           
        </div>
            <div class="bg"></div>


        


</div><!--end left resise blk-->



             <div class="right_resize">
        <div class="right block">
          <h4><a href="{{ route('home') }}">My Dashboard</a></h4>
          <h2><span>Quick</span> Links</h2>
          <ul>
            <li><a href="{{route('groups.create')}}">Create New Group</a></li>
            <li><a href="{{route('groups.index')}}">Groups</a></li>
            <li><a href="{{route('customers.index')}}">Customers</a></li>
            <li><a href="{{route('loans.index')}}">Loan Types</a></li>
            <li><a href="{{route('credits.index')}}">All Disbursed Loans</a></li>
            @cannot('isCashOfficer')
            <li><a href="{{route('credits.index')}}">All Disbursed Loans</a></li>
            @endcannot

            @can('isAdmin')
            <li><a href="{{route('loans.create')}}">Create New Loan Stage</a></li>
            <li><a href="{{ route('register') }}">Create New User</a></li>
            @endcan
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




</div> 

</div>



    </div>
        </div>
@endsection


