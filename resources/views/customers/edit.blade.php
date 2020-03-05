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
                    <label>Photo *
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
<input type="date" name="dateOfBirth" id="dateOfBirth" value='{{$customer->dateOfBirth}}'/>
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
                    @if((Auth::user()->can('isCashOfficer'))
                        &&($customer->group->user_id == Auth::user()->id))

                    <label>Group *
                    </label>
                    <select name="group_id" id="group_id">
                        
                        @foreach($groups->sortBy('name') as $group)
            
            @if(($group->id) === ($customer->group_id))
        <option value="{{$group->id}}" selected>{{$group->name}}</option>
        @elseif(Auth::user()->id == $group->user_id)
        <option value="{{$group->id}}">{{$group->name}}</option>
        
        @endif
        @endforeach
       </select> 
                    @endif


              @if(Auth::user()->can('isAdmin') || Auth::user()->can('isManager'))
              <label>Group *
                    </label>
                    <select name="group_id" id="group_id">
                        @foreach($groups->sortBy('name') as $group)
          @if($group->id==$customer->group_id)
        <option value='{{ $group->id }}' selected>{{$group->name}}</option>
        @else
        <option value='{{ $group->id }}'>{{$group->name}}</option>
        @endif
                       @endforeach
       </select> 
                    @endif
                </p>
                
   </fieldset>

   <fieldset class="row3">
                <legend>Guarantor Details
                </legend>
                <p>
                    <label>Guarantor Name*
                    </label>
                    <input type="text" name="guarantor_name" id="guarantor_name" value='{{$customer->guarantor_name}}'/>
                </p>
                <p>
                    <label>Guarantor Address*
                    </label>
                    <textarea name="guarantor_address" id="guarantor_address">{{$customer->guarantor_address}}</textarea>
                </p>
                <p>
                    <label>Guarantor Phone*
                    </label>
                    <input type="text" name="guarantor_phone" id="guarantor_phone" maxlength="11" value='{{$customer->guarantor_phone}}'/>
                </p>
    </fieldset>



<div><button class="button">Submit &raquo;</button></div>
</form>

    </div>

  </div>



 </div><!--/center-->



</div><!--/container-fluid-->
@endsection

