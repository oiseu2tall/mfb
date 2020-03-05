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

  <a href="{{route('loans.create')}}">Create A New Loan</a>
  <h1 class="display-6">All Loan Types</h1>


  <table class="table table-striped">
 
  <thead>
        <tr>
          <td>NAME</td>
          <td>PRINCIPAL</td>
          <td>INTEREST</td>
          <td>DURATION<br/>(weeks)</td>
          <td>WEEKLY REMITTANCE</td>
          <td colspan="2">ACTIONS</td>
        </tr>
    </thead>
    <tbody>
       @foreach($loans as $loan)
    <tr>
      
        <td><a href="{{route('loans.show', $loan->id)}}"><span style="color:#35b2ef;">
          {{$loan->name}}</span></a></td>
       <td>{{$loan->principal}}</td>
       <td>{{$loan->interest}}</td>
       <td>{{$loan->duration}}</td>
       <td>{{$loan->weekly_remittance}}</td>
       @can('isAdmin')
        <td style="display: inline-flex;">
        <a href="{{route('loans.edit', $loan->id)}}" class="btn btn-info btn-sm mb-1">Edit</a>&nbsp;
    <form onsubmit="return confirm('Are you sure you want to delete this loan type?')" method="post" action="{{route('loans.destroy', $loan->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button>
        </form>
      </td>
      @endcan
</tr>
    
  @endforeach
</tbody>
</table>


 </div>

  </div>






 </div><!--/center-->



</div><!--/container-fluid-->


@endsection
