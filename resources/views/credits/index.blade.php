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

<div class="row">
<div class="col-sm-8">
  <h1 class="display-6">DISBURSED LOANS</h1>


  <table class="table table-striped">
    <thead>
        <tr>
          <td>START DATE</td>
          <td>END DATE</td>
          <td>CUSTOMER NAME</td>
          <td>LOAN</td>
          <td>AMOUNT</td>
          <td>ACTIONS</td>
        </tr>
    </thead>
    <tbody>
        @foreach($credits->sortBy('start_date') as $credit)
        <tr>
            <td><a href="{{ route('credits.show', $credit->id)}}">{{Carbon\Carbon::parse($credit->start_date)->toFormattedDateString()}}</a></td>
            <td>{{Carbon\Carbon::parse($credit->end_date)->toFormattedDateString()}}</td>
            <td><a href="{{ route('customers.show', $credit->customer_id)}}">{{$credit->customer->first_name}} {{$credit->customer->surname}}</a></td>
            <td>{{$credit->loan->name}}</td>
            <td>{{$credit->loan->principal}}</td>
            <td style="display: inline-flex;">
                <a href="{{ route('credits.edit', $credit->id)}}" class="btn btn-info btn-sm mb-1">Edit</a> &nbsp;
                <form onsubmit="return confirm('Are you sure you want to delete this customer?')" action="{{ route('credits.destroy', $credit->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm mb-1" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>


  </div>

  <div class="right_resize">
        <div class="right block">
          <h4><a href="{{ route('home') }}">HOME</a></h4>
          <h2><span>Quick</span> Links</h2>
          <ul>
            <li><a href="{{route('groups.create')}}">Create New Group</a></li>
            <li><a href="{{route('groups.index')}}">Groups</a></li>
            <li><a href="{{route('customers.index')}}">Customers</a></li>
            <li><a href="{{route('loans.index')}}">Loan Types</a></li>
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


