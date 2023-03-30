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

               Teams
             </h3>
           </div><!-- .nk-block-head-content -->

         </div><!-- .nk-block-between -->
       </div><!-- .nk-block-head -->
       <div class="nk-block">


        <div class="card">
         @include('backend.flash-message')
         <div class="card-inner">
          {!! Form::open(['action' => 'App\Http\Controllers\backend\TeamController@store','id' => 'form_validation','files'=>true,'class'=>'card-form']) !!}
          @include('backend.teams.form', ['submitButtonText' => 'Submit'])
          {!! Form::close() !!}
        </div>
      </div>
    </div><!-- .nk-block -->
  </div>
</div>
</div>
</div>

<div id="DeleteModal" class="modal fade text-danger" role="dialog">
 <div class="modal-dialog ">
   <!-- Modal content-->
   <form action="" id="deleteForm" method="post">
     <div class="modal-content">
       <div class="modal-header bg-danger">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
       </div>
       <div class="modal-body">
         {{ csrf_field() }}
         {{ method_field('DELETE') }}
         <p class="text-center">Are You Sure Want To Delete ?</p>
       </div>
       <div class="modal-footer">
         <center>
           <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
           <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
         </center>
       </div>
     </div>
   </form>
 </div>
</div>
<script type="text/javascript">
 function deleteData(id)
 {
   var id = id;
   var url = '{{ route("users.destroy", ":id") }}';
   url = url.replace(':id', id);
   $("#deleteForm").attr('action', url);
 }

 function formSubmit()
 {
   $("#deleteForm").submit();
 }
</script>

<script type="text/javascript">
  $(document).ready(function () {
       // $('#example').DataTable();
     });
   </script>
   @stop

