<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;
use Mail;
use App\Models\User;
use App\Models\Company;
use App\Models\UserCompany;
use App\Models\UserProfile;
use App\Models\Page;
use Session;
use URL;
use Cookie;
use Validator;
use App\Models\Setting;
use App\Mail\TeamAddMail;
use App\Mail\NewUsernotify;

use App\Jobs\NewRegistrationJob;
use App\Jobs\SendEmailJob;
use Duffel\Client;

class FrontendController extends Controller
{
 private $partner_id;

 public function __construct()
 {
        //blockio init

 }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("frontend.index");
    }

        public function duffel()
    {
        echo "Duffel Flights API - search and book example\n";


$client = new Client();
$client->setAccessToken('duffel_test_5BHK2jnCRJ73Y76EDjgA7GkcLeKTr-7UJ8IPYtpI10Z');

$departureDate = "2023-02-25";

$offerRequest = $client->offerRequests()->create(
  "economy", 
  array(
    array("type" => "adult")
  ),
  array(
    array(
      "origin" => "LHR",
      "destination" => "STN", 
      "departure_date" => $departureDate
    )
  )
);


// echo "<pre>";
// print_r($offerRequest);
// die;


    }


    public function sendMail()
    {
      $info = array(
        'Token' => "asdfas"
    );

      Mail::send('email.test', $info, function ($message)
      {
        $message->to( "webtest193@gmail.com", 'Test')
        ->subject('test mail');
        $message->from('webtest41@gmail.com', 'Laravel');
    });
      die('Done');


      $details = [

        'title' => 'Final here',

        'body' => 'After there'

    ];


    \Mail::to('webtest41@gmail.com')->queue(new \App\Mail\MyTestMail($details));

    

    dd("Email is Sent.");


// $details['email'] = 'webtest193@gmail.com';

//     dispatch(new NewRegistrationJob($details));

//                dd('done');

        // $info = array(
        //     'Token' => "asdfas"
        // );

        // Mail::send('email.test', $info, function ($message)
        // {
        //     $message->to( "webtest193@gmail.com", 'Test')
        //     ->subject('test mail');
        //     $message->from('dev@gmail.com', 'Alex');
        // });
        // die('Done');

       // Mail::to('webtest193@gmail.com')->send(new TeamAddMail());
       // if (Mail::failures()) {
       //  echo 'Sorry! Please try again latter';
       //  }else{
       //     echo 'Great! Successfully send in your mail';
       //  }   
       //  die('DOne');
}


public function company_registration()
{
    return view('auth.company-register');
}

public function member_register()
{
    return view('auth.user-register');
}


function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

public function doLogin(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('email',$request->email)->first();
 
    if($user){
        if($user->email_verify == 1){

           if($user->is_verify != 2){

              if($user->is_verify == 1){ 

          $credentials = $request->only('email', 'password');

         
          if (Auth::attempt($credentials)) {

            if($user->role == 2){
                

                if($user->user_company_is == 1){
                return redirect('admin')->withSuccess('Signed in');
            }else{

                return redirect('admin/travel-information')->withSuccess('Signed in');
            }

            }else{

               return redirect('admin')->withSuccess('Signed in');  

            }

            
            
        }else{
           return redirect()->back()->with('error', 'Login details are not valid.');
       }

   }else{
      return redirect()->back()->with('error', 'Your account in progress. Please wait for admin approvel.');

   }

}else{

    return redirect()->back()->with('error', 'Your account is deactivated.');

}

   }else{

    return redirect()->back()->with('error', 'Your email is not verify. Please verify your email.');
}

}else{
    return redirect()->back()->with('error', 'Email address not found.');
}
}



function doRegister(Request $request)
{

    $validator = Validator::make($request->all(), [
        'name' => 'required',
            'email' => 'required',

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            // return response()->json($validator->errors(),422);  
            return redirect('register')->withErrors($validation->errors());
            // validation failed return back to form

        } else {
            //validations are passed, save new user in database
            $User = new User;
            $User->name = $request->name;
            $User->email = $request->email;
            $User->phone = $request->phone;
            $User->role = 1;
            $User->password = bcrypt($request->password);
            $User->save();

            $imageFiles = $request->file('image');

            if($imageFiles){
                $name=time().'-'.$imageFiles->getClientOriginalName();
                $imageFiles->move(public_path().'/backend/images/',$name);   

                $companyLogo=$name;
            }else{
                $companyLogo="";
            }     

            $setting = new Company;
            $setting->code = $this->generateRandomString();
            $setting->user_id = $User->id;
            $setting->company_name = $request->company_name;
            $setting->image = $companyLogo;
            $setting->save();
            // Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            // return response()->json(["status"=>true,"msg"=>"You have successfully registered, Login to access your dashboard","redirect_location"=>url("admin")]);  

            $Token = sha1(time());

            $user = User::find($User->id);
            $user->verify_token = $Token;
            $user->key_code = $setting->code;
            $user->save();
            $url =    URL::to('/user-verify?token=');
             $mainurl =    URL::to('/');
            $info = array(
                'name' => $request->name,
                'email' =>$request->email,
                'token' => $Token,
                'url' => $url,
                'mainurl' => $mainurl       
            );
            $from = "no-reply@gmail.com";
            $to = $request->email;


            Mail::send('email.registration', $info, function ($message) use($to, $from) {
              $message->to($to, 'Platinummilescorporate')
              ->subject('Platinummilescorporate Registration complete');
              $message->from("webtest41@gmail.com", 'Platinummilescorporate');
          });

            $adminEmail = User::where('role',0)->first();
            Mail::to('webtest41@gmail.com')->send(new NewUsernotify($info));

            return response()->json(array("status"=>true,"msg"=>"You have successfully registered, You will get verify email shortly."));
            

        }
    }
/**page **/


public function get_page($slug)
{
   
 $getPage = Page::where('slug',$slug)->first();

 
 return view("frontend.pages.page",compact('getPage'));
}




public function apiresponse()
{
  
 $jayParsedAry = [
   "data" => [
         "slices" => [
            [
               "origin" => "NYC", 
               "destination" => "ATL", 
               "departure_date" => "2023-03-24" 
            ] 
         ], 
         "passengers" => [
                  [
                     "type" => "adult" 
                  ], 
                  [
                        "age" => 29 
                     ] 
               ], 
         //"cabin_class" => "business" ,

           "operating_carrier" => [
            [
                 "id" => "arl_00009VME7DAGiJjwomhv2w"

            ]
            

           ]

      ] 
]; 
 
$datajosn= json_encode($jayParsedAry);

 
 // Generated @ codebeautify.org
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.duffel.com/air/offer_requests');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datajosn);
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
$dataArrayData = json_decode($result);
$dataArray = json_decode(json_encode($dataArrayData), true);


if(isset($dataArray['data']['offers'])){
  foreach ($dataArray['data']['offers'] as $value) {

    echo "<pre>";
print_r($value);

}
}



}

    /**verify user **/


    public function verify_user(){

       if(isset($_GET['token'])){

        $token = User::where('verify_token',$_GET['token'])->where('email_verify',0)->first();
        if($token ){
            $verifySucess = User::where('id', $token['id'])->update(['email_verify'=> 1]);
            return redirect('/login?verify=true');
        }

        
    }
    return redirect('/login');
}


/** member register **/
function request_member_register(Request $request)
{


    $validator = Validator::make($request->all(), [
        'firstname' => 'required',
            'email' => 'required'   // required and email format validation
            // 'password' => 'required|min:8',

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return response()->json($validator->errors(),422);  
            // validation failed return back to form

        } else {
            //validations are passed, save new user in database

           $Company = Company::where('code', $request->key_code)->first();
          
          
           if(isset($Company->id)){
            
            $User = User::where('email',$request->email)->first();
            $User->director_id = $Company['user_id'];
            $User->name = $request->firstname;
            $User->role = 2;
            $User->status = 0;
            $User->password = bcrypt($request->password);
            $User->key_code = $request->key_code;
            $User->save();
            
            

            $setting = new UserCompany;
            $setting->user_id = $User->id;
            $setting->company_id = $Company['id'];
            $setting->save();

            $userProfile = new UserProfile;
            $userProfile->user_id = $User->id;
            $userProfile->title = $request->title;
            $userProfile->firstname = $request->firstname;
            $userProfile->lastname = $request->lastname;
            $userProfile->middlename = $request->middlename;
            $userProfile->home_airport = $request->home_airport;
            $userProfile->dob = $request->dob;
            $userProfile->gender = $request->gender;
            $userProfile->company = $request->company;
            $userProfile->department = $request->department;
            $userProfile->work_phone = $request->work_phone;
            $userProfile->ext = $request->ext;
            $userProfile->cell_phone = $request->cell_phone;
            $userProfile->work_fax = $request->work_fax;
            $userProfile->home_phone = $request->home_phone;
            $userProfile->second_phone = $request->second_phone;
            $userProfile->passport_firstname = $request->passport_firstname;
            $userProfile->passport_lastname = $request->passport_lastname;
            $userProfile->passport_MI = $request->passport_MI;
            $userProfile->passport_no = $request->passport_no;
            $userProfile->passport_country_issued = $request->passport_country_issued;
            $userProfile->passport_issue_date = $request->passport_issue_date;
            $userProfile->passport_exp_date = $request->passport_exp_date;
            $userProfile->redress_no = $request->redress_no;
            $userProfile->known_traveler_no = $request->known_traveler_no;
            $userProfile->seat_location = $request->seat_location;
            $userProfile->special_meal = $request->special_meal;
            $userProfile->preferred_airport = $request->preferred_airport;
            $userProfile->special_air_request = $request->special_air_request;
            $userProfile->room_type = $request->room_type;
            $userProfile->bed_type = $request->bed_type;
            $userProfile->special_hotel_request = $request->special_hotel_request;
            $userProfile->car_size = $request->car_size;
            $userProfile->special_car_request = $request->special_car_request;
            $userProfile->airline_name = json_encode($request->airline_name);
            $userProfile->airline_membership = json_encode($request->airline_membership);
            $userProfile->airline_password = json_encode($request->airline_password);
            $userProfile->airline_membership_type = json_encode($request->airline_membership_type);

            $userProfile->hotel_name = json_encode($request->hotel_name);
            $userProfile->hotel_membership = json_encode($request->hotel_membership);
            $userProfile->hotel_password = json_encode($request->hotel_password);
            $userProfile->hotel_membership_type = json_encode($request->hotel_membership_type);

            $userProfile->car_name = json_encode($request->car_name);
            $userProfile->car_password = json_encode($request->car_password);
            $userProfile->car_membership = json_encode($request->car_membership);
            $userProfile->car_membership_type = json_encode($request->car_membership_type);

            $userProfile->when_we_call = $request->when_we_call;
            $userProfile->when_email_you = $request->when_email_you;
            $userProfile->preferred_method = $request->preferred_method;
            $userProfile->notes = $request->notes;           
            $userProfile->save();

            /** email send ***/
            $Token = sha1(time());

            $user = User::find($User->id);
            $user->user_company_is  = 1;
            if(isset($request->admin_created)){

                $user->email_verify     = 1;
                $user->is_verify        = 1;
                $user->user_company_is  = 1;
                $user->save();
                  return response()->json(array("status"=>true,"msg"=>"Your Information successfully Updated."));
      }else{
            $user->verify_token = $Token;
            $user->save();
            $url =    URL::to('/user-verify?token=');

          //   $info = array(
          //       'name' => $request->name,
          //       'email' =>$request->email,
          //       'token' => $Token,
          //       'url' => $url        
          //   );
            
          //   $from = "webtest41@gmail.com";
          //   $to = $request->email;
          //   Mail::send('email.registration', $info, function ($message) use($to, $from) {
          //     $message->to($to, 'Platinummilescorporate')
          //     ->subject('Platinummilescorporate Registration Mail');
          //     $message->from($from, 'Platinummilescorporate');
          // });

          //   $adminEmail = User::where('role',0)->first();
          //   Mail::to('webtest41@gmail.com')->send(new NewUsernotify($info));


            
            return response()->json(array("status"=>true,"msg"=>"You have successfully registered, You will get verify mail shortly."));
          }

        }else{

            return response()->json(["status"=>false,"msg"=>"No company found."]);  

        }

    }
}


}
