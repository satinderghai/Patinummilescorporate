@extends('layouts.backend.master')
@section('content')
<div class="nk-content ">
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
          <div class="nk-block-between">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">Company</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                  <a href="{{ url('admin/users') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                  <a href="html/user-list-regular.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
              </div>
          </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
          <div class="row g-gs">
            <div class="col-xxl-12">
              @include('backend.flash-message')
              <div class="card card-full">

                <div class="card-inner">
             {!! Form::model($users, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\backend\UserController@update',$users->id],'files'=>true]) !!}
          @include('backend.users.form', ['submitButtonText' => 'Update'])
          {!! Form::close() !!}
                   </div>
                 </div><!-- .card -->
               </div>
             </div><!-- .row -->
           </div><!-- .nk-block -->
         </div>
       </div>
     </div>
   </div>

  
@stop

