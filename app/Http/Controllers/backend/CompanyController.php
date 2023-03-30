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

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role','user')->count();
        return view('backend.index',compact('user'));
    }

    public function company_profile()
    {
        $getUserInfo = User::join('company','users.id','=','company.user_id')
        ->where('users.id',Auth::user()->id)
        ->select('users.id as userId','users.name','users.email','users.phone','users.role','users.status','company.*')
        ->first();

        return view('backend.company.company',compact('getUserInfo'));
    }


    public function update_company_profile_edit(Request $request)
    {

     $input = $request->all();

     $validation = Validator::make($request->all(),
       [
        'company_name' => 'required',
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
    ]);

     if( $validation->fails() ) {
       return redirect('/admin/company-profile/')->withErrors($validation->errors());
   }
   else
   {
    $user = User::find(Auth::user()->id);  
    $user->name=$input['name'];
     $user->phone=$input['phone'];
    $user->updated_at=Carbon::now();
    $user->save();

    $company = Company::where('user_id',Auth::user()->id)->first();  

    $imageFiles = $request->file('image');
    if($imageFiles){

       $name=time().'-'.$imageFiles->getClientOriginalName();
       $imageFiles->move(public_path().'/backend/images/',$name);   
       $company->image=$name;
   }

   $company->company_name=$input['company_name'];
     $company->updated_at=Carbon::now();
   $company->save();

   Session::flash('success','Update company setting successfully.');
   return redirect('admin/company-profile');
}
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
