<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Upvote;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $teams_count = '';
        $booking_count = '';
        $booking = '';

        if(Auth::user()->role == 0){
          $booking_count = Booking::count();
         $teams_count = User::count();
  }

      if(Auth::user()->role == 1){
          $booking_count = Booking::where('user_id',Auth::user()->id)->count();
         $teams_count = User::where('director_id',Auth::user()->id)->count();
  }


    if(Auth::user()->role == 2){
         $booking_count = Booking::where('user_id',Auth::user()->id)->count();
         $teams_count = array();
  }

     $booking = Booking::where('user_id',Auth::user()->id)->limit(5)->orderBy('id','DESC')->get();

       return view('backend.index',compact('teams_count','booking_count','booking'));
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
