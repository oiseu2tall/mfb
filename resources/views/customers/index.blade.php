@extends('layouts.app')
@section('content')
<div><a href="{{route('customers.create')}}">Create A New Customer</a></div>
  <h1>All customers</h1>
  @foreach($customers as $customer)
  <div>
    <div>
      <h2>
        <a href="{{route('customers.show', $customer->id)}}">
          {{$customer->first_name}} {{$customer->surname}}
        </a>
       <?php /*{{$customer->meeting_day}} {{$customer->venue}}*/?>
        <a href="{{route('customers.edit', $customer->id)}}">Edit</a>
        <form onsubmit="return confirm('Are you sure you want to delete this customer?')" method="post" action="{{route('customers.destroy', $customer->id)}}">
          @csrf
          @method('delete')
          <button type="submit">Delete</button>
        </form>
      </h2>

    </div>
  </div>
  @endforeach
  
@endsection
