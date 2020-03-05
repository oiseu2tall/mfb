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
     

  <h4><a href="{{route('customers.create')}}">Create New Customer</a></h4>
  <h1 class="display-4">Customers</h1>

  <table class="table table-striped">
 
  <thead>
        <tr>
          <td>CARD NO.</td>
          <td>NAME</td>
          <td>ALIAS</td>
          <td>PHONE</td>
          <td>GUARANTOR</td>
          <td>GROUP</td>
          <td colspan="2">ACTIONS</td>
        </tr>
    </thead>
    <tbody>
       @foreach($customers as $customer)
    <tr>
         <td>{{$customer->card_number}}</td>
        <td><a href="{{route('customers.show', $customer->id)}}"><span style="color:#abda0f;;">
          {{$customer->surname}}</span> {{$customer->first_name}}</a></td>
      
       <td>{{$customer->aka}}</td>
       <td>{{$customer->phone}}</td>
       <td>{{$customer->guarantor_name}}</td>
       <td><a href="{{route('groups.show', $customer->group_id)}}">{{$customer->Group->name}}</a></td>

       @if(
        (Auth::user()->can('isAdmin'))
            ||($customer->group->user_id == Auth::user()->id)||
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

 </div>

  </div>






 </div><!--/center-->



</div><!--/container-fluid-->




@endsection
