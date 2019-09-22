
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
          <h2><a href="{{route('customers.show', $credit->customer->id)}}">{{$credit->customer->first_name}} {{$credit->customer->surname}}</a></h2>
          
          
<h4>Start Date: <span>{{$credit->start_date}}</span></h4>
<h4>End Date: {{$credit->end_date}}</h4>
<h4><span>{{$credit->loan->name}}</span> Loan Type</h4>



<div class="floate">
<a href="{{route('credits.edit', $credit->id)}}" class="btn btn-info btn-sm mb-1">edit </a>&nbsp;<form onsubmit="return confirm('Are you sure you want to delete this Loan Type?')" method="post" action="{{route('credits.destroy', $credit->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button> 
      </form>
  </div>
           
        </div>
            <div class="bg"></div>



</div><!--end left resise blk-->






             <div class="right_resize">
        <div class="right block">
          <h2><span>Quick</span> Links</h2>
          <ul>
            <li><a href="{{route('loans.create')}}">Create Loan Type
            </a></li>
            <li><a href="{{route('groups.index')}}">Groups</a></li>
            <li><a href="{{route('customers.index')}}">Customers</a></li>
            <li><a href="{{route('loans.index')}}">Loan Types</a></li>
            <li><a href="{{route('credits.index')}}">All Disbursed Loans</a></li>
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



