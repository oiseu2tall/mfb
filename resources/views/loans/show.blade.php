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
          <h2><span>{{$loan->name}}</span> Loan Type</h2>
          
<h4>Loan Type: <span>{{$loan->name}}</span></h4>
<h4>Description: {{$loan->description}}</h4>
<h4>Duration: {{$loan->duration}} weeks</h4>
<h4>Principal: {{$loan->principal}}</h4>
<h4>Interest: {{$loan->interest}}</h4>
<h4>Total Savings: {{$loan->total_savings}}</h4>
<h4>Weekly Installment: {{$loan->weekly_remittance}}</h4>
<h4>Weekly Savings: {{$loan->weekly_savings}}</h4>


@can('isAdmin')
<div class="floate">
<a href="{{route('loans.edit', $loan->id)}}" class="btn btn-info btn-sm mb-2">Edit</a> &nbsp; &nbsp;
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


