<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Auth;
use Mail;
use URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class TeamController extends Controller
{

  public function index()
  {

    $teams = User::where('director_id','=',Auth::user()->id)->where('role','=',2)->orderBy('id', 'DESC')->get();
    return view('backend.teams.index',compact('teams'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
      return view('backend.teams.create');
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
       return redirect('admin/teams/create')->withErrors($validation->errors());
     }
     else
     {

       $company = Company::where('user_id',Auth::user()->id)->first();  

       if(isset($company)){
        $code =$company['code'];
       }else{
              $code ='no';

       }



    $User = new User;
            $User->name = $request->name;
            $User->director_id = Auth::user()->id;
            $User->email = $request->email;
            $User->phone = $request->phone;
            $User->budget = 100;
             $User->order_limt = $request->order_limt;
            $User->is_verify = 1;
            $User->email_verify = 1;
            $User->key_code = $code;
            $User->role = 2;
            $User->password = bcrypt('abc@123');
            $User->save();

       $company = Company::where('user_id',Auth::user()->id)->first();  
       if(isset($company)){
        DB::table('user_company')->insert(array('user_id' => $User->id,'company_id' => $company->id ));
       }
       
        $url =    URL::to('');
        $info = array(
                'name' => $request->name,
                'email' =>$request->email,
                'company_code' =>  $code,
                'url' => $url        
            );
      
                $from = "no-reply@gmail.com";
                $to = $request->email;


            Mail::send('email.invitation', $info, function ($message) use($to, $from) {
              $message->to($to, 'Platinummilescorporate')
              ->subject('Platinummilescorporate Invitation');
              $message->from("webtest41@gmail.com", 'Platinummilescorporate');
          });



       Session::flash('success','Insert record successfully.');
       return redirect('admin/teams');
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


                $getUserInfo = User::join('user_company','users.id','=','user_company.user_id')
                ->join('company','user_company.company_id','=','company.id')
                ->join('user_profile','user_profile.user_id','=','user_profile.user_id')  
        ->where('users.id',$id)
        ->select('users.id as userId','users.name','users.email','users.phone','users.role','users.status','company.*','user_profile.*')
        ->first();
        //   echo "<pre>";
        // print_r($getUserInfo);
        // die;
        
    // $getUserInfo = User::where('director_id',Auth::user()->id)->where('id',$id)->first();
    
     return view('backend.teams.show',compact('getUserInfo'));

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

      return view('backend.teams.edit',compact('teams'));

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

       return redirect('/admin/teams/'.$id.'/edit')->withErrors($validation->errors());

     }

     else

     {

       $teams->name =$request->name;

       $teams->email=$request->email;
       
       $teams->phone=$request->phone;

        $teams->account_type=$request->account_type;

       $teams->budget=$request->budget;

       $teams->order_limt=$request->order_limt;

      $teams->status=$request->status;

       $teams->updated_at=Carbon::now();

       $teams->save();



       Session::flash('success','Update record successfully.');


       return redirect('admin/teams');

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
        $to = $teams->email;
        Mail::send('email.approve', $info, function ($message) use($to, $from) {
              $message->to($to, 'Platinummilescorporate')
              ->subject('Platinummilescorporate verfy approval');
              $message->from("webtest41@gmail.com", 'Platinummilescorporate');
          });

      Session::flash('success','Successfully approve.');

      return redirect('admin/teams');

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
      return redirect('admin/teams');

    }

    public function destroy($id)

    {

      $teams = User::findOrFail($id);

      $teams->delete();

      Session::flash('success','Successfully deleted.');

      return redirect('admin/teams');

    }

       public function delete_user($id)
    {
      $user = User::findOrFail($id);
      $user->delete();

      DB::table('user_company')->where('user_id',$id)->delete();

      Session::flash('success','Successfully deleted.');

      return redirect('admin/teams');   

    }

    

    public function team_export(Request $request)
{

   $fileName = 'teams-data.csv';
   $tasks =   User::where('director_id','=',Auth::user()->id)->where('role','=',2)->orderBy('id', 'DESC')->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('ID', 'Name', 'Email', 'Company-Code', 'Created Date');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['ID']  = $task->id;
                $row['Name']    = $task->name;
                $row['Email']    = $task->email;
                $row['Company-Code']  = $task->key_code;
                $row['Created Date']  =date("Y-m-d", strtotime($task->created_at) );

                fputcsv($file, array($row['ID'], $row['Name'], $row['Email'], $row['Company-Code'], $row['Created Date']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }



  }

