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
          <h2><span>{{$loan->name}}</span> Loan</h2>

<div class="col-sm-5 col-xs-6 tital " >Loan Type:</div><div class="col-sm-7 col-xs-6 ">{{$loan->name}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Description:</div><div class="col-sm-7 col-xs-6 ">{{$loan->description}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Duration:</div><div class="col-sm-7 col-xs-6 ">{{$loan->duration}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Principal:</div><div class="col-sm-7 col-xs-6 ">{{$loan->principal}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>


<div class="col-sm-5 col-xs-6 tital " >Interest:</div><div class="col-sm-7 col-xs-6 ">{{$loan->interest}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Total Savings:</div><div class="col-sm-7 col-xs-6 ">{{$loan->total_savings}}
</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Weekly Installment:</div><div class="col-sm-7 col-xs-6 ">{{$loan->weekly_remittance}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Weekly Savings:</div><div class="col-sm-7 col-xs-6 ">{{$loan->weekly_savings}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>


@can('isAdmin')
<div class="floate">
<a href="{{route('loans.edit', $loan->id)}}" class="btn btn-info btn-sm mb-2">Edit</a> &nbsp;
        <form onsubmit="return confirm('Are you sure you want to delete this loan')" method="post" action="{{route('loans.destroy', $loan->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-2">Delete</button>
        </form>
  </div>
   @endcan        
        
         </div>

  </div>






 </div><!--/center-->



</div><!--/container-fluid-->
@endsection


