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


<form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data" class="register">
  @csrf
  <h1>Add a Customer</h1>

 <fieldset class="row1">
                <legend>Personal Information
                </legend>
                  <label class="obinfo">* obligatory fields
                    </label>
                    <label for="image">Passport *
                    </label>
                    <input type="file" name="image" class="long"/>
                  <p>  
                    <label>Card Number *
                    </label>
                    <input type="text" name="card_number" id="card_number"/>
                 </p>
                  <p>
                    <label>Surname *
                    </label>
                    <input type="text" name="surname" id="surname"/>
                    <label>First Name*
                    </label>
                    <input type="text" name="first_name" id="first_name"/>
                </p>
                <p>
                    <label class="optional">Middle Name
                    </label>
                    <input type="text" name="middle_name" id="middle_name"/>
                    <label class="optional">Alias
                    </label>
                    <input type="text" name="aka" id="aka"/>
                </p>
                
            </fieldset>

<fieldset class="row2">
                <legend>Other Details
                </legend>
                <p>
                    <label>Date of birth *
                    </label>
                    <input type="text" name="dateOfBirth" id="dateOfBirth"/>
                </p>
                <p>
                    <label>Address *
                    </label>
                    <textarea name="address" id="address"></textarea>
                </p>
                <p>
                    <label>Phone *
                    </label>
                    <input type="text" name="phone" id="phone" maxlength="11"/>
                </p>
                <p>
                    <label class="optional">Email
                    </label>
                    <input type="text" name="email" id="email" class="long"/>
                </p>
                <input name="image_name" type="hidden" id="image_name" />
                <p>
                    <label>Group *
                    </label>
                    <select name="group_id" id="group_id">
                        <option selected>Select Group
                        </option>
                        @foreach($groups as $group)
        <option value="{{ $group->id }}" >{{$group->name}}</option>
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
                    <input type="text" name="guarantor_name" id="guarantor_name"/>
                </p>
                <p>
                    <label>Guarantor Address*
                    </label>
                    <textarea name="guarantor_address" id="guarantor_address"></textarea>
                </p>
                <p>
                    <label>Guarantor Phone*
                    </label>
        <input type="text" name="guarantor_phone" id="guarantor_phone" maxlength="11"/>
                </p>
    </fieldset>
    
<div><button class="button">Submit &raquo;</button></div>
</form>

    </div>
        </div>
@endsection



<!--
  <div class="col-md-6">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control">
  </div>
  <div class="form-group">
    <label for="first_name">first Name</label>
    <input type="text" name="first_name" id="first_name">
  </div>
  <div class="form-group">
    <label for="surname">surname</label>
    <input type="text" name="surname" id="surname"/>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input name="address" id="address"/>
  </div>
<input name="image_name" type="hidden" id="image_name" />
  <div class="form-group">
    <label for="phone">Phone</label>
    <input name="phone" id="phone"/>
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input name="email" id="email"/>
  </div>

  <div class="form-group">
    <label for="dateOfBirth">Date of birth</label>
    <input name="dateOfBirth" id="dateOfBirth"/>
  </div>

<div class="form-group">
    <label for="group_id">Group</label>
   <select name="group_id" id="group_id">
    <option value="" selected>Select Group</option>
@foreach($groups as $group)
        <option value="{{ $group->id }}" >{{$group->name}}</option>
@endforeach
    </select>
  </div>

  <div>
    <button type="submit">Add a Customer</button>
  </div>
-->
