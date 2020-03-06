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
          <h2>CUSTOMER: <a href="{{route('customers.show', $credit->customer->id)}}">{{$credit->customer->first_name}} {{$credit->customer->surname}}</a></h2>
          
   <div class="col-sm-5 col-xs-6 tital " >Start Date:</div><div class="col-sm-7 col-xs-6 ">{{$credit->start_date}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >End Date:</div><div class="col-sm-7 col-xs-6 ">{{$credit->end_date}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >GROUP:</div><div class="col-sm-7 col-xs-6 ">{{$credit->customer->group->name}} Group</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>


<div class="floate">
<a href="{{route('credits.edit', $credit->id)}}" class="btn btn-info btn-sm mb-1">edit </a>&nbsp;<form onsubmit="return confirm('Are you sure you want to delete this Loan Type?')" method="post" action="{{route('credits.destroy', $credit->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button> 
      </form>

</div>

  </div>






 </div><!--/center-->



</div><!--/container-fluid-->
@endsection



