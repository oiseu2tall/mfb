@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Dashboard
                    <div class="top-right links">
                    <!--
                    @can('isAdmin')
                    
                            <a href="{{ route('register') }}">Register User</a>
                        
                    
                    @endcan
                -->
                </div>
                </div>
                <!--
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    You are logged in!
                </div>
            -->
            </div>
        </div>
    </div>



<div class="body_bg">
    <div class="body">
<div class="left_resize block">
        <div class="left">
            
          <h4>User: <span>{{Auth::user()->name}}</span> {{Auth::user()->middle_name}} {{Auth::user()->first_name}}</h4>
          <h4>Role: {{Auth::user()->role}}</h4>
          


<div class="floate">
    <!--
  

  -->
  </div>
           
        </div>
            <div class="bg"></div>


              <div class="left">
                <h2><span>My Groups</span></h2>

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





</div><!--end left resise blk-->



             <div class="right_resize">
        <div class="right block">
          <h2><span>Quick</span> Links</h2>
          <ul>
            <li><a href="{{route('groups.create')}}">Create New Group</a></li>
            <li><a href="{{route('customers.create')}}">Create New Customer</a></li>
            <li><a href="{{route('groups.index')}}">All Groups</a></li>
            <li><a href="{{route('customers.index')}}">All Customers</a></li>
            <li><a href="{{route('loans.index')}}">All Loan Stages</a></li>
            @can('isAdmin')
            <li><a href="{{route('loans.create')}}">Create New Loan Stage</a></li>
            <li><a href="{{ route('register') }}">Create New User</a></li>
            @endcan
            @cannot('isCashOfficer')
            <li><a href="{{route('credits.index')}}">All Disbursed Loans</a></li>
            @endcannot
          </ul>
        </div>




            <div class="right block">
          <h2><span>Search</span></h2>
          <div class="search">



<form action="/search" method="post" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q" id="q" placeholder="Customer name" maxlength="50">
      <button type="submit" class="btn btn-info btn-sm mb-1">Submit</button>
    </div>
</form>

          </div>
          <div class="clr"></div>
        </div>




</div> 

</div>

<!-- my groups
    
-->





@endsection
