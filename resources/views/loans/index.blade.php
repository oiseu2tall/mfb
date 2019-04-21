@extends('layouts.app')
@section('content')
  <div><a href="{{route('loans.create')}}">Create A New Loan Type</a></div>
  <h1>All loans</h1>
  @foreach($loans as $loan)
  <div>
    <div>
      <h2>
        <a href="{{route('loans.show', $loan->id)}}">
          {{$loan->name}}
        </a>
       
        <a href="{{route('loans.edit', $loan->id)}}">Edit</a>
        <form onsubmit="return confirm('Are you sure you want to delete this loan?')" method="post" action="{{route('loans.destroy', $loan->id)}}">
          @csrf
          @method('delete')
          <button type="submit">Delete</button>
        </form>
      </h2>

    </div>
  </div>
  @endforeach
  
@endsection
