<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use Auth;
use Hash;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
      // $setting = Setting::findOrFail(Auth::user()->id);
      $setting = Setting::where('user_id',Auth::user()->id)->first();
      return view('backend.settings.edit',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.domain.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $setting = Setting::where('user_id',Auth::user()->id)->first();
     $input = $request->all();

      $validation = Validator::make($request->all(),
       [
        'company_name' => 'required',
        'firstname' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required',
        'country' => 'required',
      ]);

     if( $validation->fails() ) {
       return redirect('/admin/setting/')->withErrors($validation->errors());
     }
     else
     {
        
      $setting->company_name=$input['company_name'];
      $setting->firstname=$input['firstname'];
      $setting->lastname=$input['lastname'];
      $setting->address1=$input['address1'];
      $setting->address2=$input['address2'];
      $setting->city=$input['city'];
      $setting->state=$input['state'];
      $setting->zip=$input['zip'];
      $setting->country=$input['country'];
      $setting->mc_number=$input['mc_number'];
      $setting->dot_number=$input['dot_number'];
      $setting->email=$input['email'];
      $setting->phone=$input['phone'];
      $setting->fax=$input['fax'];
      $setting->updated_at=Carbon::now();
      $setting->save();

      Session::flash('success','Update settings successfully.');
      return redirect('admin/setting');
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
     $domain = Setting::findOrFail($id);
     $domain->delete();
     Session::flash('success','Successfully deleted.');
     return redirect('admin/domain');
   }
 }
