@extends('layouts.backend.master')
@section('content')
<style type="text/css">
    .br-tab .day-time-to :hover {
    color: #fff;
}
</style>
<div class="nk-content">
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
          <div class="nk-block-between">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">

                 Booking
             </h3>
         </div><!-- .nk-block-head-content -->

     </div><!-- .nk-block-between -->
 </div><!-- .nk-block-head -->
 <div class="nk-block">
    <div class="row g-gs">
        <div class="col-xxl-12">
            <div class="card card-full">
                <div class="card card-preview full-height">
                    <div class="card-inner">
                        <form class="find-booking" id="submitTravelForm">
                            <div class="row">
                                  @if(Auth::user()->role == 1)
                                   
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label">
                                        Select Member</label>
                                        <div class="form-control-wrap select_user" id="select_user">

                                         

                                    </div>


                                </div>

                            </div>

                                  <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Find a Hotel</label>
                                        <div class="form-group">

                                            <input type="text" class="form-control" id="search_input" name="location" placeholder="Type address..." />
                                            <input type="hidden" id="loc_lat" />
                                            <input type="hidden" id="loc_long" />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label">Check-In</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-calendar"></em>
                                            </div>
                                            <input type="text" name="checkin" 
                                            class="form-control date-picker"
                                            data-date-format="yyyy-mm-dd">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-label">
                                        Check-Out</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-calendar"></em>
                                            </div>
                                            <input type="text" name="checkout" 
                                            class="form-control date-picker"
                                            data-date-format="yyyy-mm-dd">
                                        </div>
                                    </div>
                                </div>

                                  @else
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Find a Hotel</label>
                                        <div class="form-group">

                                            <input type="text" class="form-control" id="search_input" name="location" placeholder="Type address..." />
                                            <input type="hidden" id="loc_lat" />
                                            <input type="hidden" id="loc_long" />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label">Check-In</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-calendar"></em>
                                            </div>
                                            <input type="text" name="checkin" 
                                            class="form-control date-picker"
                                            data-date-format="yyyy-mm-dd">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="form-label">
                                        Check-Out</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-calendar"></em>
                                            </div>
                                            <input type="text" name="checkout" 
                                            class="form-control date-picker"
                                            data-date-format="yyyy-mm-dd">
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                        Single</label>
                                        <div class="form-control-wrap">

                                          <select class="form-control" name="single" id="single">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                        </select>

                                    </div>


                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">
                                    Double</label>
                                    <div class="form-control-wrap">


                                      <select class="form-control" name="double" id="double">
                                         <option value="0">0</option>
                                         <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                         <option value="5">5</option>
                                         <option value="6">6</option>
                                         <option value="7">7</option>
                                     </select>
                                 </div>


                             </div>

                         </div>

                         <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">
                                Book with Traveler Names?</label>
                                <div class="form-control-wrap">


                                  <select class="form-control" name="cars" id="cars">
                                     <option value="yes">Yes</option>
                                     <option value="no">No</option>

                                 </select>
                             </div>


                         </div>

                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                            <label class="form-label">
                            Add Flight</label>
                            <div class="form-control-wrap">


                              <input type="checkbox" id="add-flight" name="add-flight" value="Bike">
                          </div>


                      </div>

                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                        <label class="form-label">
                        Add Rental Car</label>
                        <div class="form-control-wrap">


                           <input type="checkbox" id="add-rental" name="add-rental" value="Bike">
                       </div>


                   </div>

               </div>


               <div class="col-sm-4">
                <div class="form-group">
                    <button id="submitTravelBtn" class="btn theme-btn btn-block find-btn">
                Find Hotel</button>
            </div>
        </div>
    </div>
</form>



<div class="booking-result">



</div>
<span class="bookRequestSend"></span>

</div>
</div><!-- .card-preview -->
</div><!-- .card -->
</div>
</div><!-- .row -->
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


<script>
    $(function(){


// Get Booking Listing
      $(document).on("click","#submitTravelBtn",function(e){     
          e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({

            type:"POST",
            url:"{{ url('admin/apiresponse') }}",
            data:$('#submitTravelForm').serialize(),
            dataType: 'json',
            success: function(data){
               if(data.status == true){
                $('.booking-result').html(data.html);
            }

            if(data.status == false){
                $('.msg-bar').html('<div class="alert alert-success">'+data.msg+'</div>');
            }
           // window.location.href = "{{ url('/admin') }}";

        },
        error: function (data) {
      
     }
 });
          return false;
      });


      // Add Booking

            $(document).on("click",".bookAbooking",function(e){     
          e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });


var bookID = $(this).attr('data-id');
var userID = $('#select_user').find(":selected").val();

          $.ajax({

            type:"POST",
            url:"{{ url('admin/addBookingDetails') }}",
            data:{id:bookID,user_id:userID},
            dataType: 'json',
            success: function(data){
               if(data.status == true){
                $('.bookRequestSend').html('Request Sent');
            }

        },
        error: function (data) {
      
     }
 });
          return false;
      });

  });
</script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAhSlc-A32hneDNPu4jCOzxIyRA7L1JxBo"></script>
<script type="text/javascript">
  var searchInput = 'search_input';

  $(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['geocode'],
    });

    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
        document.getElementById('loc_lat').value = near_place.geometry.location.lat();
        document.getElementById('loc_long').value = near_place.geometry.location.lng();

        document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
        document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
    });
});


</script>
@stop

