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
      <h2><i class="fa fa-user"></i>  <span style="text-transform: uppercase;">{{Auth::user()->name}}</span> {{Auth::user()->middle_name}} {{Auth::user()->first_name}}</h2>
      <h4> Role: {{Auth::user()->role}}</h4>
      <hr>
      <h3>My Groups</h3>
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
       @foreach($mygroups->sortBy('name') as $group)
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
    </div>
    <hr>
    <div class="row">
      <div class="col-xs-12">
        @can('isAdmin')

<h2><span>All Users</span></h2>
@foreach($users->sortBy('name') as $user)
<div class="blok">
    
    <h4 style="display: inline;">{{$user->name}} {{$user->middle_name}} {{$user->first_name}}</h4>- {{$user->role}}

<div class="floate">
<a href="{{route('users.edit', $user->id)}}" class="btn btn-info btn-sm mb-1">edit </a>&nbsp;<form onsubmit="return confirm('Are you sure you want to delete this user?')" method="post" action="{{route('users.destroy', $user->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button> 
      </form>
</div>

    <br /><br/><br/><br/>
    <caption><span style="color: green">GROUPS</span></caption>
    <ul style="list-style:none;">
        @foreach($user->groups as $group)
        <li><a href="{{route('groups.show', $group->id)}}">{{$group->name}}</a></li>
        @endforeach
    </ul>


</div><!--end blok-->
@endforeach

@endcan
        
      </div>
    </div>
    <hr>      
 




  </div><!--/center-->



</div><!--/container-fluid-->

@endsection
