@extends('layouts.form')
@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
@if($errors->all())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif

<div class="body_bg">
    <div class="body">
<div class="left_resize block">
        <div class="left">
          <h2><span>{{$group->name}}</span> Group</h2>
          
<h4>Group Name: <span>{{$group->name}}</span></h4>
<h4>Meeting Days: {{$group->meeting_day}}</h4>
<h4>Venue: {{$group->venue}}</h4>
<h4>Group Leader: </h4>



<div class="floate">
<a href="{{route('groups.edit', $group->id)}}" class="btn btn-info btn-sm mb-1">edit </a>&nbsp;<form onsubmit="return confirm('Are you sure you want to delete this group?')" method="post" action="{{route('groups.destroy', $group->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button> 
      </form>
  </div>
           
        </div>
            <div class="bg"></div>


              <div class="left">


<h2>Customers in {{$group->name}} Group</h2>

                    <table class="table table-striped">
          <thead>
            <tr>
              <td>CARD</td> <td>NAME</td> <td>ALIAS</td> <td>PHONE</td> <td>ADDRESS</td>
              <td colspan="2">ACTIONS</td>
            </tr>   
          </thead>
@foreach($group->customers->sortBy('card_number') as $customer)
<tbody>
    <tr>
     <td>{{$customer->card_number}}</td>
    <td><a href="{{route('customers.show', $customer->id)}}">{{$customer->surname}} {{$customer->middle_name}} {{$customer->first_name}}</a></td>
    <td>{{$customer->aka}}</td> 
    <td>{{$customer->phone}}</td> 
    <td>{{$customer->address}}</td> 
    <td style="display:inline-flex;">
  <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-info btn-sm mb-1">Edit</a> &nbsp; &nbsp;
        <form onsubmit="return confirm('Are you sure you want to delete this customer?')" method="post" action="{{route('customers.destroy', $customer->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button>
        </form>
    </td>

  </tr>
</tbody>

@endforeach
</table>

                
      </div>




</div><!--end left resise blk-->



             <div class="right_resize">
        <div class="right block">
          <h2><span>Quick</span> Links</h2>
          <ul>
            <li><a href="{{route('credits.create')}}" onclick="{{session(['customerid' => $customer->id])}}">Request for loan {{session('customerid')}}</a></li>
            <li><a href="{{route('groups.index')}}">Groups</a></li>
            <li><a href="{{route('customers.index')}}">Customers</a></li>
            <li><a href="{{route('loans.index')}}">Loan Types</a></li>
            <li><a href="{{route('credits.index')}}">Loan Requests</a></li>
          </ul>
        </div>




</div> 

</div>



    </div>
        </div>
@endsection


