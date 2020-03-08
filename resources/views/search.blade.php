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

  @if(isset($details))
        <p>You searched for <span style="color: #abda0f; font-size: 22px;">{{ $query }}</span> :</p>
    <h2>SEARCH RESULTS</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>SURNAME</th>
                <th>MIDDLE NAME</th>
                <th>FIRST NAME</th>
                <th>ALIAS</th>
                <th>GROUP</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $customer)
            <tr>
                <td><a href="{{route('customers.show', $customer->id)}}">{{$customer->surname}}</a></td>
                <td>{{$customer->middle_name}}</td>
                <td>{{$customer->first_name}}</td>
                <td>{{$customer->aka}}</td>
                <td><a href="{{route('groups.show', $customer->groupid)}}">{{$customer->name}}
                </a></td>

 @if(
        (Auth::user()->can('isAdmin'))
            ||($customer->user_id == Auth::user()->id)||
                (Auth::user()->can('isManager'))
                )
        <td style="display: inline-flex;">
        <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-info btn-sm mb-1">Edit</a>&nbsp;
    <form onsubmit="return confirm('Are you sure you want to delete this customer?')" method="post" action="{{route('customers.destroy', $customer->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button>
        </form>
      </td>
      @endif


            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h2>No result found for your search!</h2>
    @endif

</div>

  </div>






 </div><!--/center-->



</div><!--/container-fluid-->



@endsection