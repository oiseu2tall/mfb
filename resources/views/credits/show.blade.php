@extends('layouts.app')

@section('content')
<div>
  <div>
    <h2>{{$credit->customer->first_name}} {{$credit->customer->surname}}</h2>
  </div>
  <div>
    <p>
      {{$credit->start_date}}
    </p>
    <p>
      {{$credit->end_date}}
    </p>
    <p>
      {{$credit->loan->name}}
    </p>
    


  </div>
<a href="{{route('credits.edit', $credit->id)}}" onclick="return confirm('Are you sure you want to edit this customer LOAN REQUEST?')">Edit</a>
        <form onsubmit="return confirm('Are you sure you want to delete this credit?')" method="post" action="{{route('credits.destroy', $credit->id)}}">
          @csrf
          @method('delete')
          <button type="submit">Delete</button>
        </form>

</div>

@stop
