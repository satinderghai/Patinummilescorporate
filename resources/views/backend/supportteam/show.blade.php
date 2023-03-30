@extends('layouts.backend.master')

@section('content')

 <div class="nk-content ">

                    <div class="container-fluid">

                        <div class="nk-content-inner">

                            <div class="nk-content-body">

                                <div class="nk-block-head nk-block-head-sm">

                                    <div class="nk-block-between g-3">

                                        <div class="nk-block-head-content">

                                            <h3 class="nk-block-title page-title">Support Team Information / <strong class="text-primary small">{{ $getUserInfo->name }}</strong></h3>

                                            <div class="nk-block-des text-soft">

                                                <ul class="list-inline">

                                                    <li>Support Team ID: <span class="text-base">UD{{ $getUserInfo->id }}</span></li>

                                                </ul>

                                            </div>

                                        </div>

                                        <div class="nk-block-head-content">

                                            <a href="{{ url('admin/supportteams') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
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

                                                            <h5 class="title">Support Team Information</h5>

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





<!-- ADDITIONAL NOTES -->    


                           
                                <div class="nk-block">

                                    

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



