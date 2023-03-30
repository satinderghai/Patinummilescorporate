@extends('layouts.backend.master')

@section('content')

 <div class="nk-content ">

                    <div class="container-fluid">

                        <div class="nk-content-inner">

                            <div class="nk-content-body">

                                <div class="nk-block-head nk-block-head-sm">

                                    <div class="nk-block-between g-3">

                                        <div class="nk-block-head-content">

                                            <h3 class="nk-block-title page-title">Team Information / <strong class="text-primary small">{{ $getUserInfo->name }}</strong></h3>

                                            <div class="nk-block-des text-soft">

                                                <ul class="list-inline">

                                                    <li>Team ID: <span class="text-base">UD{{ $getUserInfo->id }}</span></li>

                                                </ul>

                                            </div>

                                        </div>

                                        <div class="nk-block-head-content">

                                            <a href="{{ url('admin/teams') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <div>
                                                 
                                            
                                        <!--     <div  class="btn btn-group mt-4 p-0">
                                               <a href="#" class="btn btn-success active_team">Active</a>
                                               <a href="#" class="btn btn-info inactive_team">Inactive</a>
                                              
                                            </div> -->
                                          
                                        </div>


                                            <a href="html/user-list-regular.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>

                                        </div>

                                    </div>

                                </div><!-- .nk-block-head -->
 
                               

                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">Team Information</h5>

                                                            <p>Basic info, like your name and email.</p>

                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">

                                                       <!--      <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Title</span>

                                                                    <span class="profile-ud-value">Mr.</span>

                                                                </div>

                                                            </div> -->

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Full Name</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->name }}</span>

                                                                </div>

                                                            </div>

                                                    



                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Email Address</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->email }}</span>

                                                                </div>

                                                            </div>



                                            
                                                        

                                                               <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Created Date</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->created_at }}</span>

                                                                </div>

                                                            </div>



                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Status</span>

                                                                     @if($getUserInfo->status == 1)
                                                                       <span class="tb-status text-success">Active</span>                                                           
                                                                       @else
                                                                       <span class="tb-status text-danger">Pending</span>
                                                                       @endif

                                                                </div>

                                                            </div>



                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->



                                     </div><!-- .nk-block-head -->


<!-- TRAVELER DETAILS -->                               
                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">TRAVELER DETAILS</h5>


                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Title</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->title }}</span>

                                                                </div>

                                                            </div>

                                                    

                                            

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Name</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->firstname }}</span>

                                                                </div>

                                                            </div>

                                                    

                                                               <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Home Airport</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->home_airport }}</span>

                                                                </div>

                                                            </div>




                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">D.O.B</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->dob }}</span>

                                                                </div>

                                                            </div>

                                                    

                                            

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Gender</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->gender }}</span>

                                                                </div>

                                                            </div>

                                                            



                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block -->


<!-- CONTACT INFORMATION -->
                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">CONTACT INFORMATION</h5>


                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">

                                                       <!--      <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Title</span>

                                                                    <span class="profile-ud-value">Mr.</span>

                                                                </div>

                                                            </div> -->

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Company</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->company }}</span>

                                                                </div>

                                                            </div>

                                                    

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Department</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->department }}</span>

                                                                </div>

                                                            </div>



                                                        

                                                               <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Work Phone</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->work_phone }}</span>

                                                                </div>

                                                            </div>


                                                             <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Ext</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->ext }}</span>

                                                                </div>

                                                            </div>


                                                             <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Cell Phone</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->cell_phone }}</span>

                                                                </div>

                                                            </div>



                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Work Fax</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->work_fax }}</span>

                                                                </div>

                                                            </div>



                                                             <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Home Phone</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->home_phone }}</span>

                                                                </div>

                                                            </div>


                                                             <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">2 Cell Phone</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->second_phone }}</span>

                                                                </div>

                                                            </div>



                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block-head -->

<!-- PASSPORT INFORMATION -->


                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">PASSPORT INFORMATION</h5>


                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">First Name</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->passport_firstname }}</span>

                                                                </div>

                                                            </div>


                                                              <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Last Name</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->passport_lastname }}</span>

                                                                </div>

                                                            </div>

                                                    

                                            

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Passport Number</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->passport_no }}</span>

                                                                </div>

                                                            </div>

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Country Issued</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->passport_country_issued }}</span>

                                                                </div>

                                                            </div>



                                                        

                                                               <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Issue Date</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->passport_issue_date }}</span>

                                                                </div>

                                                            </div>



                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Expiration Date</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->passport_exp_date }}</span>

                                                                </div>

                                                            </div>



                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block-head -->


    
<!-- SECURE FLIGHT INFORMATION -->



                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">SECURE FLIGHT INFORMATION</h5>


                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Redress Number</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->redress_no }}</span>

                                                                </div>

                                                            </div>

                                                    

                                            

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Known Traveler Number</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->known_traveler_no }}</span>

                                                                </div>

                                                            </div>



                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block-head -->


<!-- AIR TRAVEL PREFRENCES  -->                           



                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">AIR TRAVEL PREFRENCES</h5>


                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Seat Location</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->seat_location }}</span>

                                                                </div>

                                                            </div>

                                                    

                                            

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Special Meal</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->special_meal }}</span>

                                                                </div>

                                                            </div>

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Preferred Airports</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->preferred_airport }}</span>

                                                                </div>

                                                            </div>



                                                        

                                                               <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Special Air Request</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->special_air_request }}</span>

                                                                </div>

                                                            </div>



                                                    
                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block-head -->



<!-- HOTEL PREFERENCES -->



                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">HOTEL PREFERENCES</h5>


                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Room Type</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->room_type }}</span>

                                                                </div>

                                                            </div>

                                                    

                                            

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Bed Type</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->bed_type }}</span>

                                                                </div>

                                                            </div>



                                                             <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Special Hotel Request</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->special_hotel_request }}</span>

                                                                </div>

                                                            </div>



                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block-head -->




<!-- CAR RENTAL PREFERENCES -->



                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">CAR RENTAL PREFERENCES</h5>


                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Car Size</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->car_size }}</span>

                                                                </div>

                                                            </div>

                                                    

                                            

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Special Car Request</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->special_car_request }}</span>

                                                                </div>

                                                            </div>



                                                            



                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block-head -->      




<!-- AIRLINES MEMBERSHIP PROGRAMS -->    



                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">AIRLINES MEMBERSHIP PROGRAMS</h5>


                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Airline Name</span>
                                                                     <?php 
                                                                     if(isset($getUserInfo->airline_name)){
                                                                      $airline_name =  json_decode($getUserInfo->airline_name, true); 
                                                                       $airline_name = implode(",", $airline_name);
                                                                   }else{
                                                                    $airline_name ='';
                                                                   }

                                                                    ?>

                                                                    <span class="profile-ud-value">{{ $airline_name }}</span>

                                                                </div>

                                                            </div>

                                                    

                                            

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Membership</span>
                                                                    <?php 
                                                                    if(isset($getUserInfo->airline_membership)){
                                                                      $airline_membership =  json_decode($getUserInfo->airline_membership, true); 
                                                                       $airline_membership = implode(",", $airline_membership);
                                                                   }else{
                                                                    $airline_membership='';
                                                                   }

                                                                    ?>

                                                                    <span class="profile-ud-value">{{ $airline_membership }}</span>

                                                                </div>

                                                            </div>

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Password</span>

                                                                     <?php 
                                                                     if(isset($getUserInfo->airline_passport)){
                                                                      $airline_passport =  json_decode($getUserInfo->airline_passport, true); 
                                                                      

                                                                    $airline_passport = implode(",", $airline_passport);
                                                                }else{
                                                                    $airline_passport ='';
                                                                }

                                                                    ?>

                                                                    <span class="profile-ud-value">{{ $airline_passport }}</span>

                                                                </div>

                                                            </div>



                                                        

                                                               <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Membership Type</span>
                                                                     <?php 
                                                                     if(isset($getUserInfo->airline_membership_type)){

                                                                      $airline_membership_type =  json_decode($getUserInfo->airline_membership_type, true); 
                                                                       $airline_membership_type = implode(",", $airline_membership_type);
                                                                   }else{
                                                                    $airline_membership_type = '';
                                                                   }

                                                                    ?>



                                                                    <span class="profile-ud-value">{{ $airline_membership_type }}</span>

                                                                </div>

                                                            </div>



                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block -->         



<!-- HOTELS MEMBERSHIP PROGRAMS -->    


                           
                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">HOTELS MEMBERSHIP PROGRAMS</h5>


                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Hotel Name Or Chain</span>
                                                                    <?php 
                                                                    if(isset($getUserInfo->hotel_name)){
                                                                      $hotelName =  json_decode($getUserInfo->hotel_name, true); 
                                                                       $hotel = implode(",", $hotelName);
                                                                   }else{
                                                                    $hotel = '';
                                                                   }

                                                                    ?>

                                                                    <span class="profile-ud-value">{{ $hotel }}</span>

                                                                </div>

                                                            </div>

                                                    

                                            

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Membership</span>
                                                                     <?php 
                                                                     if(isset($getUserInfo->hotel_membership)){
                                                                      $hotel_membership =  json_decode($getUserInfo->hotel_membership, true); 
                                                                       $hotel_membership = implode(",", $hotel_membership);
                                                                   }else{
                                                                    $hotel_membership = '';
                                                                   }

                                                                    ?>

                                                                    <span class="profile-ud-value">{{ $hotel_membership }}</span>

                                                                </div>

                                                            </div>

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Password</span>
                                                                    <?php 
                                                                    if(isset($getUserInfo->hotel_password)){
                                                                      $hotel_password =  json_decode($getUserInfo->hotel_password, true); 
                                                                       $hotel_password = implode(",", $hotel_password);
                                                                   }else{

                                                                    $hotel_password='';
                                                                   }

                                                                    ?>

                                                                    <span class="profile-ud-value">{{ $hotel_password }}</span>

                                                                </div>

                                                            </div>



                                                        

                                                               <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Membership Type</span>
                                                                     <?php 
                                                                     if(isset($getUserInfo->hotel_membership_type)){
                                                                      $hotel_membership_type =  json_decode($getUserInfo->hotel_membership_type, true); 
                                                                       $hotel_membership_type = implode(",", $hotel_membership_type);
                                                                   }else{
                                                                    $hotel_membership_type ='';
                                                                   }

                                                                    ?>

                                                                    <span class="profile-ud-value">{{ $hotel_membership_type }}</span>

                                                                </div>

                                                            </div>



                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block -->         
                                


<!-- RENTAL CAR COMPANIES MEMBERSHIP PROGRAMS -->    


                           
                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">RENTAL CAR COMPANIES MEMBERSHIP PROGRAMS</h5>


                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Rental Car Company</span>
                                                                     <?php 
                                                                     if(isset($getUserInfo->car_name)){
                                                                      $car_name =  json_decode($getUserInfo->car_name, true); 
                                                                       $car_name = implode(",", $car_name);
                                                                   }else{
                                                                    $car_name = '';
                                                                   }

                                                                    ?>

                                                                    <span class="profile-ud-value">{{ $car_name }}</span>

                                                                </div>

                                                            </div>

                                                    

                                            

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Membership</span>

                                                                      <?php 
                                                                      if(isset($getUserInfo->car_membership)){
                                                                      $car_membership =  json_decode($getUserInfo->car_membership, true); 
                                                                       $car_membership = implode(",", $car_membership);
                                                                   }else{
                                                                    $car_membership = '';
                                                                   }

                                                                    ?>

                                                                    <span class="profile-ud-value">{{ $car_membership }}</span>

                                                                </div>

                                                            </div>

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Password</span>

                                                                      <?php 
                                                                      if(isset($getUserInfo->car_password)){
                                                                      $car_password =  json_decode($getUserInfo->car_password, true); 
                                                                       $car_password = implode(",", $car_password);
                                                                   }else{
                                                                    $car_password  ='';
                                                                   }

                                                                    ?>

                                                                    <span class="profile-ud-value">{{ $car_password }}</span>

                                                                </div>

                                                            </div>



                                                        

                                                               <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Membership Type</span>

                                                                     <?php 
                                                                     if(isset($getUserInfo->car_membership_type)){
                                                                      $car_membership_type =  json_decode($getUserInfo->car_membership_type, true); 
                                                                       $car_membership_type = implode(",", $car_membership_type);
                                                                   }else{

                                                                    $car_membership_type='';
                                                                   }

                                                                    ?>

                                                                    <span class="profile-ud-value">{{ $car_membership_type }}</span>

                                                                </div>

                                                            </div>



                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block -->





<!-- METHOD OF CONTACT -->    


                           
                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">METHOD OF CONTACT</h5>


                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">When Can We Call You On Your Cell?</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->when_we_call }}</span>

                                                                </div>

                                                            </div>

                                                    

                                            

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">When Can We Email You?</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->when_email_you }}</span>

                                                                </div>

                                                            </div>

                                                          


                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block -->





<!-- ADDITIONAL NOTES -->    


                           
                                <div class="nk-block">

                                    <div class="card">

                                        <div class="card-aside-wrap">

                                            <div class="card-content">

                                              

                                                <div class="card-inner">

                                                    <div class="nk-block">

                                                        <div class="nk-block-head">

                                                            <h5 class="title">ADDITIONAL NOTES</h5>


                                                        </div><!-- .nk-block-head -->

                                                        <div class="profile-ud-list">


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">ADDITIONAL NOTES</span>

                                                                    <span class="profile-ud-value">{{ $getUserInfo->notes }}</span>

                                                                </div>

                                                            </div>

                                                    

                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block -->                                                                                                                                                                                


                                <div class="nk-block">

                            </div>

                        </div>

                    </div>

                </div>

                            <script>

                                $(".active_team").click(function(){
                                $(".active_team").hide();
                                $(".inactive_team").show();

                                 });

                                $(".inactive_team").click(function(){
                                $(".inactive_team").hide();
                                $(".active_team").show();
                                 });
                             </script>  

@stop



