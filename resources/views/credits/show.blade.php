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
          
          
<h4>Start Date: <span>{{$credit->start_date}}</span></h4>
<h4>End Date: {{$credit->end_date}}</h4>
<h4><span>{{$credit->loan->name}}</span> Loan Type</h4>
<h4>{{$credit->customer->group->name}} Group</h4>


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



