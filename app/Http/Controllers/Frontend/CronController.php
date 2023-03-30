<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;
use Redirect;
use Mail;
use App\Models\Station;
use App\Models\Setting;
use App\Models\Subscribe;
use App\Models\Cities;
use App\Models\Page;
use App\Models\Routes;
use App\Models\MarketingCarrier;
use App\Models\ConnectedStation;
use Session;
use URL;
use Cookie;
use Validator;

class CronController extends Controller
{
 private $partner_id;
 private $api_key;
 private $api_url;

 public function __construct()
 {
        //blockio init
        ini_set('memory_limit', -1);
     $this->partner_id = 571689;  
    //  $this->api_key = "XA8y7bThowkCXaieeqMM6PHXBF75bWEQvPOR18CF";  
    //  $this->api_url = "https://api.demo.distribusion.com";  
    
    $this->api_key = "32W8JjIlrnQcjUAGtJuhABvhYqD5O9qcJ1Ds2IZO";  
    $this->api_url = "https://api.distribusion.com"; 

 }

 public function distibution_request($url){

   $curl = curl_init();
   curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HEADER => false,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_SSL_VERIFYPEER =>false,
      CURLOPT_SSL_VERIFYHOST=> false,
      CURLOPT_HTTPHEADER => array(
        'content-type: application/json',
        'cache-control: no-cache',
        'Api-Key: '.$this->api_key
    ),
  ));

   $carrierResponse = curl_exec($curl);
   curl_close($curl);

   return $marketingResponse = json_decode(json_encode(json_decode($carrierResponse)), true);
}


// Get All Station

public function get_stations(Request $request)
{

    $url = $this->api_url.'/retailers/v4/stations?locale=en';
    $stationResponse = $this->distibution_request($url);
 

      foreach ($stationResponse['data'] as $key => $value) {

        $stationExits = Station::select("code", "name")->where('code',$value['attributes']['code'])->first();
        if(empty($stationExits)){    
         $dataArray = array(
            'station_type' => $value['attributes']['station_type'],
            'code' => $value['attributes']['code'],
            'city_code' => $value['relationships']['city']['data']['id'],
            'name' => $value['attributes']['name'],
            'description' => $value['attributes']['description'],
            'street_and_number' => $value['attributes']['street_and_number'],
            'zip_code' =>$value['attributes']['zip_code'],
            'longitude' => $value['attributes']['longitude'],
            'latitude' => $value['attributes']['latitude'], 
            'time_zone' => $value['attributes']['time_zone'],
            'status' => 2
        );

         Station::create($dataArray);
     }
 }

echo "Done";
}


// Get All Cities

public function citiesCountry()
{
    die('kguy');

$allcity =  Cities::all();
foreach ($allcity as $key => $value) {
    
        $student = Cities::find($value->id);
        $student->countryCode = substr($value->code, 0, 2);
        $student->update();
}

  echo "Done";
}



// Get All Cities

public function cities(Request $request)
{
    $url = $this->api_url.'/retailers/v4/stations?locale=en';
    $cityResponse = $this->distibution_request($url);

      foreach ($cityResponse['included'] as $key => $value) {

    $cityExits = Cities::select("code", "name")->where('code',$value['id'])->first();

    if(empty($cityExits)){    

          $dataArray = array(
            'route_id' => $value['id'], 
            'type' => $value['type'], 
            'code' => $value['attributes']['code'], 
            'name' => $value['attributes']['name'],
            'countryCode' =>substr($value['attributes']['code'], 0, 2),
            'status' => 2
        );
          Cities::create($dataArray);
      }
  }
  echo "Done";
}





// Get All Connected Station

public function connected_stations(Request $request)
{
    
    $getPageNo = Setting::where('name','last_updateID_connected_station')->first(); 
    
    if(!empty($getPageNo)){
        
        $page = '?page[after]='.$getPageNo->value;
    }else{
        $page = '';
    }
    

    $url = $this->api_url.'/retailers/v4/connected_stations'.$page;
    $connectedStationResponse = $this->distibution_request($url);

    if($connectedStationResponse){

        foreach ($connectedStationResponse['data'] as $key => $value) {
          $connectedRouteExits = ConnectedStation::where('route_id',$value['id'])->first();

          if(empty($connectedRouteExits)){

             $dataArray = array(
               'route_id'=>$value['id'],
               'type'=> $value['type'],
               'departure_station'=> $value['relationships']['departure_station']['data']['id'],
               'arrival_station'=> $value['relationships']['arrival_station']['data']['id'],
               'status' => 2
           );
             ConnectedStation::create($dataArray);

         }
         if(isset($connectedRouteExits->id)){
          Setting::where('name','last_updateID_connected_station')->update(['page_id' => $connectedRouteExits->id,'value' => $connectedRouteExits->route_id]); 
         }
        
     }

     echo "Done";
 }
}



// Get All Marketing Carrier
public function get_marketing_carriers(Request $request)
{
    $url = $this->api_url.'/retailers/v4/marketing_carriers';
    // Get All Marketing Carrier
    $data = $this->distibution_request($url);

    foreach ($data['data'] as $key => $value) {

    // Marketing Carrier on ID based
        $marketing_details = $this->api_url.'/retailers/v4/marketing_carriers/'.$value['attributes']['code'].'?locale=en&currency=GBP';
        $marketing_response = $this->distibution_request($marketing_details);

        $marketingRouteExits = MarketingCarrier::where('code',$marketing_response['data']['attributes']['code'])->first();

        if(empty($marketingRouteExits)){

         $dataArray = array(
             'code'=>$marketing_response['data']['attributes']['code'],
             'name'=>$marketing_response['data']['attributes']['legal_name'],
             'fee'=>$marketing_response['data']['attributes']['booking_fee'],
             'base_64_logo'=>$marketing_response['data']['attributes']['white_label_logo'],
             'status' => 2
         );
         MarketingCarrier::create($dataArray);
     }


 }
 echo "Done";

}



// Get All Marketing Carrier
public function get_marketing_logo(Request $request)
{
    $marketingCarrier = MarketingCarrier::where('code','ALBU')->get();

    foreach ($marketingCarrier as $key => $value) {
        $image = $value->base_64_logo;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = $value->code.'_'.time().'.'.'png';
        \File::put(public_path(). '/frontend/v1/images/marketing_carrier/test/' . $imageName, base64_decode($image));

        MarketingCarrier::updateOrInsert(
            ['code' => $value->code],
            ['logo'=>$imageName]
        );

    }

    echo "Done";

}





public function getRoutePage()
{
       $getPageNo = Setting::where('name','admin_pages_sync')->first(); 
    
    if(!empty($getPageNo)){
        
        $page = $getPageNo->page_id;
    }else{
        $page = 1;
    }

   $stationsGet = ConnectedStation::select('id','route_id','type','departure_station', DB::raw("GROUP_CONCAT(arrival_station SEPARATOR ',') as `arrival`"))
   ->orderBy('departure_station')
   ->groupBy('departure_station')
   ->skip($page)
   ->limit(300)
   ->get();

   if($stationsGet){
     foreach ($stationsGet as $key => $route) {

        if(isset($route->arrival))

           $getCityDataDepart = Station::leftJoin('cities', 'cities.code', '=', 'stations.city_code')
       ->where('stations.code',$route->departure_station)
       ->select('cities.name','stations.code')
       ->first();

       if(isset($getCityDataDepart->code)){

           foreach (explode(',', $route->arrival) as $key => $stationCode) {   

              $getCityArrival = Station::leftJoin('cities', 'cities.code', '=', 'stations.city_code')
              ->where('stations.code',$stationCode)
              ->select('cities.name','stations.code')
              ->first();

              if(isset($getCityArrival->code)){

                 $pageExits = Routes::where('route_id',$getCityDataDepart->code.'-'.$getCityArrival->code)->count();

                 if($pageExits == 0) {
               
                  $dataArray = array(
                      "route_id"  => $getCityDataDepart->code.'-'.$getCityArrival->code,
                      "title"  => $getCityDataDepart->name.' to '.$getCityArrival->name,
                      "slug" => str_replace(' ', '-', $getCityDataDepart->name.'-to-'.$getCityArrival->name.'-Bus-Tickets'),
                      "content"  => $getCityDataDepart->name,
                      "meta_title" =>  $getCityDataDepart->name.' to '.$getCityArrival->name.' cheap bus tickets by BusJourney.com. Save more on your bus and coach tickets.',
                      "meta_keywords"  => 'bus '.$getCityDataDepart->name.' to '.$getCityArrival->name.', '.$getCityDataDepart->name.', '.$getCityArrival->name.'bus times to '.$getCityDataDepart->name,
                      "meta_description"  => 'BusJourney.com provides access to cheap bus tickets from '.$getCityDataDepart->name.' to '.$getCityArrival->name,
                      "status" => 2
                  );


                  Routes::create($dataArray);
                  
                  if(isset($route->id)){
          Setting::where('name','admin_pages_sync')->update(['page_id' => $route->id]); 
         }

              }

          }
      }
  }
}
}
echo "Done";
}


}
