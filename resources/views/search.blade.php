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

  @if(isset($details))
        <p>You searched for <span style="color: #abda0f;">{{ $query }}</span> :</p>
    <h2>SEARCH RESULTS</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>SURNAME</th>
                <th>MIDDLE NAME</th>
                <th>FIRST NAME</th>
                <th>ALIAS</th>
                <th>GROUP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $customer)
            <tr>
                <td><a href="{{route('customers.show', $customer->id)}}">{{$customer->surname}}</a></td>
                <td>{{$customer->middle_name}}</td>
                <td>{{$customer->first_name}}</td>
                <td>{{$customer->aka}}</td>
                <td><a href="{{route('groups.show', $customer->groupid)}}">{{$customer->name}}
                </a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h2>No result found for your search!</h2>
    @endif


  </div>

  <div class="right_resize">
        <div class="right block">
          <h2><span>Quick</span> Links</h2>
          <ul>
            <li><a href="{{route('groups.create')}}">Create New Group</a></li>
            <li><a href="{{route('groups.index')}}">Groups</a></li>
            <li><a href="{{route('customers.index')}}">Customers</a></li>
            <li><a href="{{route('loans.index')}}">Loan Types</a></li>
            <li><a href="{{route('credits.index')}}">Loan Requests</a></li>
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