@extends('layouts.app')

@section('content')
@if (session()->has('message'))
  <div>
    {{session()->get('message')}}
  </div>
@endif
<div>
  <div>
    <h2>{{$customer->first_name}} {{$customer->surname}}</h2>
  </div>
  <div>
    <p>
      {{$customer->address}}
    </p>
    <p>
      {{$customer->phone}}
    </p>
    <p>
      {{$customer->dateOfBirth}}
    </p>
    <p>
      {{$customer->email}}
    </p>
    <p>
      {{$customer->group_id}}
    </p>

    @foreach($groups as $group)
    @if($customer->group_id==$group->id)
    <p>
      {{$group->name}} 
      
    </p>
    @endif
    @endforeach

<p>{{$customer->group->name}} </p>


  </div>
<a href="{{route('customers.edit', $customer->id)}}">Edit</a>
        <form onsubmit="return confirm('Are you sure you want to delete this customer?')" method="post" action="{{route('customers.destroy', $customer->id)}}">
          @csrf
          @method('delete')
          <button type="submit">Delete</button>
        </form>

<?php 
    session(['customerid' => $customer->id]);
    $x= session('customerid');

?>
    <div>

      <a href="{{route('credits.create')}}">Request for loan {{$x}}</a>

    </div>


<div>
    <h2>Customer Loans</h2>
    <ul>
@foreach($customer->credits as $credit)
  <li>
    <a href="{{route('credits.show', $credit->id)}}">{{$credit->loan->name}} {{$credit->loan->principal}}</a>
  </li>
@endforeach
</ul>
</div>
    

</div>


@stop