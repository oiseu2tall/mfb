
@extends('layouts.form')
@section('content')

@if($errors->all())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif

<div class="body_bg">
    <div class="register">

      <div class="right_resize">
        <div class="right block">
          <h2><span style="color: #abda0f;">Quick</span> Links</h2>
          <ul>
            <li><a href="{{route('customers.create')}}">Create New Customer</a></li>
            <li><a href="{{route('groups.index')}}">Groups</a></li>
            <li><a href="{{route('customers.index')}}">Customers</a></li>
            <li><a href="{{route('loans.index')}}">Loan Types</a></li>
            <li><a href="{{route('credits.index')}}">Loan Requests</a></li>
          </ul>
        </div>
  </div>

<div class="row">

<div class="right_resize">
        <div class="right block">
          <h2><span style="color: #abda0f;">Quick</span> Links</h2>
          <ul>
            <li><a href="{{route('customers.create')}}">Create New Customer</a></li>
            <li><a href="{{route('groups.index')}}">Groups</a></li>
            <li><a href="{{route('customers.index')}}">Customers</a></li>
            <li><a href="{{route('loans.index')}}">Loan Types</a></li>
            <li><a href="{{route('credits.index')}}">Loan Requests</a></li>
          </ul>
        </div>
  </div>

<div class="col-sm-2">

  <h4><a href="{{route('customers.create')}}">Create New Customer</a></h4>
  <h1 class="display-4">Customers</h1>


  <table class="table table-striped">
 
  <thead>
        <tr>
          <td>CARD NO.</td>
          <td>NAME</td>
          <td>ALIAS</td>
          <td>ADDRESS</td>
          <td>PHONE</td>
          <td>GUARANTOR</td>
          <td>GROUP</td>
          <td colspan="2">ACTIONS</td>
        </tr>
    </thead>
    <tbody>
       @foreach($customers as $customer)
    <tr>
         <td>{{$customer->card_number}}</td>
        <td><a href="{{route('customers.show', $customer->id)}}"><span style="color:#abda0f;;">
          {{$customer->surname}}</span> {{$customer->first_name}}</a></td>
      
       <td>{{$customer->aka}}</td>
       <td>{{$customer->address}}</td>
       <td>{{$customer->phone}}</td>
       <td>{{$customer->guarantor_name}}</td>
       <td><a href="{{route('groups.show', $customer->group_id)}}">{{$customer->Group->name}}</a></td>
        <td style="display: inline-flex;">
        <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-info btn-sm mb-1">Edit</a>&nbsp;
    <form onsubmit="return confirm('Are you sure you want to delete this customer?')" method="post" action="{{route('customers.destroy', $customer->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button>
        </form>
      </td>
</tr>
    
  @endforeach
</tbody>
</table>


  </div>
</div>
<div class="bg"></div>
  



<!--
<div class="right_resize">
        <div class="right block">
          <h2><span>Quick</span> Links</h2>
          <ul>
            <li><a href="{{route('customers.create')}}">Create New Customer</a></li>
            <li><a href="{{route('groups.index')}}">Groups</a></li>
            <li><a href="{{route('customers.index')}}">Customers</a></li>
            <li><a href="{{route('loans.index')}}">Loan Types</a></li>
            <li><a href="{{route('credits.index')}}">Loan Requests</a></li>
          </ul>
        </div>
  </div>
-->


</div>
</div>


@endsection
