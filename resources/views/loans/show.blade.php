@extends('layouts.app')

@section('content')
<div>
  <div>
  <h2>{{$loan->name}} Loan</h2>
  </div>
  <div>
    <p>
     description: {{$loan->description}}
    </p>
    <p>
     duration: {{$loan->duration}} weeks
    </p>
    <p>
     principal: {{$loan->principal}}
    </p>
    <p>
     interest: {{$loan->interest}}
    </p>
    <p>
      total savings: {{$loan->total_savings}}
    </p>
    <p>
      weekly remittance: {{$loan->weekly_remittance}}
    </p>
    <p>
      weekly savings: {{$loan->weekly_savings}}
    </p>
    <p>
    interest rate:  {{$loan->interest_rate}}
    </p>
  </div>



<a href="{{route('loans.edit', $loan->id)}}">Edit</a>
        <form onsubmit="return confirm('Are you sure you want to delete this loan?')" method="post" action="{{route('loans.destroy', $loan->id)}}">
          @csrf
          @method('delete')
          <button type="submit">Delete</button>
        </form>



</div>

@stop