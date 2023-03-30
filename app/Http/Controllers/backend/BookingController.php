<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Booking;
use App\Models\Setting;
use Auth;
use Mail;
use URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Duffel\Client;

class BookingController extends Controller
{

  public function index()
  {
    if(Auth::user()->role == 0){
       $booking = Booking::orderBy('id', 'desc')->get();
   }
   if(Auth::user()->role == 1){
      $memberGet = array();
      $booking = array();
      $getMember =  User::where('director_id',Auth::user()->id)->first();
     // if($getMember){
     //  foreach ($getMember as $key => $value) {
     //    $memberGet = $value->id;
     //  }
     // }
      if( isset($getMember)){
          $booking = Booking::where('director_id', $getMember['director_id'])->orderBy('id', 'DESC')->get();

      }else{
          $booking = Booking::where('director_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
      }
  }

  if(Auth::user()->role == 2){
     $booking = Booking::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
 }


 return view('backend.booking.index',compact('booking'));
    // return view('backend.booking.index');
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
      $booking = Booking::all();
      
      $user = User::where('role',2)->get();
      return view('backend.booking.create',compact('booking','user'));
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function getBookingDetails(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());

      

        // $user = User::all();
      
        // foreach ($user as $value) {
        //   $val = $value['budget'];
        // }
        // echo $val;



        $offerRequest = array();

        $cabin_class = '';
        if($request->typeseach == 'returnform'){
            $departure_date = $request->departure_date_return_way;
            $return_date = $request->return_date;
        }
        if($request->typeseach == 'one-way'){
            $departure_date =  $request->departure_date_one_way;
        }
        if($request->typeseach == 'multi-city'){
            $departure_date =  $request->departure_date_one_way;
        }

        $client = new Client();
        $client->setAccessToken('duffel_test_uag79cBuKgTh35pwq4oWhns5GCzJBlkxL15RgRLoH8x');
    // $client->setAccessToken('duffel_test_5BHK2jnCRJ73Y76EDjgA7GkcLeKTr-7UJ8IPYtpI10Z');
         
        $departureDate =  date("Y-m-d", strtotime($departure_date) );
        $offerRequest = $client->offerRequests()->create(
            $request->cabin_class, 
            array(
                array("type" => "adult")
            ),
            array(
                array(
                  "origin" => $request->origin,
                  "destination" => $request->destination, 
                  "departure_date" => $departureDate
              )
            )
        );



       //  foreach ($user as $value) {
       //    $val = $value['budget'];
       //  }
       //  echo $val;

        
       
       //  $total_amount = $offerRequest['offers'][0]['total_amount'];

    
       //  echo $total_amount;
       

       // if ($val < $total_amount) {
       //     echo "error";
       // }


       
        // die;
        if(isset($offerRequest['errors'])){
            $errorHTML = '<span class="error-booking">'.$offerRequest['errors'][0]['message'].'</span>';
             return json_encode(array('status'=>true,'html'=>$errorHTML));
        }

        $offers = $client->offers()->all($offerRequest["id"]);

        if(isset($offers)){
          $html = '';
          $cunteryCode = '';
          $arriving_at = '';
          $departing_at = '';
          $cabin_class_name = '';
          foreach ($offers as $value) {

              if(isset($value['slices'][0]['segments'][0]['origin']['iata_country_code'])){
                 $cunteryCode =  $value['slices'][0]['segments'][0]['origin']['iata_country_code'];
             }

             if(isset($value['slices'][0]['segments'][0]['passengers'][0]['cabin_class_marketing_name'])){
                 $cabin_class_name =  $value['slices'][0]['segments'][0]['passengers'][0]['cabin_class_marketing_name'];
             }

             if(isset($value['slices'][0]['segments'][0]['departing_at'])){
                 $departing_at =  $value['slices'][0]['segments'][0]['departing_at'];
             }

             if(isset($value['slices'][0]['segments'][0]['arriving_at'])){
                 $arriving_at =  $value['slices'][0]['segments'][0]['arriving_at'];
             }


             $arrivingDate = Carbon::parse(date("y-m-d H:i:s", strtotime($arriving_at)));
             $departingDate = Carbon::parse(date("y-m-d H:i:s", strtotime($departing_at)));


             $interval = $arrivingDate->diff($departingDate);
             $Hours = $interval->h; 
             if($interval->i != 0){
                 $Hours .= ':'.$interval->i;    
             }
             if($interval->s != 0){
                $Hours .= ':'.$interval->s;   
            }

            $html .='<div class="air_line">
            <div class="container">
            <div class="row">
            <div class="col-sm-6"><span class="eco_1">'.$cabin_class_name.'</span></div>   
            <div class="col-sm-6">
            <span class="get-request-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" color="#fff" aria-label="check" class="jsx-1699385641 ff-icon"><path d="M9.54961 18.0001L3.84961 12.3001L5.27461 10.8751L9.54961 15.1501L18.7246 5.9751L20.1496 7.4001L9.54961 18.0001Z"></path></svg>
            </span>
            </div>
            <div class="col-sm-12"><h4>'.$value['total_currency'].' '.$value['total_amount'].'</h4></div>
            <div class="col-sm-12">
            <div class="merge_boxs">
            <div class="departure-date">
            <div class="date__day"><span class="date_11">'.date("d", strtotime($departure_date)).'</span></div>
            <div class="date__month">'.date("M", strtotime($departure_date)).'</div>
            </div> 

            <div class="departure-date"><img src="'.$value['owner']['logo_symbol_url'].'">
            </div>

            <div class="departure-date">
            <div class="date__day" ><span>'.date("H:i", strtotime($departing_at)).'</span></div>
            <div class="date__month">'.$request->origin.'</div>
            </div>

            <div class="non_stop">
            <div class="non_1"><span>NON-STOP</span></div>
            <div class="jsx-bc8a46273ab3358a flight-details__line" bis_skin_checked="1"></div>
            <div class="non_1">'.$Hours.' H</div>
            </div>

            <div class="departure-date" id="last_time">
            <div class="date__day" ><span>'.date("H:i", strtotime($arriving_at)).'</span></div>
            <div class="date__month">'.$request->destination.'</div>
            </div>


            </div>
            <div class="book-air">
            <a href="'.url('admin/get-flight/'.$value['id'].'').'"  class="btn theme-btn bookAbooking-air" data-id="" target="_blank">
            Select   
            </a>
            </div>
            </div>
            </div>
            </div>
            </div>';


        }
        return json_encode(array('status'=>true,'html'=>$html));
    }
}

// To search input
public function booking_autocomplete_search(Request $request)
{

    if($request->get('search')){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.duffel.com/places/suggestions?query='.$request->get('search'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Accept-Encoding: gzip';
        $headers[] = 'Accept: application/json';
        $headers[] = 'Duffel-Version: v1';
        $headers[] = 'Authorization: Bearer duffel_test_uag79cBuKgTh35pwq4oWhns5GCzJBlkxL15RgRLoH8x';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $dataArray = json_decode($result);

       $suggData = array(); 
        if($dataArray){
          $getSuggestion =  json_decode(json_encode($dataArray), true);  

      if(!empty($getSuggestion['data'])){

          foreach ($getSuggestion['data'] as $key => $row) {
            $data['id']    = $row['iata_code']; 
            $data['value'] = $row['name']; 

            array_push($suggData, $data); 
        } 
    }else{
         $data['id']    = ""; 
            $data['value'] = "No record found."; 
            array_push($suggData, $data); 
    }
    }

    return response()->json($suggData);

}

}

public function get_flight($id)
{

    $client = new Client();
    $client->setAccessToken('duffel_test_uag79cBuKgTh35pwq4oWhns5GCzJBlkxL15RgRLoH8x');
    // $client->setAccessToken('duffel_test_5BHK2jnCRJ73Y76EDjgA7GkcLeKTr-7UJ8IPYtpI10Z');
    $pricedOffer = $client->offers()->show($id, true);
    return view('backend.booking.checkout',compact('pricedOffer'));
}

public function check_out(Request $request)
{


   

   $client = new Client();
   $client->setAccessToken('duffel_test_uag79cBuKgTh35pwq4oWhns5GCzJBlkxL15RgRLoH8x');
    // $client->setAccessToken('duffel_test_5BHK2jnCRJ73Y76EDjgA7GkcLeKTr-7UJ8IPYtpI10Z');
   $pricedOffer = $client->offers()->show($request->off_id, true);


$fullname = $request->first_name . ' ' . $request->last_name;
   $order = $client->orders()->create(array(
      "selected_offers" => array($pricedOffer['id']),
      "type" => "hold",
      "passengers" => array(
        array(
          "id" => $pricedOffer["passengers"][0]["id"],
          "title" => $request->title,
          "gender" => $request->gender,
          "given_name" => $request->first_name,
          "family_name" => $fullname,
          "born_on" =>  date("Y-m-d", strtotime($request->Date_of_birth) ),
          "phone_number" => $request->phone,
          "email" => $request->email,
      )
    )
  ));

   if(isset($order['errors'])){
    $error = $order['errors'][0]['title'];
    return json_encode(array('status'=>false, 'error' => $error));

}else{

     $orderlimt = Auth::user()->order_limt;

     $Stdata = Setting::where('user_id', Auth::user()->id)->first();

   if(!empty($Stdata)){

    $Setting = Setting::findOrFail($Stdata['id']);

    $Setting->order_limt = $Stdata['order_limt']-1;
    $Setting->save();


   }else{
    
    $Setting = new Setting;
    $Setting->user_id  = Auth::user()->id;
    $Setting->director_id = Auth::user()->director_id;
    $Setting->order_id = $order["id"];
    $Setting->order_limt = $orderlimt;
    
    $Setting->save();

   }

    $Booking = new Booking;
    $Booking->user_id  = Auth::user()->id;
    $Booking->director_id = Auth::user()->director_id;
    $Booking->order_id = $order["id"];
    $Booking->off_id = $request->off_id;
    $Booking->pass_id = $request->pass_id;
    $Booking->booking_reference = $order["booking_reference"];
    $Booking->given_name = $fullname;
    $Booking->cabin_class_name = $order["slices"][0]['segments'][0]['passengers'][0]['cabin_class'];
    $Booking->image = $order["owner"]['logo_symbol_url'];
    $Booking->flight_name = $order["owner"]['name'];
    $Booking->flight_code = $order["owner"]['iata_code'];
    $Booking->checkin = $order["slices"][0]['segments'][0]['origin']['iata_code'];
    $Booking->checkout = $order["slices"][0]['segments'][0]['destination']['iata_code'];
    $Booking->departing_at = $order["slices"][0]['segments'][0]['departing_at'];
    $Booking->arriving_at = $order["slices"][0]['segments'][0]['arriving_at'];
    $Booking->status = 0;
    $Booking->price = $order["total_amount"];
    $Booking->total_currency = $order["total_currency"];
    $Booking->save();


    




    /**email send**/

    $user = User::where('id',Auth::user()->id)->first(); 
    $url =    URL::to('');
    $info = array(
        'name' => $user->name,
        'email' => $user->email,
        'company_code' => $user->key_code,
        'url' => $url
    );
    $from = "no-reply@gmail.com";
      //$to = $user->email;
    $to = 'webtest41@gmail.com';
    Mail::send('email.BookingRequest', $info, function ($message) use($to, $from) {
      $message->to($to, 'Platinummilescorporate')
      ->subject('Platinummilescorporate verfy approval');
      $message->from("webtest41@gmail.com", 'Platinummilescorporate');
  });
    /**end ***/
    return json_encode(array('status'=>true, 'msg' => 'Order Created Successfully wait for director approvel'));

}




}


public function addBookingDetails(Request $request)
{
    if($request->id){
        $booking = Booking::where('id',$request->id)->first();

        if(isset($request->user_id)){
          $memberId = $request->user_id;
      }else{
          $memberId = Auth::user()->id;
      }
      if(Auth::user()->role == 1){
          $Did=  Auth::user()->id;
          $status = 1;
      }else{
          $Did=  Auth::user()->director_id;
          $status = 0;
      }

      if($booking){

        $User = new Booking;
        $User->user_id  = $memberId;
        $User->location = $booking->location;
        $User->director_id = $Did;
        $User->address = $booking->address;
        $User->checkin = $booking->checkin;
        $User->checkout = $booking->checkout;
        $User->travel_name = $booking->travel_name;
        $User->image = $booking->image;
        $User->single = $booking->single;
        $User->doubles = $booking->doubles;
        $User->flight = $booking->flight;
        $User->status = $status;
        $User->price = $booking->price;
        $User->rental_car = $booking->rental_car;
        $User->save();

        $user = User::where('id',$memberId)->first(); 
        $url =    URL::to('');
        $info = array(
            'name' => $user->name,
            'email' => $user->email,
            'company_code' => $user->key_code,
            'url' => $url
        );
        $from = "no-reply@gmail.com";
      //$to = $user->email;
        $to = 'webtest41@gmail.com';
        Mail::send('email.BookingRequest', $info, function ($message) use($to, $from) {
          $message->to($to, 'Platinummilescorporate')
          ->subject('Platinummilescorporate verfy approval');
          $message->from("webtest41@gmail.com", 'Platinummilescorporate');
      });

        return json_encode(array('status'=>true));

    }
}
}

public function store(Request $request)
{
    $validation = Validator::make($request->all(),
     [
       'name' => 'required',
       'email' => 'required',
   ]);
    if( $validation->fails() ) {
     return redirect('admin/booking/create')->withErrors($validation->errors());
 }
 else
 {
    $User = new User;
    $User->name = $request->name;
    $User->email = $request->email;
    $User->phone = $request->phone;
    $User->role = 2;
    $User->password = bcrypt($request->password);
    $User->save();
    $company = Company::where('user_id',Auth::user()->id)->first();  
    DB::table('user_company')->insert(array('user_id' => $User->id,'company_id' => $company->id ));
   //      $company = Company::where('user_id',$userData->id)->first();  
   // // $company->company_name=$input['company_name'];
   //   $company->updated_at=Carbon::now();
   // $company->save();



    Session::flash('success','Insert record successfully.');
    return redirect('admin/booking');
}
}



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        // $getUserInfo = User::join('company','users.id','=','company.user_id')
        // ->where('users.id',Auth::user()->id)
        // ->select('users.id as userId','users.name','users.email','users.phone','users.role','users.status','company.*')
        // ->first();


        //         $getUserInfo = User::join('user_company','users.id','=','user_company.user_id')
        //         ->join('company','user_company.company_id','=','company.id')
        // ->where('user_company.id',$id)
        // ->select('users.id as userId','users.name','users.email','users.phone','users.role','users.status','company.*')
        // ->first();


        // echo "<pre>";
        // print_r($getUserInfo);
        // die;
     $booking = Booking::where('id',$id)->first();

     return view('backend.booking.show',compact('booking'));

 }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
        $bookings = User::findOrFail($id);
        return view('backend.booking.edit',compact('users'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        $booking = User::findOrFail($id);
        $input = Request::all();
        $validation = Validator::make($input,
            [
                'name' => 'required',
                'email' => 'required',
            ]);
        if( $validation->fails() ) {
            return redirect('/admin/users/'.$id.'/edit')->withErrors($validation->errors());
        }else{

            $booking->name =$input['name'];
            $booking->email=$input['email'];
            $booking->updated_at=Carbon::now();
            $booking->save();



            Session::flash('success','Update record successfully.');

            return redirect('admin/users');

        }

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function approvel_booking($id)

    {

        $booking = Booking::findOrFail($id);
        $booking->status=1;
        $booking->save();


        $client = new Client();
        $client->setAccessToken('duffel_test_uag79cBuKgTh35pwq4oWhns5GCzJBlkxL15RgRLoH8x');
        $payment = $client->payments()->create($booking->order_id, array(
          "amount" => $booking->price,
          "currency" => $booking->total_currency,
          "type" => "balance",
      ));

        $booking = User::where('id',$booking->user_id)->first();
        $url =    URL::to('');
        $info = array(
            'name' => $booking->name,
            'email' => $booking->email,
            'company_code' => $booking->key_code,
            'url' => $url

        );
        $from = "no-reply@gmail.com";
        $to = $booking->email;
        Mail::send('email.approveBooking', $info, function ($message) use($to, $from) {
          $message->to($to, 'Platinummilescorporate')
          ->subject('Platinummilescorporate verfy approval');
          $message->from("webtest41@gmail.com", 'Platinummilescorporate');
      });
        Session::flash('success','Successfully approve.');
        return redirect('admin/booking');

        
    }


    public function unapprovel_booking($id)

    {

        $booking = Booking::findOrFail($id);
        $booking->status=2;
        $booking->save();
        $client = new Client();
        $client->setAccessToken('duffel_test_uag79cBuKgTh35pwq4oWhns5GCzJBlkxL15RgRLoH8x');
        $orderCancellation = $client->orderCancellations()->create($booking->order_id);
        $client->orderCancellations()->confirm($orderCancellation["id"]);
        
        $booking = User::where('id',$booking->user_id)->first();
        $url =    URL::to('');
        $info = array(
            'name' => $booking->name,
            'email' => $booking->email,
            'company_code' => $booking->key_code,
            'url' => $url

        );

        $from = "no-reply@gmail.com";
        $to = $booking->email;
        Mail::send('email.rejectBooking', $info, function ($message) use($to, $from) {
          $message->to($to, 'Platinummilescorporate')
          ->subject('Platinummilescorporate verfy approval');
          $message->from("webtest41@gmail.com", 'Platinummilescorporate');
      });



        Session::flash('success','Successfully reject.');
        return redirect('admin/booking');

        
    }


    

    public function destroy($id)

    {

      $booking = User::findOrFail($id);

      $booking->delete();

      Session::flash('success','Successfully deleted.');

      return redirect('admin/users');

  }

  public function delete_booking($id)
  {
      $user = Booking::findOrFail($id);
      $user->delete();

      DB::table('user_company')->where('user_id',$id)->delete();

      Session::flash('success','Successfully deleted.');

      return redirect('admin/booking');

  }

  public function showform()
  {

    return view("backend/getdata");
}

public function test()

{
    $booking = Booking::all();
    $user = User::where('role',2)->get();

    return view('backend.booking.test',compact('booking','user'));

}


public function apiresponse(Request $request)
{
    // echo '<pre>';
    // print_r($request->all());


 // Generated @ codebeautify.org
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.duffel.com/air/offer_requests');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"data\": {\n    \"slices\": [\n      {\n      origin':");
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = 'Accept-Encoding: gzip';
    $headers[] = 'Accept: application/json';
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Duffel-Version: v1';
    $headers[] = 'Authorization: Bearer duffel_test_uag79cBuKgTh35pwq4oWhns5GCzJBlkxL15RgRLoH8x';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    $dataArray = json_decode($result);
    echo "<pre>";
    print_r($dataArray);
    die;


}



}

