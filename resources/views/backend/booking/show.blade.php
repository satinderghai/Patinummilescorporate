@extends('layouts.backend.master')

@section('content')

 <div class="nk-content ">

                    <div class="container-fluid">

                        <div class="nk-content-inner">

                            <div class="nk-content-body">

                                <div class="nk-block-head nk-block-head-sm">

                                    <div class="nk-block-between g-3">

                                        <div class="nk-block-head-content">

                                            <h3 class="nk-block-title page-title">Booking Information / <strong class="text-primary small"></strong></h3>

                                            <div class="nk-block-des text-soft">

                                                <ul class="list-inline">
 
                                                    <li>Booking ID: <span class="text-base">{{ $booking->order_id ?? '' }}</span></li>

                                                </ul>

                                            </div>

                                        </div>

                                        <div class="nk-block-head-content">

                                            <a href="{{ url('admin/booking') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>

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

                                                            <h5 class="title">Booking Information</h5>

                                                            <p>Basic info, like your Booking and name.</p>

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

                                                                    <span class="profile-ud-label">Passenger  Name</span>

                                                                    <span class="profile-ud-value">{{ $booking->given_name ?? '' }}</span>

                                                                </div>

                                                            </div>
                                                             <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Flight name</span>

                                                                    <span class="profile-ud-value">{{ $booking->flight_name ?? '' }}</span>

                                                                </div>

                                                            </div>
                                                             <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Start To</span>

                                                                    <span class="profile-ud-value">{{ $booking->checkin ?? '' }}</span>

                                                                </div>

                                                            </div>

                                                             <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Going To</span>

                                                                    <span class="profile-ud-value">{{ $booking->checkout ?? '' }}</span>

                                                                </div>

                                                            </div>
                                                             <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Price</span>

                                                                    <span class="profile-ud-value">$ {{ $booking->price ?? '' }}</span>

                                                                </div>

                                                            </div>

                                                    

                                            

                                                          


                                                        

                                                               <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Departure Date</span>

                                                                    <span class="profile-ud-value">{{ date('d M Y', strtotime($booking->departing_at)) }}</span>

                                                                </div>

                                                            </div>


                                                             <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Offer Id</span>

                                                                    <span class="profile-ud-value">{{ $booking->off_id ?? '' }}</span>

                                                                </div>

                                                            </div>

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Order Id</span>

                                                                    <span class="profile-ud-value">{{ $booking->order_id ?? '' }}</span>

                                                                </div>

                                                            </div>


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">

                                                                    <span class="profile-ud-label">Booking Reference Id</span>

                                                                    <span class="profile-ud-value">{{ $booking->booking_reference ?? '' }}</span>

                                                                </div>

                                                            </div>

                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Flight code</span>
                                                                <span class="profile-ud-value">{{ $booking->flight_code ?? '' }}</span>

                                                                </div>

                                                            </div>


                                                            <div class="profile-ud-item">

                                                                <div class="profile-ud wider">
                                                                <span class="profile-ud-label">Flight Cabin Class Name</span>
                                                                <span class="profile-ud-value">{{ $booking->cabin_class_name ?? '' }}</span>

                                                                </div>

                                                            </div>
                                                        </div><!-- .profile-ud-list -->

                                                    </div><!-- .nk-block -->

                                           

                                                

                                                </div><!-- .card-inner -->

                                            </div><!-- .card-content -->

                                        

                                        </div><!-- .card-aside-wrap -->

                                    </div><!-- .card -->

                                </div><!-- .nk-block -->

                            </div>

                        </div>

                    </div>

                </div>

@stop



