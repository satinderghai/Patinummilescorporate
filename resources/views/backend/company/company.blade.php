@extends('layouts.backend.master')
@section('content')
<div class="nk-content ">
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
          <div class="nk-block-between">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">Company Profile</h3>
            </div><!-- .nk-block-head-content -->
          </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
          <div class="row g-gs">
            <div class="col-xxl-12">
                  @include('backend.flash-message')
              <div class="card card-full">
               
                <div class="card-inner">
                  <form class="card-form" action="{{ url('admin/update-company-profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                          <input type="file" name="image" id="logoUpload"  accept="image/*" onchange="loadFile(event)" style="display:none"/> 
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label class="form-label" for="name">Company
                          Logo</label>&nbsp;&nbsp;&nbsp;&nbsp;

                          <div class="ui-code">
                          <label class="form-label text-right" for="name">Company
                          Code  &nbsp;&nbsp;</label><span><strong>{{ (isset($getUserInfo->code)) ? $getUserInfo->code : '' }}</strong></span>
                          </div>


                          <div class="form-control-wrap">
                            <div class="comp-logo-wrap">
                              @if(!empty($getUserInfo->image))
                              <img id="blah" class="comp-logo" src="{{ url('/') }}/public/backend/images/{{ $getUserInfo->image }}"
                              alt="Image">

                              @else
                              <img id="blah" class="comp-logo" src="{{ url('/') }}/public/backend/images/logo.jpg"
                              alt="Image">

                              @endif
                          
                                  <button class="edit-btn logoClickIcon">
                                <i class="fa fa-pencil"
                                aria-hidden="true"></i>
                              </button>

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="form-label" for="name">Company
                          Name</label>
                          <div class="form-control-wrap">
                            <input type="text" class="form-control" name="company_name" 
                            value="{{ (isset($getUserInfo->company_name)) ? $getUserInfo->company_name : '' }}">  
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="form-label" for="name">Your
                          Name</label>
                          <div class="form-control-wrap">
                            <input type="text" class="form-control" name="name" 
                            value="{{ (isset($getUserInfo->name)) ? $getUserInfo->name : '' }}">

                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="form-label" for="name">Email</label>
                          <div class="form-control-wrap">
                            <input type="text" class="form-control" name="email" 
                            value="{{ (isset($getUserInfo->email)) ? $getUserInfo->email : '' }}">
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="form-label" for="name">Phone</label>
                          <div class="form-control-wrap">
                            <input type="text" class="form-control" name="phone" 
                            value="{{ (isset($getUserInfo->phone)) ? $getUserInfo->phone : '' }}">
                          </div>
                        </div>
                      </div>
                                               <!--              <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="password">Password</label>
                                                                    <div class="form-control-wrap">
                                                                        <a href="#"
                                                                            class="form-icon form-icon-right passcode-switch lg is-shown"
                                                                            data-target="password">
                                                                            <em
                                                                                class="passcode-icon icon-show icon ni ni-eye"></em>
                                                                            <em
                                                                                class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                                        </a>
                                                                        <input type="text" class="form-control is-shown"
                                                                            id="password" value="!&$^%&%(%)8">
                                                                    </div>
                                                                </div>
                                                              </div> -->
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                     <!--    <button type="submit" class="btn theme-btn">Edit
                                                                     Profile</button> -->
                                                                     <button type="submit"
                                                                     class="btn theme-btn ms-1">Update</button>
                                                                   </div>
                                                                 </div>
                                                               </div>
                                                             </div>
                                                           </form>
                                                         </div>
                                                       </div><!-- .card -->
                                                     </div>
                                                   </div><!-- .row -->
                                                 </div><!-- .nk-block -->
                                               </div>
                                             </div>
                                           </div>
                                         </div>

                                         <script type="text/javascript">
  var loadFile = function(event) {
    var output = document.getElementById('blah');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
                                              $(document).ready(function(){
                                                 $(document).on('click', '.logoClickIcon', function(e){
                                                    e.preventDefault();
                                                    $('#logoUpload').trigger('click');
                                                       });
                                            });
                                         </script>
                                         @stop

