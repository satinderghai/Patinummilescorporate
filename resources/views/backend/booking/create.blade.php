@extends('layouts.backend.master')
@section('content')
<style type="text/css">
  .find-btn-booking{

    width: 30%;
    float: right;
  }
  .book-air {
    float: right;
    margin-top: 15px;
  }
  .book-air {
    display: none;
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



.get-request-icon {
  float: right;
  border: 1px solid #B696F9;
  border-radius: 12px;
  width: 25px;
  text-align: center;
  height: 25px;
}
.show-icon-first{
 background: #B696F9;
 border-radius: 12px;
 width: 25px;
 text-align: center;
 height: 25px;
}
.get-request-icon svg {
 
  visibility: hidden;
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
  


  .text {
    display: table;
    margin: 20px auto;
  }
  .t-dropdown-block {
    width: 200px;
    height: 28px;
    margin: 20px auto;
    position:relative
  }

  .t-dropdown-list {
    display: none;
    background-color: #FFF;
    border: 1px solid #DDD;
    z-index: 10;
    box-shadow: 4px 4px 5px rgba(0, 0, 0, .3);
    list-style: none;
    margin: 0;
    padding: 0;
    height: 150px;
    overflow: auto;
    position: absolute;
    margin-top: 10px;
  }

  .t-dropdown-item {
    padding: 5px 20px;
    margin: 0;
    cursor: pointer;
  }

  .t-dropdown-item:hover {
    background-color: #F1F1F1;
  }

  .t-dropdown-select {
    border: 1px solid #DDD;
    width: 100%;
    height: 100%;
    border-radius: 3px;
    position: relative;
    overflow: hidden;
    background-color: #FFF;
    box-sizing: content-box;
  }

  .t-dropdown-input {
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;
    border: 0;
    height: 100%;
    width: 100%;
    padding: 0 3px 0 10px;
    box-sizing: border-box;
  }

  .t-select-btn {
    background-image: url(https://cdn4.iconfinder.com/data/icons/ui-indicatives/100/Indicatives-26-128.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: 7px 7px;
    position: absolute;
    width: 30px;
    top: 0;
    right: 0;
    height: 100%;
    border-left: 1px solid #DDD;
  }

  .t-select-btn:active {
    background-color: #F1F1F1;
  }

  span.error-booking {
    text-align: center;
    color: red;
    font-size: 15px;
    font-weight: bold;
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
                  <form class="find-booking" id="submitTravelForm">
                    <div class="row">
                      
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label class="form-label" for="name">Journey type</label>
                          <div class="form-group">
                                           <!--  <input id="to_input" type="text" name="">
                                             <div id="to_input_result" class="route-listing-show"> -->

                                              <input id="radio-1" class="radio-custom one-way-show" name="radio-group" type="radio" checked>
                                              <label for="radio-1" class="radio-custom-label">One way</label>
                                              
                                               <!--  <input id="radio-2" class="radio-custom show-return"name="radio-group" type="radio">
                                                <label for="radio-2" class="radio-custom-label">Return</label> -->
                                                
                                                <!-- <input id="radio-3" class="radio-custom show-multi-city" name="radio-group" type="radio">
                                                  <label for="radio-3" class="radio-custom-label">Multi-city</label> -->

                                                  <input type="hidden" value="one-way" id="type-serach" name="typeseach">
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-sm-6 one-way-form-main">
                                              <div class="form-group">
                                              <label class="form-label">
                                                Origin*</label>
                                                <div class="form-control-wrap">
                                                <input type="text" name="origin" class="form-control" id="originTo" placeholder="Type origin"/>

                                                  
                                        <!--     <select class="form-control" name="origin" id="single">
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
                                              </select> -->
                                            </div>


                                          </div>

                                        </div>
                                        <div class="col-sm-6 one-way-form-main">
                                          <div class="form-group">
                                            <label class="form-label">
                                            Destination*</label>
                                            <div class="form-control-wrap">
                                              <input type="text" name="destination" class="form-control" id="toDestination" placeholder="Type destination"/>

                                 <!--      <select class="form-control" name="destination" id="double">
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
                                      </select> -->
                                      
                                    </div>


                                  </div>

                                </div>

                                <div class="col-sm-12 one-way-form">
                                  <div class="form-group"  id="date_select">
                                    <label class="form-label">Departure date</label>
                                    <div class="form-control-wrap">
                                      <input type="text" name="departure_date_one_way" placeholder="Select departure date" class="form-control date-picker" data-date-format="yyyy-mm-dd" required>
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
                                      <input type="text" id="datepicker" name="departure_date_flight3" class="form-control " data-date-format="yyyy-mm-dd">
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
                                  <!-- <option value="un">Under 18</option> -->
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label">Cabin Class</label>
                              <div class="form-group">
                                <select class="form-control" name="cabin_class" id="double">
                                  <option value="economy">Economy</option>
                                  <option value="business">Business</option>
                                  <option value="first">First</option>
                                  <option value="premium_economy">Premium Economy</option>
                                   </select>
                              </div>
                            </div>

                            <div class="loader-data-result"></div>
                            <div class="col-12">
                              <div class="form-group find-btn-booking">
                                <button id="submitTravelBtn" class="btn theme-btn btn-block find-btn">
                                Find Available Flight</button>
                              </div>
                            </div>
                          </div>
                        </form>










                        <!----------------------airline-section----->




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
   $(document).ready(function() {
     $(".loader-data-result").html('');

        $("#submitTravelBtn").click(function() {
          
          var form = $("#submitTravelForm");
          form.validate({
            rules: {
              origin: {
                required: true
            },
            destination: {
                required: true
            }
        },
        messages: {
          origin: {
            required: "Origin field is required."
        },
        destination: {
            required: "destination field is required."
        }
        
    }
});
          if (form.valid() === true) {
            return true;

        }else{
           return false;
        }
    });
    });



    $(document).ready(function () {

      $('.return-way-form').hide();
      $('.multi-city-form').hide();

      $('.bookAbooking-air').hide();
      
      
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

      

      
      $(document).on("click",".air_line",function(e){ 

        $('.air_line.get-request-data').removeClass("get-request-data");

        $('.air_line').find('.book-air').css("display", "none")

        $('.show-icon-first').css("visibility", "hidden");
        
        $(this).addClass("get-request-data");
        jQuery(this).find('.get-request-icon svg').css("visibility", "visible").addClass("show-icon-first");
        jQuery('.get-request-data').find('.book-air').show();

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
          beforeSend: function(){
            $(".loader-data-result").html('<div><div class="hm-spinner"></div></div>');
          },
          success: function(data){
            if(data.status == true){
             $('.bookAbooking-air').hide();
             $(".loader-data-result").html('');
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



// autocomplete input search
        //     $(document).on("keyup","#to_input",function(e){     
        //       e.preventDefault();
        //       $.ajaxSetup({
        //           headers: {
        //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //           }
        //       });

        //       var query = $(this).val();
        //       $.ajax({

        //         type:"POST",
        //         url:"{{ url('admin/booking-autocomplete-search') }}",
        //         data:{inputString:query},
        //         dataType: 'json',
        //         success: function(data){
        //          if(data.status == true){
        //            $.each(data.dataArray, function(key,val) {
        //     alert(key+val);
        // });
        //         }

        //     },
        //     error: function (data) {

        //     }
        // });
        //       return false;
        //   });



    });

    $(document).ready(function(){

//DropDown input - select
      $('.t-dropdown-input').on('click', function() {
        $(this).parent().next().slideDown('fast');
      });

      $('.t-select-btn').on('click', function() {
       $('.t-dropdown-list').slideUp('fast');

       if(!$(this).prev().attr('disabled')){
        $(this).prev().trigger('click');
      }
    });

      $('.t-dropdown-input').width($('.t-dropdown-select').width() - $('.t-select-btn').width() - 13);

      $('.t-dropdown-list').width($('.t-dropdown-select').width());

      $('.t-dropdown-input').val('');

      $('li.t-dropdown-item').on('click', function() {
        var text = $(this).html();
        $(this).parent().prev().find('.t-dropdown-input').val(text);
        $('.t-dropdown-list').slideUp('fast');
      });

      $(document).on('click', function(event) {
        if ($(event.target).closest(".t-dropdown-input, .t-select-btn").length)
          return;
        $('.t-dropdown-list').slideUp('fast');
        event.stopPropagation();
      });
// END //

    });

  </script>

  @stop

