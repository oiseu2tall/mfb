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

@if (session()->has('message'))
  <div>
    {{session()->get('message')}}
  </div>
@endif

<form action="{{route('customers.update', $customer->id)}}" method="post" enctype="multipart/form-data" class="register">
  @csrf
  @method('put')

  <h1>Edit Customer</h1>

 <fieldset class="row1">
                <legend>Personal Information
                </legend>
                  <label class="obinfo">* obligatory fields
                    </label>
                <p>
                    <label>Passport *
                    </label>
                    <input type="file" name="image" class="long"/>
                    <label>Card Number *
                    </label>
  <input type="text" name="card_number" id="card_number" value='{{$customer->card_number}}'/>
                 </p>
                  <p>
                    <label>Surname *
                    </label>
    <input type="text" name="surname" id="surname" value='{{$customer->surname}}'/>
                    <label>First Name*
                    </label>
    <input type="text" name="first_name" id="first_name" value='{{$customer->first_name}}'/>
                </p>
                <p>
                    <label class="optional">Middle Name
                    </label>
  <input type="text" name="middle_name" id="middle_name" value='{{$customer->middle_name}}'/>
                    <label class="optional">Alias
                    </label>
  <input type="text" name="aka" id="aka"value='{{$customer->aka}}'/>
                </p>
                
            </fieldset>

<fieldset class="row2">
                <legend>Other Details
                </legend>
                <p>
                    <label>Date of birth *
                    </label>
<input type="text" name="dateOfBirth" id="dateOfBirth"value='{{$customer->dateOfBirth}}'/>
                </p>
                <p>
                    <label>Address *
                    </label>
  <input type="text" name="address" id="address" value='{{$customer->address}}'/>
                </p>
                <p>
                    <label>Phone *
                    </label>
<input type="text" name="phone" id="phone" maxlength="11" value='{{$customer->phone}}'/>
                </p>
                <p>
                    <label class="optional">Email
                    </label>
  <input type="text" name="email" id="email" value='{{$customer->email}}'class="long"/>
                </p>

                <p>
                    <label>Group *
                    </label>
                    <select name="group_id" id="group_id">
                        @foreach($groups as $group)
        @if($group->id==$customer->group_id)
        <option value='{{ $group->id }}' selected>{{$group->name}}</option>
        @else
        <option value='{{ $group->id }}'>{{$group->name}}</option>
        @endif
                          @endforeach
                    </select>
                </p>
                
   </fieldset>

   <fieldset class="row3">
                <legend>Guarantor Details
                </legend>
                <p>
                    <label>Guarantor Name*
                    </label>
                    <input type="text" name="gname" id="gname" value='{{$customer->gname}}'/>
                </p>
                <p>
                    <label>Guarantor Address*
                    </label>
                    <input type="text" name="gaddress" id="gaddress" value='{{$customer->gaddress}}'/>
                </p>
                <p>
                    <label>Guarantor Phone*
                    </label>
                    <input type="text" name="gphone" id="gphone" maxlength="11" value='{{$customer->gphone}}'/>
                </p>
    </fieldset>



<div><button class="button">Submit &raquo;</button></div>
</form>

    </div>
        </div>
@endsection






<div class="col-md-6">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control">
  </div>
  <div>
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" value='{{$customer->first_name}}'>
  </div>
  <div>
    <label for="surname">Surname</label>
    <input type="text" name="surname" id="surname" value='{{$customer->surname}}'>
  </div>
  <div>
    <label for="dateOfBirth">Date of Birth</label>
    <input type="text" name="dateOfBirth" id="dateOfBirth" value='{{$customer->dateOfBirth}}'>
  </div>
    <div>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value='{{$customer->email}}'>
  </div>
    <div>
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value='{{$customer->phone}}'>
  </div>
  <div>
    <label for="address">Address</label>
    <input type="text" name="address" id="address" value='{{$customer->address}}'>
  </div>

<div>
  <label for="group_id">Group</label>
   <select name="group_id" id="group_id">
@foreach($groups as $group)
        @if($group->id==$customer->group_id)
        <option value='{{ $group->id }}' selected>{{$group->name}}</option>
        @else
        <option value='{{ $group->id }}'>{{$group->name}}</option>
        @endif
@endforeach
    </select>
  </div>

  <div>
    <button type="submit">update the customer</button>
  </div>