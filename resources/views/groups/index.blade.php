@extends('layouts.app')
@section('content')
  <div><a href="{{route('groups.create')}}">Create A New Group</a></div>
  <h1>All groups</h1>
  @foreach($groups as $group)
  <div>
    <div>
      <h2>
        <a href="{{route('groups.show', $group->id)}}">
          {{$group->name}}
        </a>
       <?php /*{{$group->meeting_day}} {{$group->venue}}*/?>
        <a href="{{route('groups.edit', $group->id)}}">Edit</a>
        <form onsubmit="return confirm('Are you sure you want to delete this group?')" method="post" action="{{route('groups.destroy', $group->id)}}">
          @csrf
          @method('delete')
          <button type="submit">Delete</button>
        </form>
      </h2>

    </div>
  </div>
  @endforeach
  
@endsection
