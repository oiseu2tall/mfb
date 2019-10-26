
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

  <a href="{{route('loans.create')}}">Create A New Loan</a>
  <h1 class="display-6">All Loan Types</h1>


  <table class="table table-striped">
 
  <thead>
        <tr>
          <td>NAME</td>
          <td>PRICIPAL</td>
          <td>INTREST</td>
          <td>DURATION</td>
          <td>WEEKLY REMITTANCE</td>
          <td colspan="2">ACTIONS</td>
        </tr>
    </thead>
    <tbody>
       @foreach($loans as $loan)
    <tr>
      
        <td><a href="{{route('loans.show', $loan->id)}}"><span style="color:#35b2ef;">
          {{$loan->name}}</span></a></td>
       <td>{{$loan->principal}}</td>
       <td>{{$loan->interest}}</td>
       <td>{{$loan->duration}}</td>
       <td>{{$loan->weekly_remittance}}</td>
       @can('isAdmin')
        <td style="display: inline-flex;">
        <a href="{{route('loans.edit', $loan->id)}}" class="btn btn-info btn-sm mb-1">Edit</a>&nbsp;
    <form onsubmit="return confirm('Are you sure you want to delete this loan type?')" method="post" action="{{route('loans.destroy', $loan->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button>
        </form>
      </td>
      @endcan
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
            <li><a href="{{route('loans.create')}}">Create Loan Type</a></li>
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
