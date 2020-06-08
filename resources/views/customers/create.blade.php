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

<form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data" class="register">
  @csrf
  <h1>Add a Customer</h1>

 <fieldset class="row1">
                <legend>Personal Information
                </legend>
                  <label class="obinfo">* obligatory fields
                    </label>
                    <label for="image">Photo *
                    </label>
                    <input type="file" name="image" class="long"/>
                  <p>  
                    <label>Card Number *
                    </label>
                    <input type="text" name="card_number" id="card_number" value="{{ old('card_number') }}"/>
                 </p>
                  <p>
                    <label>Surname *
                    </label>
                    <input type="text" name="surname" id="surname" value="{{ old('surname') }}"/>
                    <label>First Name*
                    </label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"/>
                </p>
                <p>
                    <label class="optional">Middle Name
                    </label>
                    <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name') }}"/>
                    <label class="optional">Alias
                    </label>
                    <input type="text" name="aka" id="aka" value="{{ old('aka') }}"/>
                </p>
                
            </fieldset>

<fieldset class="row2">
                <legend>Other Details
                </legend>
                <p>
                    <label>Age *
                    </label>
                    <input type="text" name="dateOfBirth" id="dateOfBirth" class="date" value="{{ old('dateOfBirth') }}" maxlength="2" minlength="2"/>
                </p>
                <p>
                    <label>Address *
                    </label>
                    <textarea name="address" id="address" value="{{ old('address') }}"></textarea>
                </p>
                <p>
                    <label>Phone *
                    </label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" maxlength="11"/>
                </p>
                <p>
                    <label class="optional">Email
                    </label>
                    <input type="text" name="email" id="email" class="long" value="{{ old('email') }}"/>
                </p>
                <input name="image_name" type="hidden" id="image_name" />
                <p>
                    <label>Group *
                    </label>
                    <select name="group_id" id="group_id">
                        <option selected>Select Group
                        </option>
                        @foreach($groups->sortBy('name') as $group)

                        
                        @if((Auth::user()->can('isCashOfficer'))
                        &&($group->user_id == Auth::user()->id))
                        
                     
        <option value="{{ $group->id }}">{{$group->name}}</option>     

      @elseif(Auth::user()->can('isAdmin') || Auth::user()->can('isManager'))
    <option value="{{ $group->id }}">{{$group->name}}</option>
                      @endif
<!--
      @if(Gate::check('isAdmin') || Gate::check('isManager'))
      <option value="{{ $group->id }}" >{{$group->name}}</option>
       @endif
-->
                        @endforeach
                    </select>
                </p>
        <p>
                    <label>Group Leader 
                    </label>
                    <input type="checkbox" name="group_leader" id="group_leader">
                </p>


   </fieldset>

   <fieldset class="row3">
                <legend>Guarantor Details
                </legend>
                <p>
                    <label>Guarantor Name*
                    </label>
                    <input type="text" name="guarantor_name" id="guarantor_name" value="{{ old('guarantor_name') }}"/>
                </p>
                <p>
                    <label>Guarantor Address*
                    </label>
                    <textarea name="guarantor_address" id="guarantor_address" value="{{ old('guarantor_address') }}"></textarea>
                </p>
                <p>
                    <label>Guarantor Phone*
                    </label>
        <input type="text" name="guarantor_phone" id="guarantor_phone" maxlength="11" value="{{ old('guarantor_phone') }}"/>
                </p>
    </fieldset>

<div><button class="button">Submit &raquo;</button></div>
</form>

    </div>
     
     </div>   


 </div><!--/center-->



</div><!--/container-fluid-->



<script>
    /**
$('#dateOfBirth').datetimepicker({
inline:false,timepicker: false,
});
**/
</script>


@endsection




