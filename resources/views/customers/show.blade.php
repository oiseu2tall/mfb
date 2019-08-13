@extends('layouts.app')

@section('content')
@if (session()->has('message'))
  <div>
    {{session()->get('message')}}
  </div>
@endif



@if($errors->all())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif


@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-tachometer-alt"></i> CUSTOMER INFORMATION
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                        <div class="col col-sm-4 order-1 order-sm-2  mb-4">
                            <div class="card mb-4 bg-light">
            <img class="card-img-top" src="{{ asset('storage/images/'.$customer->image_name) }}" alt="Profile Picture" width="250px">

                                <div class="card-body">
                                    <h3 class="card-title">
                                      {{$customer->surname}} {{$customer->first_name}}<br/>
                                    </h3>

                                    <p class="card-text">
                                        <small>
                                            <i class="fas fa-envelope"></i> {{$customer->email}}<br/>
                                            <i class="fas fa-calendar-check"></i> {{$customer->group->name}}
                                        </small>
                                    </p>

    <p class="card-text">

                                        <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-info btn-sm mb-1">
                                            <i class="fas fa-user-circle">edit</i> 
                                        </a>&nbsp;

                                        <form onsubmit="return confirm('Are you sure you want to delete this customer?')" method="post" action="{{route('customers.destroy', $customer->id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button>
          <i class="fas fa-user-secret"></i> 
        </form>
                                        
     </p>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h4 class="card-title">Info card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div><!--card-->
                        </div><!--col-md-4-->

                        <div class="col-md-8 order-2 order-sm-1">
                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Repayments
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            
<div class="row">
  <div class="col-sm-12">

        <table class="table table-stripped">
          <th>
            <tr>
              <td>DATE</td> <td>INSTALLMENT</td> <td>SAVINGS</td> <td>EXTRA SAVINGS</td> <td>BALANCE</td>
            </tr>
          </th>
@foreach($customer->repayments as $repayment)
<tr>
    <td><a href="{{route('repayments.show', $repayment->id)}}">{{$repayment->payment_date}} </a></td>
    <td>{{$repayment->installment}}</td> 
    <td>{{$repayment->savings}}</td> 
    <td>{{$repayment->extra_savings}}</td> 
    <td>{{$repayment->balance}}</td>
  </tr>
@endforeach
</table>
</div>

</div>





                                        </div><!--card-body-->
                                        <a href="{{route('credits.create')}}" onclick="{{session(['customerid' => $customer->id])}}">Request for loan {{session('customerid')}}</a>

                                    </div><!--card-->

                                </div><!--col-md-6-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            2Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->

                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            3Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                           4 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="w-100"></div>

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            5Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->
                        </div><!--col-md-8-->
                    </div><!-- row -->
                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
@endsection



@stop