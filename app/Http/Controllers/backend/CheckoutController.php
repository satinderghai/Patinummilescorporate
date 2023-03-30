<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class CheckoutController extends Controller
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

     public function request_create()
    {
      echo 'hello';
      die;
     // return view('backend.teams.create');
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
    $User = new User;
            $User->name = $request->name;
            $User->director_id = Auth::user()->id;
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
        


        // echo "<pre>";
        // print_r($getUserInfo);
        // die;

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


  }

