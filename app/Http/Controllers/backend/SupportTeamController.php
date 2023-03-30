<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Chat;
use Auth;
use Mail;
use URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class SupportTeamController extends Controller
{

  public function index()
  {

    $teams = User::where('director_id','=',Auth::user()->id)->where('role','=',3)->orderBy('id', 'DESC')->get();
    return view('backend.supportteam.index',compact('teams'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
      return view('backend.supportteam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    { 
     
      $validation = Validator::make($request->all(),
       [
         'name' => 'required',
         'email' => 'required|email|unique:users',
       ]);
      if( $validation->fails() ) {
       return redirect('admin/supportteams/create')->withErrors($validation->errors());
     }
     else
     {

      

      
            $User = new User;
            $User->name = $request->name;
            $User->director_id = Auth::user()->id;
            $User->email = $request->email;
            $User->phone = $request->phone;
            $User->role = 3;
            $User->is_verify = $request->is_verify;
            $User->password = bcrypt('abc@123');
            $User->save();

           

       
       
       
       // $url =    URL::to('');

       // $info = array(
       //          'name' => $request->name,
       //          'email' =>$request->email,
       //          'company_code' =>  $code,
       //          'url' => $url        
       //      );
      
       //          $from = "no-reply@gmail.com";
       //          $to = $request->email;


       //      Mail::send('email.invitation', $info, function ($message) use($to, $from) {
       //        $message->to($to, 'Platinummilescorporate')
       //        ->subject('Platinummilescorporate Invitation');
       //        $message->from("webtest41@gmail.com", 'Platinummilescorporate');
       //    });



       Session::flash('success','Insert record successfully.');
       return redirect('admin/supportteams');
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
        //         ->join('user_profile','user_profile.user_id','=','user_profile.user_id')  
        // ->where('users.id',$id)
        // ->select('users.id as userId','users.name','users.email','users.phone','users.role','users.status','company.*','user_profile.*')
        // ->first();
        //   echo "<pre>";
        // print_r($getUserInfo);
        // die;
        
     $getUserInfo = User::where('director_id',Auth::user()->id)->where('id',$id)->first();
    
     return view('backend.supportteam.show',compact('getUserInfo'));

   }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {     

    
      $teams = User::findOrFail($id);

      return view('backend.supportteam.edit',compact('teams'));

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
       
     $teams = User::findOrFail($id);
     $validation = Validator::make($request->all(),

       [

         'name' => 'required',

         'email' => 'required',

       ]);



     if( $validation->fails() ) {

       return redirect('/admin/supportteams/'.$id.'/edit')->withErrors($validation->errors());

     }

     else

     {

       $teams->name =$request->name;

       $teams->email=$request->email;
       
       $teams->phone=$request->phone;

       $teams->is_verify=$request->is_verify;

       $teams->updated_at=Carbon::now();

       $teams->save();



       Session::flash('success','Update record successfully.');


       return redirect('admin/supportteams');

     }

   }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    

     public function approve_user_team($id){

        $teams = User::findOrFail($id);
        $teams->is_verify=1;
        $teams->save();
        $url =    URL::to('');
        $info = array(
                'name' => $teams->name,
                'email' => $teams->email,
                'company_code' => $teams->key_code,
                'url' => $url
                    
            );
        $from = "no-reply@gmail.com";
        $to = $user->email;
        Mail::send('email.approve', $info, function ($message) use($to, $from) {
              $message->to($to, 'Platinummilescorporate')
              ->subject('Platinummilescorporate verfy approval');
              $message->from("webtest41@gmail.com", 'Platinummilescorporate');
          });

      Session::flash('success','Successfully approve.');

      return redirect('admin/supportteams');

    }

     public function reject_user_team($id){

      $teams = User::findOrFail($id);
      $teams->is_verify=2;
      $teams->save();
      $url =    URL::to('');
      $info = array(
                'name' => $teams->name,
                'email' => $teams->email,
                'company_code' => $teams->key_code,
                'url' => $url
                    
            );
      $from = "no-reply@gmail.com";
      $to = $teams->email;
      Mail::send('email.reject', $info, function ($message) use($to, $from) {
              $message->to($to, 'Platinummilescorporate')
              ->subject('Platinummilescorporate verfy approval');
              $message->from("webtest41@gmail.com", 'Platinummilescorporate');
          });

      Session::flash('success','Successfully reject.');
      return redirect('admin/supportteams');

    }

    public function destroy($id)

    {

      $teams = User::findOrFail($id);

      $teams->delete();

      Session::flash('success','Successfully deleted.');

      return redirect('admin/supportteams');

    }

       public function delete_user_suport($id)
    {
      $user = User::findOrFail($id);
      $user->delete();

      DB::table('user_company')->where('user_id',$id)->delete();

      Session::flash('success','Successfully deleted.');

      return redirect('admin/supportteams');   

    }


  }

