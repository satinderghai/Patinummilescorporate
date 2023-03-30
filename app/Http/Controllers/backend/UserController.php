<?php

namespace App\Http\Controllers\backend;

use Request;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Session;
use Mail;
use URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

/**
 * Display a listing of the resource.
 *
 *@return \Illuminate\Http\Response
 */

    public function index(){

      $user = User::where('role','!=', 0)->where('role','!=', 2)->where('role','!=', 3)->orderBy('id', 'DESC')->get();
      return view('backend.users.index',compact('user'));

    }


  public function regular_user() {

      $user = User::where('account_type','=','regular')->get();
      return view('backend.users.index',compact('user'));

    }

  public function creator_user(){

      $user = User::where('account_type','=','creator')->get();
      return view('backend.users.index',compact('user'));

    }

    /**
    * Show the form for creating a new resource.
    *
    *@return \Illuminate\Http\Response
    */



    public function create(){

      return view('backend.users.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    *@param  \Illuminate\Http\Request  $request
    *@return \Illuminate\Http\Response
    */



    public function store(Request $request) {
      $input = Request::all();
      $validation = Validator::make($input,

      [
        'name' => 'required',
        'email' => 'required',
      ]);
    if( $validation->fails() ) {
      return redirect('admin/users/create')->withErrors($validation->errors());
      }else{

   // $imageFiles = Input::file('image');
  // if(isset($imageFiles))
 // {
//   $name=str_random(6).'_'.$imageFiles->getClientOriginalName();
//   $imageFiles->move(public_path().'/backend/images/blog/',$name);  
 //   $imagedata = $name;  
// }
            $dataArray = array(
               "name"     =>   $input['name'],
               "email"   =>      $input['email'],
               "role"   =>     'customer',
              'password' => Hash::make('12345678'),
               // "image"   =>      $imagedata
           );
          User::create($dataArray);
          Session::flash('success','Insert record successfully.');
          return redirect('admin/users');
    }



   }

   /**
     * * Display the specified resource.
     * 
     *@param  int  $id
     *@return \Illuminate\Http\Response
     */



    public function show($id){

     $users = User::findOrFail($id);
       return view('backend.users.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     *@param  int  $id
     *@return \Illuminate\Http\Response
     */



    public function edit($id)   {
        $users = User::findOrFail($id);
        return view('backend.users.edit',compact('users'));
    }

   /**
     * Update the specified resource in storage.
     *
     *@param  \Illuminate\Http\Request  $request
     *@param  int  $id
     *@return \Illuminate\Http\Response
     */



    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $input = Request::all();
        $validation = Validator::make($input,
       [
        'name' => 'required',
        'email' => 'required',
       ]);
    if( $validation->fails() ) {
      return redirect('/admin/users/'.$id.'/edit')->withErrors($validation->errors());
    }else{

        $user->name =$input['name'];
        $user->email=$input['email'];
        $user->is_verify=$input['is_verify'];
        $user->status=$input['is_verify'];
        $user->updated_at=Carbon::now();
        $user->save();

    Session::flash('success','Update record successfully.');
      return redirect('admin/users');



     }



   }

   

   public function approve_user($id){
      $user = User::findOrFail($id);
      $user->is_verify=1;
      $user->save();
      // $url =    URL::to('');
      // $info = array(
      //           'name' => $user->name,
      //           'email' => $user->email,
      //           'company_code' => $user->key_code,
      //           'url' => $url
      // );
      // $from = "no-reply@gmail.com";
      // $to = $user->email;
      // Mail::send('email.approve', $info, function ($message) use($to, $from) {
      //         $message->to($to, 'Platinummilescorporate')
      //         ->subject('Platinummilescorporate verfy approval');
      //         $message->from("webtest41@gmail.com", 'Platinummilescorporate');
      //     });
      Session::flash('success','Successfully approve.');
      return redirect('admin/users');
   }



    public function reject_user($id){
      $user = User::findOrFail($id);
      $user->is_verify=2;
      $user->save();
      // $url =    URL::to('');
      // $info = array(
      //           'name' => $user->name,
      //           'email' => $user->email,
      //           'company_code' => $user->key_code,
      //           'url' => $url
                    
      //       );
      // $from = "no-reply@gmail.com";
      // $to = $user->email;
      // Mail::send('email.reject', $info, function ($message) use($to, $from) {
      //         $message->to($to, 'Platinummilescorporate')
      //         ->subject('Platinummilescorporate verfy approval');
      //         $message->from("webtest41@gmail.com", 'Platinummilescorporate');
      //     });
      Session::flash('success','Successfully reject.');
      return redirect('admin/users');
   }



public function delete_user($id){
       $user = User::findOrFail($id);
       $user->delete();
       Session::flash('success','Successfully deleted.');
      return redirect('admin/users');
   }

/**
  * Remove the specified resource from storage.
  *
  *@param  int  $id
  *@return \Illuminate\Http\Response
  */

  public function destroy($id){

     $user = User::findOrFail($id);
     $user->delete();
     Session::flash('success','Successfully deleted.');
     return redirect('admin/users');
   }

   //export


   public function exportCSV(Request $request)
{

   $fileName = 'Users-data.csv';
   $tasks = User::all();

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
                $row['Created Date']  = date("Y-m-d", strtotime($task->created_at) );

                fputcsv($file, array($row['ID'], $row['Name'], $row['Email'], $row['Company-Code'], $row['Created Date']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }





}



