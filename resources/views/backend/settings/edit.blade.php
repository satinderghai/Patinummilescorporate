@extends('layouts.backend.master')
@section('content')
<div class="nk-content">
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
          <div class="nk-block-between">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">

               Settings
             </h3>
           </div><!-- .nk-block-head-content -->

         </div><!-- .nk-block-between -->
       </div><!-- .nk-block-head -->
       <div class="nk-block">


        <div class="card">
         @include('backend.flash-message')
         <div class="card-inner">
            {!! Form::model($setting, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\backend\SettingController@update',$setting->id],'files'=>true]) !!}
          @include('backend.settings.form', ['submitButtonText' => 'Update'])
          {!! Form::close() !!}
        </div>
      </div>
    </div><!-- .nk-block -->
  </div>
</div>
</div>
</div>

@stop

