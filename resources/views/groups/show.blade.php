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
          <h2><span>{{$group->name}}</span> Group</h2>

    <div class="col-sm-5 col-xs-6 tital " >Group Name:</div><div class="col-sm-7 col-xs-6 ">{{$group->name}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Meeting Days:</div><div class="col-sm-7 col-xs-6 ">{{$group->meeting_day}}
</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Venue:</div><div class="col-sm-7 col-xs-6 ">{{$group->venue}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Group Leader:</div><div class="col-sm-7 col-xs-6 ">
  @foreach($group->customers->sortByDesc('group_leader') as $leader)
    @if($leader->group_leader == $group->id)
    {{$leader->surname}} {{$leader->middle_name}} {{$leader->first_name}} 
    @endif
    @endforeach
</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>

<div class="col-sm-5 col-xs-6 tital " >Cash Officer:</div><div class="col-sm-7 col-xs-6 ">{{ $group->User->name }} {{$group->User->first_name}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div><br>



<div class="floate">
  @if(
        (Auth::user()->can('isAdmin'))
            ||($group->user_id == Auth::user()->id)||
                (Auth::user()->can('isManager'))
                      )
<a href="{{route('groups.edit', $group->id)}}" class="btn btn-info btn-sm mb-1">edit </a>&nbsp; <form onsubmit="return confirm('Are you sure you want to delete this group?')" method="post" action="{{route('groups.destroy', $group->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button> 
      </form>
      @endif
  </div>
           
        </div>

<hr>

            <div class="row">
      <div class="col-xs-12">


<h2>Customers in {{$group->name}} Group</h2>

                    <table class="table table-striped">
          <thead>
            <tr>
              <td>CARD</td> <td>NAME</td> <td>ALIAS</td> <td>PHONE</td> <td>ADDRESS</td>
              <td colspan="2">ACTIONS</td>
            </tr>   
          </thead>
          <tbody>
@foreach($group->customers->sortByDesc('group_leader') as $customer)

    <tr>
     <td>{{$customer->card_number}}</td>
    <td><a href="{{route('customers.show', $customer->id)}}">{{$customer->surname}} {{$customer->middle_name}} {{$customer->first_name}}</a></td>
    <td>{{$customer->aka}}</td> 
    <td>{{$customer->phone}}</td> 
    <td>{{$customer->address}}</td> 

@if(
        (Auth::user()->can('isAdmin'))
            ||($group->user_id == Auth::user()->id)||
                (Auth::user()->can('isManager'))
                      )
        <td style="display:inline-flex;">
  <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-info btn-sm mb-1">Edit</a> &nbsp; &nbsp;
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



</div><!--/container-fluid
@endsection


