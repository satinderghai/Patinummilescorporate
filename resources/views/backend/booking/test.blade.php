@extends('layouts.backend.master')
@section('content')
<style type="text/css">
    .br-tab .day-time-to :hover {
    color: #fff;
}
.checkbox-custom, .radio-custom {
    opacity: 0;
    position: absolute;   
}

.checkbox-custom, .checkbox-custom-label, .radio-custom, .radio-custom-label {
    display: inline-block;
    vertical-align: middle;
    margin: 5px;
    cursor: pointer;
}

.checkbox-custom-label, .radio-custom-label {
    position: relative;
}

.checkbox-custom + .checkbox-custom-label:before, .radio-custom + .radio-custom-label:before {
    content: '';
    background: #fff;
    border: 2px solid #ddd;
    display: inline-block;
    vertical-align: middle;
    width: 27px;
    height: 27px;
    padding: 2px;
    margin-right: 10px;
    text-align: center;
}

.checkbox-custom:checked + .checkbox-custom-label:before {
    content: "\f00c";
    font-family: 'FontAwesome';
    background: rebeccapurple;
    color: #fff;
}

.radio-custom + .radio-custom-label:before {
    border-radius: 50%;
}

.radio-custom:checked + .radio-custom-label:before {
    content: "\f00c";
    font-family: 'FontAwesome';
    color: #fff;
    background: #26A9E0;
    border: none;
}
.form-control, .dual-listbox .dual-listbox__search, div.dataTables_wrapper div.dataTables_filter input{
	appearance: auto;
}
#date_select input[type="text"] {
    width: 100%;
    border: 1px solid #dbdfea;
    padding: 0.4375rem 1rem;
}
#date_select input[type="text"]:focus-visible {
    outline: none;
}

#submitTravelForm .form-label {
    font-size: 0.975rem !important;
 }
span.eco_1 {
    background: #E2E2E8;
    padding: 8px 20px;
    border-radius: 21px;
    font-weight: 500;
    color: #000;
}

.air_line svg {
    float: right;
    background: #B696F9;
    border-radius: 12px;
    width: 25px;
}

.air_line .col-sm-12 {
    padding-top: 20px;
}
.air_line {
    border: 1px solid #e2e2e8;
    padding: 30px 0px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 5%), 0 6px 20px 0 rgb(0 0 0 / 0%);
    margin: 10px 0;
}
.merge_boxs {
    display: flex;
    border: 1px solid #e2e2e8;
    padding: 10px 25px;
    align-items: center;
    border-radius: 5px;
}
.departure-date {
    width: 20%;
}
#last_time {
    text-align: end;
}

.flight-details__line.jsx-bc8a46273ab3358a::after {
    content: "";
    width: 0;
    height: 0;
    border-top: 3px solid transparent;
    border-bottom: 3px solid transparent;
    border-left: 6px solid #EAEAEE;
    position: absolute;
    left: 163px;
    top: 20px;
}
.flight-details__line.jsx-bc8a46273ab3358a {
    height: 1px;
    background: #e2e2e8;
}
.non_stop {
    width: 168px;
    position: relative;
}
.non_1 {
    text-align: center;
}
.date__day span {
    font-weight: 800;
    color: #000;
    font-size: 18px;
}
span.date_11 {
    color: #ababb4;
}
.non_1 span {
    color: #5aaa9c;
    font-size: 12px;
    font-weight: 500;
    }
 .date__month {
    font-size: 12px;
    color: #ababb4;
}
.date__day {
    color: #ababb4;
    height: 24px;
}
.non_1 {
    text-align: center;
    font-size: 12px;
    color:#ababb4;
}
.departure-date img {
    max-width: 100%;
    height: 33px;
    object-fit: contain;
}
#multi-cityTravelForm h4 {
    font-size: 18px;
}

.row.fight_1st {
    padding: 25px 5px;
    border: solid 2px #e2e2e8;
    margin: 20px 0;
    border-radius: 5px;
}
#multi-cityTravelForm .form-control, .dual-listbox .dual-listbox__search, div.dataTables_wrapper div.dataTables_filter input {
    appearance: auto;
    background: #f6f5f9;
    border: 2px solid #e2e2e8;
    height: 45px;
}
#multi-cityTravelForm input[type="text"] {
    background: #f6f5f9;
    border: 2px solid #e2e2e8 !important;
    height: 45px;
}
.flight_last {
    padding: 0 20px;
}
#multi-cityTravelForm .form-control, .dual-listbox .dual-listbox__search, div.dataTables_wrapper div.dataTables_filter input::placeholder {
    font-size: 15px;
    font-weight: 500;
    color: #B1B5AA;
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
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Journey type</label>
                                        <div class="form-group">

                                            <input id="radio-1" class="radio-custom one-way-show" name="radio-group" type="radio" checked>
									            <label for="radio-1" class="radio-custom-label">One way</label>
									        
									            <input id="radio-2" class="radio-custom show-return"name="radio-group" type="radio">
									            <label for="radio-2" class="radio-custom-label">Return</label>
									        
									            <input id="radio-3" class="radio-custom show-multi-city" name="radio-group" type="radio">
									            <label for="radio-3" class="radio-custom-label">Multi-city</label>

                                                <input type="hidden" value="one-way" id="type-serach" name="typeseach">
                                        </div>
                                    </div>
                                </div>



                               

                                <div class="col-sm-6 one-way-form-main">
                                    <div class="form-group">
                                        <label class="form-label">
                                        Origin*</label>
                                        <div class="form-control-wrap">
                                        	<select class="form-control" name="origin" id="single">
			                                	<option value="LHR">LHR (London Heathrow)</option>
			                                	<option value="CDG">CDG (Paris Charles de Gaulle)</option>
			                                	<option value="MEL">MEL (Melbourne)</option>
			                                	<option value="LAX">LAX (Los Angeles Intl)</option>
			                                	<option value="BCN">BCN (Barcelona-El Prat)</option>
			                                	<option value="SYD">SYD (Sydney)</option>
			                                	<option value="AKL">AKL (Auckland)</option>
			                                	<option value="DEL">DEL (Indira Gandhi Intl)</option>
			                                	<option value="SIN">SIN (Singapore Changi)</option>
			                                	<option value="HKG">HKG (Hong Kong Intl)</option>
			                                </select>
                                    </div>


                                </div>

                            </div>
                            <div class="col-sm-6 one-way-form-main">
                                <div class="form-group">
                                    <label class="form-label">
                                    Destination*</label>
                                    <div class="form-control-wrap">


                                      <select class="form-control" name="destination" id="double">
                                      	<option value="JFK">JFK (John F Kennedy Intl)</option>
                                      	<option value="CDG">CDG (Paris Charles de Gaulle)</option>
                                      	<option value="MEL">MEL (Melbourne)</option>
                                      	<option value="LAX">LAX (Los Angeles Intl)</option>
                                      	<option value="BCN">BCN (Barcelona-El Prat)</option>
                                      	<option value="SYD">SYD (Sydney)</option>
                                      	<option value="AKL">AKL (Auckland)</option>
                                      	<option value="DEL">DEL (Indira Gandhi Intl)</option>
                                      	<option value="SIN">SIN (Singapore Changi)</option>
                                      	<option value="HKG">HKG (Hong Kong Intl)</option>
                                      </select>
                              
                                 </div>


                             </div>

                         </div>

                        <div class="col-sm-12 one-way-form">
                                <div class="form-group"  id="date_select">
                                  <label class="form-label">Departure date</label>
                                    <div class="form-control-wrap">
                                  	<input type="text" name="departure_date_one_way" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                               	    </div>
                                </div>
                        </div>
                           

                        <div class="col-sm-6 return-way-form" bis_skin_checked="1">
                            <div class="form-group" id="date_select" bis_skin_checked="1">
                                <label class="form-label">Departure date</label>
                                <div class="form-control-wrap" bis_skin_checked="1">
                                  <input type="text" name="departure_date_return_way" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                              </div>
                           </div>
                        </div>
                    

                    <div class="col-sm-6 return-way-form" bis_skin_checked="1">
                            <div class="form-group" id="date_select" bis_skin_checked="1">
                                <label class="form-label">Return date</label>
                                <div class="form-control-wrap" bis_skin_checked="1">
                                  <input type="text" name="return_date" class="form-control date-picker">
                              </div>
                           </div>
                     </div>
      


                              
                    </div>





  <!----------------------Multicity-section----->

                  <div class="find-booking multi-city-form" id="multi-cityTravelForm">
                        <div class="row fight_1st" bis_skin_checked="1">


                              <h4>Flight 1</h4>
                                <div class="col-sm-6" bis_skin_checked="1">
                                    <div class="form-group" bis_skin_checked="1">
                                        <label class="form-label">
                                        Origin*</label>
                                        <div class="form-control-wrap" bis_skin_checked="1">
                                          <select class="form-control" name="origin" id="single">
                                            <option value="LHR">LHR (London Heathrow)</option>
                                            <option value="CDG">CDG (Paris Charles de Gaulle)</option>
                                            <option value="MEL">MEL (Melbourne)</option>
                                            <option value="LAX">LAX (Los Angeles Intl)</option>
                                          </select>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6" bis_skin_checked="1">
                                      <div class="form-group" bis_skin_checked="1">
                                          <label class="form-label">
                                          Destination*</label>
                                          <div class="form-control-wrap" bis_skin_checked="1">
                                            <select class="form-control" name="destination" id="double">
                                              <option value="JFK">JFK (John F Kennedy Intl)</option>
                                              <option value="CDG">CDG (Paris Charles de Gaulle)</option>
                                              <option value="MEL">MEL (Melbourne)</option>
                                              <option value="LAX">LAX (Los Angeles Intl)</option>                               
                                            </select>
                                       </div>
                                   </div>
                               </div>

                               <div class="col-sm-12" bis_skin_checked="1">
                                      <div class="form-group" id="date_select" bis_skin_checked="1">
                                          <label class="form-label">Departure date</label>
                                          <div class="form-control-wrap" bis_skin_checked="1">
                                            <input type="text" name="departure_date_flight1" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                        </div>
                                     </div>
                               </div>
                           </div>

                          <div class="row fight_1st" bis_skin_checked="1">
                                 <h4>Flight 2 </h4>
                                  <div class="col-sm-6" bis_skin_checked="1">
                                    <div class="form-group" bis_skin_checked="1">
                                        <label class="form-label">
                                        Origin*</label>
                                        <div class="form-control-wrap" bis_skin_checked="1">
                                          <select class="form-control" name="origin" id="single">
                                            <option value="LHR">JFK</option>
                                            <option value="CDG">CDG (Paris Charles de Gaulle)</option>
                                            <option value="MEL">MEL (Melbourne)</option>
                                          </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-sm-6" bis_skin_checked="1">
                                      <div class="form-group" bis_skin_checked="1">
                                          <label class="form-label">Destination*</label>
                                          <div class="form-control-wrap" bis_skin_checked="1">
                                            <select class="form-control" name="destination" id="double">
                                              <option value="JFK">CDG</option>
                                              <option value="MEL">MEL (Melbourne)</option>
                                              <option value="LAX">LAX (Los Angeles Intl)</option>
                                              <option value="BCN">BCN (Barcelona-El Prat)</option>
                                            </select>
                                         </div>
                                     </div>
                               </div> 
                   
                              <div class="col-sm-12" bis_skin_checked="1">
                                    <div class="form-group" id="date_select" bis_skin_checked="1">
                                        <label class="form-label">Departure date</label>
                                        <div class="form-control-wrap" bis_skin_checked="1">
                                          <input type="text" name="departure_date_flight2" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                      </div>
                                   </div>
                              </div>
                      </div>
                               
                        <div class="row fight_1st" bis_skin_checked="1">
                                  <h4>Flight 3</h4>
                                    <div class="col-sm-6" bis_skin_checked="1">
                                      <div class="form-group" bis_skin_checked="1">
                                          <label class="form-label">
                                          Origin*</label>
                                          <div class="form-control-wrap" bis_skin_checked="1">
                                            <select class="form-control" name="origin" id="single">
                                              <option value="LHR">JFK</option>
                                              <option value="CDG">CDG (Paris Charles de Gaulle)</option>
                                              <option value="MEL">MEL (Melbourne)</option>
                                            </select>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-sm-6" bis_skin_checked="1">
                                      <div class="form-group" bis_skin_checked="1">
                                          <label class="form-label">Destination*</label>
                                          <div class="form-control-wrap" bis_skin_checked="1">
                                            <select class="form-control" name="destination" id="double">
                                              <option value="JFK">CDG</option>
                                              <option value="MEL">MEL (Melbourne)</option>
                                              <option value="LAX">LAX (Los Angeles Intl)</option>
                                              <option value="BCN">BCN (Barcelona-El Prat)</option>
                                            </select>
                                         </div>
                                     </div>
                               </div> 

                          <div class="col-sm-12" bis_skin_checked="1">
                                <div class="form-group" id="" bis_skin_checked="1">
                                    <label class="form-label">Departure date</label>
                                    <div class="form-control-wrap" bis_skin_checked="1">
                                      <input type="text" name="departure_date_flight3" class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                  </div>
                               </div>
                          </div>
                    </div>



                        
                  </div>

                

        <div class="row">

             <div class="col-sm-6">
                                <label class="form-label">Passengers</label>
                                  <div class="form-group">
                                    <select class="form-control" name="passenger" id="double">
                                        <option value="ad">Adult</option>
                                        <option value="un">Under 18</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Class</label>
                              <div class="form-group">
                                  <select class="form-control" name="class" id="double">
                                    <option value="an">Any</option>
                                    <option value="1">1</option>
                                  </select>
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










<!----------------------airline-section----->
<div class="air_line">
	<div class="container">
		<div class="row">
	       <div class="col-sm-6"><span class="eco_1">Economy</span></div>	
	       <div class="col-sm-6"><svg width="18" height="18" viewBox="0 0 24 24" color="#fff" aria-label="check" class="jsx-1699385641 ff-icon"><path d="M9.54961 18.0001L3.84961 12.3001L5.27461 10.8751L9.54961 15.1501L18.7246 5.9751L20.1496 7.4001L9.54961 18.0001Z"></path></svg></div>


	       <div class="col-sm-12"><h4>US$303.33</h4></div>
	       <div class="col-sm-12">
          	 <div class="merge_boxs">
          	
          	 	<div class="departure-date">
          	 		<div class="date__day"><span class="date_11">18</span></div>
          	 		<div class="date__month">AUG</div>
          	    </div>

          	 	<div class="departure-date"><img src="https://platinummilescorporate.com/dev/public/backend/images/ZZ.svg">
              </div>


          	 	<div class="departure-date">
          	 		<div class="date__day" ><span>13:09</span></div>
          	 		<div class="date__month">LHR</div>
          	    </div>

          	 	
          	 	<div class="non_stop">
          	 		<div class="non_1"><span>NON-STOP</span></div>
          	 		<div class="jsx-bc8a46273ab3358a flight-details__line" bis_skin_checked="1"></div>
          	 		<div class="non_1">08H 08M</div>
          	    </div>

          	    <div class="departure-date" id="last_time">
          	 		<div class="date__day" ><span>16:17</span></div>
          	 		<div class="date__month">JFK</div>
          	    </div>
             </div>
	    </div>
	</div>
</div>
</div>
<!-- second-airline -->
<div class="air_line">
	<div class="container">
		<div class="row">
	       <div class="col-sm-6"><span class="eco_1">Premium Economy</span></div>	
	       <div class="col-sm-6"><svg width="18" height="18" viewBox="0 0 24 24" color="#fff" aria-label="check" class="jsx-1699385641 ff-icon"><path d="M9.54961 18.0001L3.84961 12.3001L5.27461 10.8751L9.54961 15.1501L18.7246 5.9751L20.1496 7.4001L9.54961 18.0001Z"></path></svg></div>


	       <div class="col-sm-12"><h4>US$484.12</h4></div>
	       <div class="col-sm-12">
          	 <div class="merge_boxs">
          	
          	 	<div class="departure-date">
          	 		<div class="date__day"><span class="date_11">18</span></div>
          	 		<div class="date__month">AUG</div>
          	    </div>

          	 	<div class="departure-date"><img src="https://platinummilescorporate.com/dev/public/backend/images/ZZ.svg"></div>


          	 	<div class="departure-date">
          	 		<div class="date__day" ><span>13:09</span></div>
          	 		<div class="date__month">LHR</div>
          	    </div>

          	 	
          	 	<div class="non_stop">
          	 		<div class="non_1"><span>NON-STOP</span></div>
          	 		<div class="jsx-bc8a46273ab3358a flight-details__line" bis_skin_checked="1"></div>
          	 		<div class="non_1">08H 08M</div>
          	    </div>

          	    <div class="departure-date" id="last_time">
          	 		<div class="date__day" ><span>16:17</span></div>
          	 		<div class="date__month">JFK</div>
          	    </div>
             </div>
	    </div>
	</div>
</div>
</div>



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
        $('.return-way-form').hide();
        $('.multi-city-form').hide();
        
        $(document).on("click",".show-return",function(e){  

            var returnform  = 'returnform';
             $('#type-serach').val(returnform); 
        $('.one-way-form-main').show(); 
            $('.return-way-form').show();
            $('.one-way-form').hide();
            $('.multi-city-form').hide();
        });
        $(document).on("click",".one-way-show",function(e){  
            var oneway  = 'one-way';
             $('#type-serach').val(oneway); 
       
            $('.return-way-form').hide();
            $('.one-way-form').show();
            $('.one-way-form-main').show();
            $('.multi-city-form').hide();
        });
        

        $(document).on("click",".show-multi-city",function(e){  
        var multicity  = 'multi-city';
             $('#type-serach').val(multicity);   
            $('.return-way-form').hide();
            $('.one-way-form-main').hide();
            $('.multi-city-form').show();
        });
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
            url:"{{ url('admin/getBookingDetails') }}",
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

