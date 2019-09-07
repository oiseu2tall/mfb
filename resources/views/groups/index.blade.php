@extends('layouts.app')
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

<div class="row">
<div class="col-sm-8">

  <a href="{{route('groups.create')}}">Create A New Group</a>
  <h1 class="display-6">All Groups</h1>


  <table class="table table-striped">
 
  <thead>
        <tr>
          <td>Name</td>
          <td>Meeting Day</td>
          <td>Venue</td>
          <td colspan="2">Actions</td>
        </tr>
    </thead>
    <tbody>
       @foreach($groups as $group)
    <tr>
      
        <td><a href="{{route('groups.show', $group->id)}}"><span style="color:#35b2ef;">
          {{$group->name}}</span></a></td>
       <td>{{$group->meeting_day}}</td>
       <td>{{$group->venue}}</td>
        <td style="display: inline-flex;">
        <a href="{{route('groups.edit', $group->id)}}" class="btn btn-info btn-sm mb-1">Edit</a>&nbsp;
    <form onsubmit="return confirm('Are you sure you want to delete this group?')" method="post" action="{{route('groups.destroy', $group->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button>
        </form>
      </td>
</tr>
    
  @endforeach
</tbody>
</table>


  </div>

  <div class="right_resize">
        <div class="right block">
          <h2><span>Quick</span> Links</h2>
          <ul>
            <li><a href="{{route('groups.create')}}">Create New Group</a></li>
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


