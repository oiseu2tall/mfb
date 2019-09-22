

@extends('layouts.form')
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
          <h2><span>{{$loan->name}}</span> Loan Type</h2>
          
<h4>Loan Type: <span>{{$loan->name}}</span></h4>
<h4>Description: {{$loan->description}}</h4>
<h4>Duration: {{$loan->duration}} weeks</h4>
<h4>Principal: {{$loan->principal}}</h4>
<h4>Interest: {{$loan->interest}}</h4>
<h4>Total Savings: {{$loan->total_savings}}</h4>
<h4>Weekly Installment: {{$loan->weekly_remittance}}</h4>
<h4>Weekly Savings: {{$loan->weekly_savings}}</h4>



<div class="floate">
<a href="{{route('loans.edit', $loan->id)}}" class="btn btn-info btn-sm mb-1">edit </a>&nbsp;<form onsubmit="return confirm('Are you sure you want to delete this Loan Type?')" method="post" action="{{route('loans.destroy', $loan->id)}}">
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


