@extends('layouts.app')

@section('content')
<div>
  <div>
    <h2>{{$group->name}}</h2>
  </div>
  <div>
    <p>
      {{$group->venue}}
    </p>
    <p>
      {{$group->meeting_day}}
    </p>
  </div>
<a href="{{route('groups.edit', $group->id)}}">Edit</a>
        <form onsubmit="return confirm('Are you sure you want to delete this group?')" method="post" action="{{route('groups.destroy', $group->id)}}">
          @csrf
          @method('delete')
          <button type="submit">Delete</button>
        </form>

</div>
@stop