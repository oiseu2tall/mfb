@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Credits</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Loan Start Date</td>
          <td>Loan End date</td>
          <td>Customer Name</td>
          <td>Loan Type</td>
          <td>amount</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($credits as $credit)
        <tr>
            <td>{{$credit->start_date}}</td>
            <td>{{$credit->end_date}}</td>
            <td><a href="{{ route('customers.show', $credit->customer_id)}}">{{$credit->customer->first_name}} {{$credit->customer->surname}}</a></td>
            <td>{{$credit->loan->name}}</td>
            <td>{{$credit->loan->principal}}</td>
            <td>
                <a href="{{ route('credits.edit', $credit->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form onsubmit="return confirm('Are you sure you want to delete this customer?')" action="{{ route('credits.destroy', $credit->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection