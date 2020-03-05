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
  <h1 class="display-6">DISBURSED LOANS</h1>


  <table class="table table-striped">
    <thead>
        <tr>
          <td>START DATE</td>
          <td>END DATE</td>
          <td>CUSTOMER NAME</td>
          <td>LOAN</td>
          <td>AMOUNT</td>
          <td>ACTIONS</td>
        </tr>
    </thead>
    <tbody>
        @foreach($credits->sortBy('start_date') as $credit)
        <tr>
            <td><a href="{{ route('credits.show', $credit->id)}}">{{Carbon\Carbon::parse($credit->start_date)->toFormattedDateString()}}</a></td>
            <td>{{Carbon\Carbon::parse($credit->end_date)->toFormattedDateString()}}</td>
            <td><a href="{{ route('customers.show', $credit->customer_id)}}">{{$credit->customer->first_name}} {{$credit->customer->surname}}</a></td>
            <td>{{$credit->loan->name}}</td>
            <td>{{$credit->loan->principal}}</td>
            <td style="display: inline-flex;">
                <a href="{{ route('credits.edit', $credit->id)}}" class="btn btn-info btn-sm mb-1">Edit</a> &nbsp;
                <form onsubmit="return confirm('Are you sure you want to delete this customer?')" action="{{ route('credits.destroy', $credit->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm mb-1" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>


          </div>

  </div>






 </div><!--/center-->



</div><!--/container-fluid-->


@endsection


