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
     
          <h2>{{$repayment->customer->surname}} {{$repayment->customer->first_name}} <span>{{$repayment->loan->name}}</span> Repayment</h2>

<div class="col-sm-5 col-xs-6 tital " >Installment:</div><div class="col-sm-7 col-xs-6 ">{{$repayment->installment}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Savings:</div><div class="col-sm-7 col-xs-6 ">{{$repayment->savings}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Extra Savings:</div><div class="col-sm-7 col-xs-6 ">{{$repayment->extra_savings}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Payment Date:</div><div class="col-sm-7 col-xs-6 ">{{Carbon\Carbon::parse($repayment->payment_date)->toFormattedDateString()}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="floate">
  @if(
        (Auth::user()->can('isAdmin'))
            ||($repayment->customer->group->user_id == Auth::user()->id)||
                (Auth::user()->can('isManager'))
                      )
<a href="{{route('repayments.edit', $repayment->id)}}" class="btn btn-info btn-sm mb-1">edit </a>&nbsp;<form onsubmit="return confirm('Are you sure you want to delete this customer repayment?')" method="post" action="{{route('repayments.destroy', $repayment->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button> 
      </form>
      @endif
  </div>
           




           </div>

  </div>






 </div><!--/center-->



</div><!--/container-fluid-->

@endsection


