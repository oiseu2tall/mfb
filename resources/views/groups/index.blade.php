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

  <a href="{{route('groups.create')}}">Create A New Group</a>
  <h1 class="display-6">All Groups</h1>


  <table class="table table-striped">
 
  <thead>
        <tr>
          <td>Name</td>
          <td>Meeting Day</td>
          <td>Cash Officer</td>
          <td colspan="2">Actions</td>
        </tr>
    </thead>
    <tbody>
       @foreach($groups->sortBy('name') as $group)
    <tr>

        <td><a href="{{route('groups.show', $group->id)}}"><span style="color:#35b2ef;">
          {{$group->name}}</span></a></td>

       <td>{{$group->meeting_day}}</td>
       <td>{{$group->user->name}} {{$group->user->middle_name}} {{$group->user->first_name}}</td>


@if(
        (Auth::user()->can('isAdmin'))
            ||($group->user_id == Auth::user()->id)||
                (Auth::user()->can('isManager'))
                      )
        <td style="display: inline-flex;">
        <a href="{{route('groups.edit', $group->id)}}" class="btn btn-info btn-sm mb-1">Edit</a>&nbsp;
    <form onsubmit="return confirm('Are you sure you want to delete this group?')" method="post" action="{{route('groups.destroy', $group->id)}}">
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


