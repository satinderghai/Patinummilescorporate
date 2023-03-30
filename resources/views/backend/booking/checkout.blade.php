@extends('layouts.backend.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
    type="text/javascript"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
    rel="Stylesheet" type="text/css" />
<style type="text/css">

    img.ui-datepicker-trigger {
    position: absolute;
    top: 4px;
    right: 5px;
    width: 30px;
    cursor: pointer;
}

    .alert.alert-error {
        background: #a21111;
        color: #fff;
    }
    .pt-20{
        padding-top: 20px;
    }
    .text-right{
        text-align: right;
    }
    .amount-flight {
        text-align: right;
    }
    .find-btn-booking{

        width: 30%;
        float: right;
    }
    .book-air {
        float: right;
        margin-top: 15px;
    }


    .air_line.get-request-data {
        border: 1px solid #01538C;
    }
    .get-request-data{

       border: 1px solid #01538C;
   }
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
    text-transform: uppercase;

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

<style type="text/css">

  /* HM SPINNER */
  .hm-spinner{
      height: 78px;
      width: 78px;
      border: 5px solid transparent;
      border-top-color: #26A9E0;
      border-bottom-color: #26A9E0;
      border-radius: 50%;
      position: relative;
      -webkit-animation: spin 3s linear infinite;
      animation: spin 3s linear infinite;
  }
  .hm-spinner {
    position: absolute;
    z-index: 9999;
    /* top: 200px; */
    right: 49%;
}  
.loader-data-result {
    position: relative;
}

.hm-spinner::before{
  content: "";
  position: absolute;
  top: 20px;
  right: 20px;
  bottom: 20px;
  left: 20px;
  border: 5px solid transparent;
  border-top-color: #26A9E0;
  border-bottom-color: #26A9E0;
  border-radius: 50%;
  -webkit-animation: spin 1.5s linear infinite;
  animation: spin 1.5s linear infinite;

}
@keyframes spin {
  from {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
}
to {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
}
}

@-webkit-keyframes spinBack {
  from {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
}
to {
    -webkit-transform: rotate(-720deg);
    transform: rotate(-720deg);
}
}

@media only screen and (max-width: 968px) {
  .flexbox > div {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 33.3333333%;
    flex: 0 0 33.3333333%;
}
}

@media only screen and (max-width: 768px) {
  .flexbox > div {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
}
}

@media only screen and (max-width: 568px) {
  .flexbox > div {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
}
}

</style>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
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
                    <!----------------------airline-section----->
                        @if(isset($pricedOffer['total_amount']))

                        <?php 
                        $cunteryCode = '';
                        $arriving_at = '';
                        $departing_at = '';
                        $cabin_class_name = '';
                        $passenger_id = '';

                        if(isset($pricedOffer['slices'][0]['segments'][0]['origin']['iata_country_code'])){
                           $cunteryCode =  $pricedOffer['total_currency'];
                       }

                       if(isset($pricedOffer['slices'][0]['segments'][0]['passengers'][0]['passenger_id'])){
                           $passenger_id =  $pricedOffer['slices'][0]['segments'][0]['passengers'][0]['passenger_id'];
                       }



                       if(isset($pricedOffer['slices'][0]['segments'][0]['passengers'][0]['cabin_class_marketing_name'])){
                           $cabin_class_name =  $pricedOffer['slices'][0]['segments'][0]['passengers'][0]['cabin_class_marketing_name'];
                       }

                       if(isset($pricedOffer['slices'][0]['segments'][0]['departing_at'])){
                           $departing_at =  $pricedOffer['slices'][0]['segments'][0]['departing_at'];
                       }

                       if(isset($pricedOffer['slices'][0]['segments'][0]['arriving_at'])){
                           $arriving_at =  $pricedOffer['slices'][0]['segments'][0]['arriving_at'];
                       }
                       $time1 =  date("H:i:s", strtotime($arriving_at));
                       $time2 =  date("H:i:s", strtotime($departing_at));
                       $t1=strtotime($time1); 
                       $t2=strtotime($time2);    
                       $Hours = floor((($t1- $t2)/60)/60);

                       ?>
                       <div class="air_line">
                        <div class="container">
                            <div class="row">
                             <!-- <div class="col-sm-12"><h4>Flight</h4></div> -->
                             <div class="col-sm-6"><h4>Flight Payment</h4></div>   
                             <div class="col-sm-6 amount-flight">
                                <p>Amount due </p>
                                <h4>{{ $cunteryCode }} ${{ $pricedOffer['total_amount'] }}</h4>
                            </div>
                            <div class="col-sm-12">
                               <div class="merge_boxs">

                                <div class="departure-date">
                                    <div class="date__day"><span class="date_11">{{ date("d", strtotime($pricedOffer['created_at'])) }}</span></div>
                                    <div class="date__month">{{ date("M", strtotime($pricedOffer['created_at'])) }}</div>
                                </div>

                                <div class="departure-date"><img src="{{ $pricedOffer['owner']['logo_symbol_url'] }}">
                                </div>


                                <div class="departure-date">
                                    <div class="date__day" ><span>{{ date("H:i", strtotime($departing_at)) }}</span></div>
                                    <div class="date__month">LHR</div>
                                </div>


                                <div class="non_stop">
                                    <div class="non_1"><span>NON-STOP</span></div>
                                    <div class="jsx-bc8a46273ab3358a flight-details__line" bis_skin_checked="1"></div>
                                    <div class="non_1">{{ $Hours }} H</div>
                                </div>

                                <div class="departure-date" id="last_time">
                                    <div class="date__day" ><span>{{ date("H:i", strtotime($arriving_at)) }}</span></div>
                                    <div class="date__month">JFK</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>

            <!-- cart -->

            <div class="air_line">
                <div class="container">
                    <div class="row">

                     <div class="col-sm-6"><h4>Passenger info</h4></div>   
                     <div class="col-sm-6 amount-flight">

                         <!-- <p>{{ $passenger_id }}</p> -->
                     </div>
                 </div>
                 <div class="loader-data-result"></div>

                 <form class="find-booking" id="submitTravelForm">
                    <input type="hidden" name="off_id" value="{{ $pricedOffer['id'] }}">

                    <input type="hidden" name="pass_id" value="{{ $passenger_id }}">

                    <div class="row pt-20">
                        <div class="col-sm-4">
                           <div class="form-group">
                            <label class="form-label">
                            Gender*</label>
                            <div class="form-control-wrap">
                               <select class="form-control" name="gender" id="double">
                                <option value="f">Female</option>
                                <option value="m">Male</option>

                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                    <label class="form-label">
                    Title*</label>
                    <div class="form-control-wrap">
                       <select class="form-control" name="title" id="double">
                        <option value="mr">Mr.</option>
                        <option value="ms">Ms.</option>
                        <option value="mrs">Mrs.</option>
                        <option value="miss">Miss.</option>
                        <option value="dr">Dr.</option>

                    </select>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
           <div class="form-group"  id="date_select">
              <label class="form-label">Date Of Birth</label>
              <div class="form-control-wrap">
                <input type="text" name="Date_of_birth" id="txtDate" class="form-control"  required>
            </div>
        </div>

    </div>
</div>
        <div class="row pt-20">
           <div class="col-sm-6">

            <div class="form-group">
              <label class="form-label">First Name</label>
              <div class="form-control-wrap">
                <input type="text" name="first_name" class="form-control" required>
            </div>
        </div>
        </div>

        <div class="col-sm-6">

            <div class="form-group">
              <label class="form-label">Last Name</label>
              <div class="form-control-wrap">
                <input type="text" name="last_name" class="form-control" required>
            </div>
        </div>
        </div>
        </div>
        <div class="row pt-20">
           <div class="col-sm-6">
            <div class="form-group">
              <label class="form-label">Email</label>
              <div class="form-control-wrap">
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>


        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label class="form-label">Phone number</label>
                <div class="form-control-wrap">
                    <input type="text" name="phone" class="form-control" required>
                </div>
            </div>


        </div>
     

           

           
            

       
        <div class="msg-bar"></div>
        <?php $dis=''; ?>
         @if(Auth::user()->budget < $pricedOffer['total_amount'])

         <?php $dis = 'disabled';?>
                <div class="msg-bar">
                 
                  <div class="alert alert-error">Your Budget is Low</div>
                 </div>
            @endif
        <div class="book-air text-right">
            <button id="submitTravelBtn" class="btn theme-btn" {{ $dis }} >
            Check Out</button>
        </div>


        </div>
</form>
</div>



<!-- <div class="air_line">
    <div class="container">
        <div class="row">
            
         <div class="col-sm-6"><h4>Payment</h4></div>   
           <div class="col-sm-6 amount-flight">
            <p>Amount due </p>
               <h4>{{ $cunteryCode }} ${{ $pricedOffer['total_amount'] }}</h4>
           </div>


         
           
    </div>
</div>
</div> -->


<!-- end -->
@else

<div class="air_line">
    <div class="container">
        <div class="row">

         <div class="col-sm-6"></div>


         <div class="col-sm-12"><h4></h4></div>
         <div class="col-sm-12">
           <div class="merge_boxs">

             No available flight

         </div>
     </div>



     @endif






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
            url:"{{ url('admin/check-out') }}",
            data:$('#submitTravelForm').serialize(),
            dataType: 'json',
            beforeSend: function(){
                $(".loader-data-result").html('<div><div class="hm-spinner"></div></div>');
            },
            success: function(data){
                if(data.status == true){

                    $(".loader-data-result").html('');

                    $('.msg-bar').html('<div class="alert alert-success">'+data.msg+'</div>');

                    window.location.href = "{{ url('/admin/booking') }}";

                }

                if(data.status == false){
                    $(".loader-data-result").html('');
                    $('.msg-bar').html('<div class="alert alert-error">'+data.error+'</div>');
                }
           // window.location.href = "{{ url('/admin') }}";

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


<script type="text/javascript">
    $(function () {
        $("#txtDate").datepicker({
            changeMonth: true,
            changeYear: true,
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: '{{ url('/') }}/public/backend/images/calendar-337.png',
            dateFormat: 'dd-mm-yy',
            yearRange: '1900:+0',
            onSelect: function (dateString, txtDate) {
                ValidateDOB(dateString);
            }
        });
    });
    function ValidateDOB(dateString) {
        var lblError = $("#lblError");
        var parts = dateString.split("/");
        var dtDOB = new Date(parts[1] + "/" + parts[0] + "/" + parts[2]);
        var dtCurrent = new Date();
        lblError.html("Eligibility 18 years ONLY.")
        if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 18) {
            return false;
        }
 
        if (dtCurrent.getFullYear() - dtDOB.getFullYear() == 18) {
 
            //CD: 11/06/2018 and DB: 15/07/2000. Will turned 18 on 15/07/2018.
            if (dtCurrent.getMonth() < dtDOB.getMonth()) {
                return false;
            }
            if (dtCurrent.getMonth() == dtDOB.getMonth()) {
                //CD: 11/06/2018 and DB: 15/06/2000. Will turned 18 on 15/06/2018.
                if (dtCurrent.getDate() < dtDOB.getDate()) {
                    return false;
                }
            }
        }
        lblError.html("");
        return true;
    }
</script>
@stop

