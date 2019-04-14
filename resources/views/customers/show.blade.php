@extends('layouts.app')

@section('content')
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



  </div>
<a href="{{route('customers.edit', $customer->id)}}">Edit</a>
        <form onsubmit="return confirm('Are you sure you want to delete this customer?')" method="post" action="{{route('customers.destroy', $customer->id)}}">
          @csrf
          @method('delete')
          <button type="submit">Delete</button>
        </form>

</div>
@stop