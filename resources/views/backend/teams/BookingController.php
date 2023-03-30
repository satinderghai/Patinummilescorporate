<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Booking;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class BookingController extends Controller
{

  public function index()
  {
    if(Auth::user()->role == 0){
   $booking = Booking::all();
    }
 if(Auth::user()->role == 1){
  $memberGet = array();
     $getMember =  User::where('director_id',Auth::user()->id)->get();
     if($getMember){
      foreach ($getMember as $key => $value) {
        $memberGet = $value->id;
      }
     }


         $booking = Booking::whereIn('user_id', [$memberGet])->get();


         // $booking = Booking::where('director_id',Auth::user()->id)->get();
    }

     if(Auth::user()->role == 2){
         $booking = Booking::where('user_id',Auth::user()->id)->get();
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

      return view('backend.booking.create',compact('booking'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function getBookingDetails(Request $request)
    {

      if($request->location){
        $search = $request->location;
        $booking =  Booking::where('location', 'like', '%' . $search . '%')
        ->get();



        $html ='<div class="br-title">'.
        $request->location
        .'</div>
        <p>There are some records with your search '.$request->location.'    </p>';
        if(isset($booking)){
          foreach($booking as $value){

           $html .=' <div class="br-tab">
           <div class="brt-left">
           <div class="day-time d-flex">
           <div class="day-time-from">

           <img src="'.url('/').'/public/backend/images/'.$value->image.'" alt="hotel-img" width="200" height="100"> 

           </div>
           <div class="day-time-track">

           </div>
           <div class="day-time-to">
           <h3>'.$value->travel_name.'</h3>

           <p>'.$value->address.'</p>
           </div>
           </div>
           </div>
           <div class="brt-center">


           </div>
           <div class="brt-right">
           <div class="price">'.$value->price.'</div>
           <a href=""  class="btn theme-btn bookAbooking" data-id='.$value->id.'>
           REQUEST NOW   
           </a>
           </div>
           </div>';
         }
       }

       return json_encode(array('status'=>true,'html'=>$html));
     }
   }



    public function addBookingDetails(Request $request)
   {
if($request->id){
    $booking = Booking::where('id',$request->id)->first();

    if($booking){
          $User = new Booking;
    $User->user_id = Auth::user()->id;
    $User->location = $booking->location;
    $User->address = $booking->address;
    $User->checkin = $booking->checkin;
    $User->checkout = $booking->checkout;
    $User->travel_name = $booking->travel_name;
    $User->image = $booking->image;
    $User->single = $booking->single;
    $User->doubles = $booking->doubles;
    $User->flight = $booking->flight;
    $User->status = $booking->status;
    $User->price = $booking->price;
    $User->rental_car = $booking->rental_car;
    $User->save();



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
     $booking = Booking::where('user_id',Auth::user()->id)->where('id',$id)->first();
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

     }

     else

     {

       $booking->name =$input['name'];

       $booking->email=$input['email'];

      // $blog->image=$imagedata;

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
      return redirect('admin/booking');

        
    }


     public function unapprovel_booking($id)

    {

        $booking = Booking::findOrFail($id);
        $booking->status=2;
        $booking->save();
        return redirect('admin/booking');

        
    }


    

    public function destroy($id)

    {

      $booking = User::findOrFail($id);

      $booking->delete();

      Session::flash('success','Successfully deleted.');

      return redirect('admin/users');

    }

    public function delete_user($id)
    {
      $user = User::findOrFail($id);
      $user->delete();

      DB::table('user_company')->where('user_id',$id)->delete();

      Session::flash('success','Successfully deleted.');

      return redirect('admin/booking');

    }


  }

