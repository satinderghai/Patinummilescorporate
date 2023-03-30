<!-- @extends('layouts.backendApp') -->
@section('content')
<style type="text/css">
  .error {
      display: block;
  }

  .msg-bar {
    margin-bottom: 15px;
}
.error {
    color: #e85347;;
}
</style>  

<!-- Multi step form start -->

<div class="col-md-6 mx-auto">

   <form method="POST" class="myform" id="msform" action="{{ route('request_member_register') }}">
       @csrf
       <!-- progressbar -->
       <ul id="progressbar">
        <li class="active">User Info</li>
        <li>Travel Info</li>
        <li>Membership Info</li>
    </ul>
    <!-- fieldsets -->
    <fieldset class="nk-block nk-block-middle" id="step1">
        <div class="fs-title">Traveler Details</div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label d-block text-start" for="name">Title*</label>
                    <div class="form-control-wrap">
                        <input id="title" type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Title"  autocomplete="title" autofocus >
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label d-block text-start" for="name">First Name*</label>
                    <div class="form-control-wrap">
                        <input id="firstname" type="text" class="form-control form-control-lg @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" placeholder="First Name"  autocomplete="firstname" autofocus >
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label d-block text-start" for="name">Middle Name</label>
                    <div class="form-control-wrap">
                        <input id="middlename" type="text" class="form-control form-control-lg @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" placeholder="Middle Name"  autocomplete="middlename" autofocus >
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label d-block text-start" for="name">Last Name*</label>
                    <div class="form-control-wrap">
                        <input id="lastname" type="text" class="form-control form-control-lg @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" placeholder="Last Name"  autocomplete="lastname" autofocus >
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label d-block text-start" for="name">Email Address*</label>
                    <div class="form-control-wrap">
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email@domain.com"  autocomplete="email" autofocus>
                    </div>
                </div>
            </div>


             <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label d-block text-start" for="name">Password*</label>
                    <div class="form-control-wrap">
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Enter your passcode"  autocomplete="name" autofocus >
                    </div>
                </div>
            </div>

            
        </div>


        <div class="row">
           
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label d-block text-start" for="name">Home Airport*</label>
                    <div class="form-control-wrap">
                        <input id="home_airport" type="text" class="form-control form-control-lg @error('home_airport') is-invalid @enderror" name="home_airport" value="{{ old('home_airport') }}" placeholder="Home Airport"  autocomplete="name" autofocus >
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label d-block text-start" for="name">D.O.B*</label>
                    <div class="form-control-wrap">
                        <input id="name" type="date" class="form-control form-control-lg @error('dob') is-invalid @enderror" name="dob" value="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label d-block text-start" for="name">Gender*</label>
                    <div class="form-control-wrap">
                        <select name="gender" class="form-control form-control-lg">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="fs-title">Contact Information</div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label d-block text-start" for="name">Company*</label>
                    <div class="form-control-wrap">
                        <input id="company" type="text" class="form-control form-control-lg @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" placeholder="Company"  autocomplete="company" autofocus >
                    </div>
                </div>
            </div>
            <div class="col-md-4">

               <div class="form-group ">
                <label class="form-label d-block text-start" for="email">I have a Key Code</label>
                <div class="form-control-wrap">
                    <input id="key_code" type="text" name="key_code" value="{{ (isset($_GET['company-code'])) ? $_GET['company-code'] : '' }}" class="form-control form-control-lg @error('key_code') is-invalid @enderror"
                    placeholder="Enter your Key Code">

                    @error('key_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Department*</label>
                <div class="form-control-wrap">
                    <input id="department" type="text" class="form-control form-control-lg @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" placeholder="Department"  autocomplete="department" autofocus >
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Work Phone*</label>
                <div class="form-control-wrap">
                    <input id="work_phone" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="work_phone" value="{{ old('work_phone') }}" placeholder="(000)000-0000"  autocomplete="work_phone" autofocus >
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Ext</label>
                <div class="form-control-wrap">
                    <input id="ext" type="text" class="form-control form-control-lg @error('ext') is-invalid @enderror" name="ext" value="{{ old('ext') }}" placeholder="Ext"  autocomplete="ext" autofocus >
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Cell Phone*</label>
                <div class="form-control-wrap">
                    <input id="cell_phone" type="text" class="form-control form-control-lg @error('cell_phone') is-invalid @enderror" name="cell_phone" value="{{ old('cell_phone') }}" placeholder="(000)000-0000"  autocomplete="cell_phone" autofocus >
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Work Fax:</label>
                <div class="form-control-wrap">
                    <input id="work_fax" type="text" class="form-control form-control-lg @error('work_fax') is-invalid @enderror" name="work_fax" value="{{ old('work_fax') }}" placeholder="Work Fax"  autocomplete="work_fax" autofocus >
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Home Phone</label>
                <div class="form-control-wrap">
                    <input id="home_phone" type="text" class="form-control form-control-lg @error('home_phone') is-invalid @enderror" name="home_phone" value="{{ old('home_phone') }}" placeholder="(000)000-0000"  autocomplete="home_phone" autofocus >
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">2 Cell Phone</label>
                <div class="form-control-wrap">
                    <input id="second_phone" type="text" class="form-control form-control-lg @error('second_phone') is-invalid @enderror" name="second_phone" value="{{ old('second_phone') }}" placeholder="(000)000-0000"  autocomplete="second_phone" autofocus >
                </div>
            </div>
        </div>
    </div>


    <hr>
    <div class="fs-title">Passport Information</div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">First Name</label>
                <div class="form-control-wrap">
                    <input id="passport_firstname" type="text" class="form-control form-control-lg @error('passport_firstname') is-invalid @enderror" name="passport_firstname" value="{{ old('passport_firstname') }}" placeholder="First Name"  autocomplete="passport_firstname" autofocus >
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">MI</label>
                <div class="form-control-wrap">
                    <input id="passport_MI" type="text" class="form-control form-control-lg @error('passport_MI') is-invalid @enderror" name="passport_MI" value="{{ old('passport_MI') }}" placeholder="MI"  autocomplete="passport_lastname" autofocus >
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Last Name</label>
                <div class="form-control-wrap">
                    <input id="passport_lastname" type="text" class="form-control form-control-lg @error('passport_lastname') is-invalid @enderror" name="passport_lastname" value="{{ old('passport_lastname') }}" placeholder="Last Name"  autocomplete="passport_lastname" autofocus >
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Passport Number</label>
                <div class="form-control-wrap">
                    <input id="passport_no" type="text" class="form-control form-control-lg @error('passport_no') is-invalid @enderror" name="passport_no" value="{{ old('passport_no') }}" placeholder="Passport Number"  autocomplete="passport_MI" autofocus >
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Country Issued</label>
                <div class="form-control-wrap">
                    <input id="passport_country_issued" type="text" class="form-control form-control-lg @error('passport_country_issued') is-invalid @enderror" name="passport_country_issued" value="{{ old('passport_country_issued') }}" placeholder="Country Issued"  autocomplete="passport_country_issued" autofocus >
                </div>
            </div>
        </div>                                    
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Issue Date</label>
                <div class="form-control-wrap">
                    <input id="passport_issue_date" type="date" class="form-control form-control-lg @error('passport_issue_date') is-invalid @enderror" name="passport_issue_date" value="">
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Expiration Date</label>
                <div class="form-control-wrap">
                    <input id="passport_exp_date" type="date" class="form-control form-control-lg @error('passport_exp_date') is-invalid @enderror" name="passport_exp_date" value="">
                </div>
            </div>
        </div>
    </div>

    <input type="button" name="next" class="next btn theme-btn btn-lg first-next" id="firstNext" value="Next"/>
</fieldset>
<fieldset class="nk-block nk-block-middle" id="step2">
    <div class="fs-title">Secure Flight Information</div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Redress Number*</label>
                <div class="form-control-wrap">
                    <input id="redress_no" type="text" class="form-control form-control-lg @error('redress_no') is-invalid @enderror" name="redress_no" value="{{ old('redress_no') }}" placeholder="Redress Number"  autocomplete="redress_no" autofocus >
                </div>
                <span class="redress_no_error"></span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Known Traveler Number*</label>
                <div class="form-control-wrap">
                    <input id="known_traveler_no" type="text" class="form-control form-control-lg @error('known_traveler_no') is-invalid @enderror" name="known_traveler_no" value="{{ old('known_traveler_no') }}" placeholder="Known Traveler Number"  autocomplete="known_traveler_no" autofocus >
                </div>
                 <span class="known_traveler_no_error"></span>
            </div>
        </div>
    </div>

    <hr>
    <div class="fs-title">Air Travel Prefrences</div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Seat Location</label>
                <div class="form-control-wrap">
                    <select class="form-control form-control-lg" name="seat_location">
                        <option>Seat location</option>
                        <option value="aisle">Aisle</option>
                        <option value="window">Window</option>
                        <option value="No prefrence">No prefrence</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Special Meal</label>
                <div class="form-control-wrap">
                    <select class="form-control form-control-lg" name="special_meal">
                        <option >Special meal</option>
                        <option value="Standard">Standard</option>
                        <option value="Kosher">Kosher</option>
                        <option value="Low fat">Low fat</option>
                        <option value="Vegetarian">Vegetarian</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Preferred Airports</label>
                <div class="form-control-wrap">
                    <input id="preferred_airport" type="text" class="form-control form-control-lg @error('preferred_airport') is-invalid @enderror" name="preferred_airport" value="{{ old('preferred_airport') }}" placeholder="Preferred Airports"  autocomplete="name" autofocus >
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Special Air Request (Preferred airline etc.)</label>
                <div class="form-control-wrap">
                    <input id="special_air_request" type="text" class="form-control form-control-lg @error('special_air_request') is-invalid @enderror" name="special_air_request" value="{{ old('special_air_request') }}" placeholder="Special Air Request"  autocomplete="special_air_request" autofocus >
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="fs-title">Hotel Preferences</div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Room Type*</label>
                <div class="form-control-wrap">
                    <select class="form-control form-control-lg" id="room_type" name="room_type">
                        <option value="">Room Type</option>
                        <option value="smoking">Smoking</option>
                        <option value="non smoking">Non Smoking</option>                                                    
                    </select>
                </div>
                <span class="room_type_error"></span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Bed Type*</label>
                <div class="form-control-wrap">
                    <select class="form-control form-control-lg" id="bed_type" name="bed_type">
                        <option value="">Bed Type</option>
                        <option value="king">King</option>
                        <option value="2 doubles">2 Doubles</option>                                                    
                    </select>
                </div>
                <span class="bed_type_error"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Special Hotel Request</label>
                <div class="form-control-wrap">
                    <input id="special_hotel_request" type="text" class="form-control form-control-lg @error('special_hotel_request') is-invalid @enderror" name="special_hotel_request" value="{{ old('special_hotel_request') }}" placeholder="Preferred Airports"  autocomplete="special_hotel_request" autofocus >
                </div>
            </div>
        </div>                                    
    </div>

    <hr>
    <div class="fs-title">Car Rental Preferences</div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Car Size</label>
                <div class="form-control-wrap">
                    <select class="form-control form-control-lg" name="car_size">
                        <option>Car size</option>
                        <option value="compact">Compact</option>
                        <option  value="intermediate">Intermediate</option>
                        <option  value="full size">Full size</option>  
                        <option  value="premium/luxury">Premium/Luxury</option>                                                  
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Special Car Request</label>
                <div class="form-control-wrap">
                    <input id="special_car_request" type="text" class="form-control form-control-lg @error('special_car_request') is-invalid @enderror" name="special_car_request" value="{{ old('special_car_request') }}" placeholder="Special Car Request"  autocomplete="special_car_request" autofocus >
                </div>
            </div>
        </div> 
    </div>

    <input type="button" name="previous" class="previous btn btn-lg theme-btn" value="Previous"/>
    <input type="button" id="secondNext" name="next" class="next btn btn-lg theme-btn"  value="Next"/>
</fieldset>
<fieldset class="nk-block nk-block-middle" id="step3">
    <h2 class="fs-title">Airlines Membership Programs</h2>
    <div class="row after-add-more">
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Airline Name</label>
                <div class="form-control-wrap">
                    <input id="airline_name" type="text" class="form-control form-control-lg @error('airline_name') is-invalid @enderror" name="airline_name[]" value="{{ old('airline_name') }}" placeholder="Airline Name"  autocomplete="airline_name" autofocus >
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Membership</label>
                <div class="form-control-wrap">
                    <input id="name" type="text" class="form-control form-control-lg @error('airline_membership') is-invalid @enderror" name="airline_membership[]" value="{{ old('airline_membership') }}" placeholder="Membership"  autocomplete="airline_membership" autofocus >
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Password</label>
                <div class="form-control-wrap">
                    <input id="airline_password" type="text" class="form-control form-control-lg @error('airline_password') is-invalid @enderror" name="airline_password[]" value="{{ old('airline_password') }}" placeholder="Password"  autocomplete="airline_password" autofocus >
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label d-block text-start" for="name">Membership Type</label>
                <div class="form-control-wrap">
                    <input id="airline_membership_type" type="text" class="form-control form-control-lg @error('airline_membership_type') is-invalid @enderror" name="airline_membership_type[]" value="{{ old('airline_membership_type') }}" placeholder="Membership Type"  autocomplete="airline_membership_type" autofocus >
                </div>
            </div>
        </div>

        <div class="col-md-12 ">
           <div class="form-group change text-right">
            <button class="ms-auto btn theme-btn add-more more-btn">+ Add Line</button>
        </div>
    </div>
</div>

<hr>
<h2 class="fs-title">Hotels Membership Programs</h2>
<div class="row after-add-more-two">
    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label d-block text-start" for="name">Hotel Name Or Chain</label>
            <div class="form-control-wrap">
                <input id="hotel_name[]" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="hotel_name[]" value="{{ old('hotel_name') }}" placeholder="Hotel Name Or Chain"  autocomplete="hotel_name" autofocus >
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label d-block text-start" for="name">Membership</label>
            <div class="form-control-wrap">
                <input id="name" type="text" class="form-control form-control-lg @error('hotel_membership') is-invalid @enderror" name="hotel_membership[]" value="{{ old('hotel_membership') }}" placeholder="Membership"  autocomplete="hotel_membership" autofocus >
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label d-block text-start" for="name">Password</label>
            <div class="form-control-wrap">
                <input id="hotel_password" type="text" class="form-control form-control-lg @error('hotel_password') is-invalid @enderror" name="hotel_password[]" value="{{ old('hotel_password') }}" placeholder="Password"  autocomplete="hotel_password" autofocus >
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label d-block text-start" for="name">Membership Type</label>
            <div class="form-control-wrap">
                <input id="hotel_membership_type" type="text" class="form-control form-control-lg @error('hotel_membership_type') is-invalid @enderror" name="hotel_membership_type[]" value="{{ old('hotel_membership_type') }}" placeholder="Membership Type"  autocomplete="hotel_membership_type" autofocus >
            </div>
        </div>
    </div>

    <div class="col-md-12 ">
       <div class="form-group change-two text-right">
        <button class="ms-auto btn theme-btn add-more-two more-btn">+ Add Line</button>
    </div>
</div>
</div>

<hr>
<div class="fs-title">Rental Car Companies Membership Programs</div>
<div class="row after-add-more-three">
    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label d-block text-start" for="name">Rental Car Company</label>
            <div class="form-control-wrap">
                <input id="car_name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="car_name[]" value="{{ old('car_name') }}" placeholder="Airline Name"  autocomplete="car_name" autofocus >
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label d-block text-start" for="name">Membership</label>
            <div class="form-control-wrap">
                <input id="name" type="text" class="form-control form-control-lg @error('car_membership') is-invalid @enderror" name="car_membership[]" value="{{ old('car_membership') }}" placeholder="Membership"  autocomplete="car_membership" autofocus >
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label d-block text-start" for="name">Password</label>
            <div class="form-control-wrap">
                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="car_password[]" value="{{ old('name') }}" placeholder="Membership"  autocomplete="name" autofocus >
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label d-block text-start" for="name">Membership Type</label>
            <div class="form-control-wrap">
                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="car_membership_type[]" value="{{ old('name') }}" placeholder="Membership Type"  autocomplete="name" autofocus >
            </div>
        </div>
    </div>

    <div class="col-md-12 ">
       <div class="form-group change-three text-right">
        <button class="ms-auto btn theme-btn add-more-three more-btn">+ Add Line</button>
    </div>
</div>
</div>

<hr>
<div class="fs-title">Method Of Contact</div>
<div class="row">
    <div class="col-md-12">
        <label class="form-label d-block text-start" for="name">When Can We Call You On Your Cell?</label>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="wcall-row">
          <input type="hidden" id="whenWeCall" name="when_we_call">
          <button class="call-box when_call" data-val="24/7"> 24/7 </button>
          <button class="call-box when_call" data-val="24/7"> Only during works hours </button>
          <div class="call-up"> Up Until <input class="call-field form-control when_call_input" type ="text" name="when_we_call" placeholder="00"> at right </div>
            </div>
      </div>
  </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label class="form-label d-block text-start" for="name">When Can We Email You?</label>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="wcall-row">
            <input type="hidden" id="whenWeEmail" name="when_email_you">
            <button class="call-box when_email"> 24/7 </button>
            <button class="call-box when_email"> Only during works hours </button>
            <div class="call-up"> Up Until <input class="call-field form-control when_email_input" type ="text" name="when_email_you" placeholder="00"> at right </div>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="fs-title">Additional Notes</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <textarea class="form-control form-control-lg"  id="notes" name="notes" placeholder="Additional Notes"></textarea>
        </div>
        <span class="notes_error"></span>
    </div>
</div>

<div class="msg-bar"></div>

<input type="button" name="previous" class="previous btn btn-lg theme-btn" value="Previous"/>
<input type="submit" id="submitTravelForm" name="submit" class="submit btn btn-lg theme-btn" value="Save Travel Profile"/>

</fieldset>
 <div class="form-note-s2 text-center pt-4"> Already have an account? <a
                                    href="{{ route('login') }}"><strong>Login in instead</strong></a>
                                </div>
                                <div class="form-note-s2 text-center pt-4"> <a
                                    href="{{ route('register') }}"><strong>Register Company account</strong></a>
                                </div>
</form>
 
</div>

<!-- Multi step form end -->   
</div>                          

</div>
<!-- wrap @e -->
</div>
<!-- content @e -->
</div>
<!-- main @e -->
</div>


</html>

<script>
    $(function(){

      $(document).on("click","#submitTravelForm",function(e){     
        var Note = $('#notes').val();

          e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({

            type:"POST",
            url:"{{ url('join-now') }}",
            data:$('#msform').serialize(),
            dataType: 'json',
            success: function(data){
               if(data.status == false){
                $('.msg-bar').html('<div class="alert alert-danger">'+data.msg+'</div>');
            }

            if(data.status == true){
                $('.msg-bar').html('<div class="alert alert-success">'+data.msg+'</div>');
            }
           // window.location.href = "{{ url('/admin') }}";

        },
        error: function (data) {
         $('.msg-bar').html('');
         $('.msg-bar').html('<div class="alert alert-danger">The email has already been taken.</div');

     }
 });
          return false;
      });

  });
</script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<script src="{{ asset('public/frontend/js/custom.js') }}"></script>
<script type="text/javascript">


    $('#firstNext').removeClass('next');
    $('#secondNext').removeClass('next');
    
    $(document).ready(function() {

        $("#firstNext").click(function() {
          var form = $(".myform");
          form.validate({
            rules: {
              title: {
                required: true
            },
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            email: {
                required: true
            },
            password: {
                required: true
            },
            home_airport: {
                required: true
            },
            key_code: {
                required: true
            },
            dob: {
                required: true
            },
            gender: {
                required: true
            },
            company: {
                required: true
            },
            department: {
                required: true
            },
            work_phone: {
                required: true
            },
            cell_phone: {
                required: true
            }
        },
        messages: {
          title: {
            required: "Title field is required."
        },
        firstname: {
            required: "Firstname field is required."
        },
        lastname: {
            required: "Lastname field is required."
        },
        email: {
            required: "Email field is required."
        },
         password: {
            required: "Password field is required."
        },
        home_airport: {
            required: "Home Airport field is required."
        },
         key_code: {
            required: "Company key code field is required."
        },
        dob: {
            required: "DOB field is required."
        },
        gender: {
            required: "Gender field is required."
        },
        company: {
            required: "Company field is required."
        },
        department: {
            required: "Department field is required."
        },
        work_phone: {
            required: "Work Phone field is required."
        },
        cell_phone: {
            required: "Cell Phone field is required."
        }
    }
});
          if (form.valid() === true) {
            $("#firstNext").addClass("next");
        }
    });
        });

          // secondNext
$(document).ready(function() {

$("#secondNext").click(function() {
           
 
    var redress_no = $("#redress_no").val();
    var known_traveler_no = $("#known_traveler_no").val();
    var bed_type = $('#bed_type').find(":selected").val();
    var room_type = $('#room_type').find(":selected").val();
    
    $('.redress_no_error').html('');
     if (redress_no != '' || known_traveler_no != '' || room_type != '' || bed_type != '') {
        $('#secondNext').addClass('next');
     }
  
            if (redress_no == '' ) {
                $('.redress_no_error').html('<span class="error"> Redress no field is requerd</span>');
                $('#secondNext').removeClass('next');
                $('#redress_no').addClass('error');
            }else{
              $('#redress_no').removeClass('error');
              $('.redress_no_error').html('');
            }

            if (known_traveler_no == '' ) {
            $('.known_traveler_no_error').html('<span class="error"> Known Traveler no field is requerd</span>');
            $('#secondNext').removeClass('next');
            $('#known_traveler_no').addClass('error');
            }else{
                  $('#known_traveler_no').removeClass('error');
                  $('.known_traveler_no_error').html('');
            }

            if (bed_type == '' ) {
            $('.bed_type_error').html('<span class="error"> Bed type field is requerd</span>');
            $('#secondNext').removeClass('next');
            $('#bed_type').addClass('error');
            }else{
                  $('#bed_type').removeClass('error');
                  $('.bed_type_error').html('');
            }

            if (room_type == '' ) {
            $('.room_type_error').html('<span class="error"> Room type field is requerd</span>');
            $('#secondNext').removeClass('next');
            $('#room_type').addClass('error');
            }else{
                  $('#room_type').removeClass('error');
                  $('.room_type_error').html('');
            }
    
     });



    });

 


//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(document).on('click','.next',function(){


    if(animating) return false;
    animating = true;
    
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    
    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            // scale = 1 - (1 - now) * 0.2;
            //2. bring next_fs from the right(50%)
            left = (now * 50)+"%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({
                'transform': 'scale('+scale+')',
                'position': 'absolute'
            });
            next_fs.css({'left': left, 'opacity': opacity});
        }, 
        // duration: 100, 
        complete: function(){
            current_fs.hide();
            animating = false;
        }, 
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".previous").click(function(){
    if(animating) return false;
    animating = true;
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
         left = ((1-now) * 50)+"%";
            //3. increase opacity of previous_fs to 1 as it moves in
         opacity = 1 - now;
         current_fs.css({'left': left});
         previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
     }, 
        // duration: 100, 
     complete: function(){
        current_fs.hide();
        animating = false;
    }, 
        //this comes from the custom easing plugin
    easing: 'easeInOutBack'
});
});

// $(".submit").click(function(){
//     return false;
// })
</script>
<script type="text/javascript">

    $(document).ready(function() {
        $("body").on("click",".add-more",function(){ 
            var html = $(".after-add-more").first().clone();
            $(html).find(".change").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
            $(".after-add-more").last().after(html);

        });

        $("body").on("click",".remove",function(){ 
            $(this).parents(".after-add-more").remove();
        });

        $("body").on("click",".add-more-two",function(){ 
            var html = $(".after-add-more-two").first().clone();
            $(html).find(".change-two").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger more-btn remove'>- Remove</a>");
            $(".after-add-more-two").last().after(html);

        });

        $("body").on("click",".remove",function(){ 
            $(this).parents(".after-add-more-two").remove();
        });



        $("body").on("click",".add-more-three",function(){ 
            var html = $(".after-add-more-three").first().clone();
            $(html).find(".change-three").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger more-btn remove'>- Remove</a>");
            $(".after-add-more-three").last().after(html);

        });


        $("body").on("click",".remove",function(){ 
            $(this).parents(".after-add-more-three").remove();
        });


// When we call section
        $('.when_call').click(function(){

         $("#whenWeCall").val($(this).text());
         
     });
        $(".when_email_input").keyup(function() {
          $("#whenWeEmail").val($(this).val());
      });
        

        $('.when_email').click(function(){

         $("#whenWeEmail").val($(this).text());
         
     });
        $(".when_call_input").keyup(function() {
          $("#whenWeCall").val($(this).val());
      });


        
       //End When we call section 

        $(".when_call").click(function(e) {
          e.preventDefault();
      });

        $(".when_email").click(function(e) {
          e.preventDefault();
      }); 

       $(".more-btn").click(function(e) {
          e.preventDefault();
      });

    });


</script>


@endsection