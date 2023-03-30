<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Page;
use App\Models\Company;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Str;


class PageController extends Controller
{

  public function index()
  {

      $pages = Page::all();
      
      return view('backend.pages.index',compact('pages'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
      return view('backend.pages.create');
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
         'title' => 'required',
        
       ]);
      if( $validation->fails() ) {
       return redirect('admin/page/create')->withErrors($validation->errors());
     }
     else
     {
          $Page = new page;
            $Page->title = $request->title;
            $Page->meta_title = $request->meta_title;
            $Page->meta_keyword = $request->meta_keyword;
            $Page->meta_description = $request->meta_description;
            $Page->content = $request->content;
            $Page->slug = Str::slug($request->title, '-');
            $Page->save();
            
            Session::flash('success','Insert record successfully.');
       return redirect('admin/page');
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

        $getPage = Page::where('id',$id)
        ->first();
        
        return view('backend.pages.show',compact('getPage'));

   }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

      $page = Page::findOrFail($id);

      return view('backend.pages.edit',compact('page'));

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

     $Page = Page::findOrFail($id);

   
     $validation = Validator::make($request->all(),

       [

         'title' => 'required'

       ]);



     if( $validation->fails() ) {

       return redirect('/admin/page/'.$id.'/edit')->withErrors($validation->errors());

     }

     else

     {

      $Page->title = $request->title;
      $Page->meta_title = $request->meta_title;
      $Page->meta_keyword = $request->meta_keyword;
      $Page->meta_description = $request->meta_description;
      $Page->content = $request->content;
      $Page->updated_at=Carbon::now();
      $Page->save();



       Session::flash('success','Update record successfully.');

       return redirect('admin/page');

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
      

      $teams = page::findOrFail($id);

      $teams->delete();

      Session::flash('success','Successfully deleted.');

      return redirect('admin/page');

    }

       public function booking_page_remove($id)
    {
      
      $page = page::findOrFail($id);

      $page->delete();

      DB::table('pages')->where('id',$id)->delete();

      Session::flash('success','Successfully deleted.');

      return redirect('admin/page');

    } 



  }

