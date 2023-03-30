<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;
use Redirect;
use Mail;
use App\Models\Station;
use App\Models\Setting;
use App\Models\Subscribe;
use App\Models\PopularRoute;
use App\Models\Page;
use App\Models\Cities;
use App\Models\Routes;
use App\Models\MarketingCarrier;
use App\Models\ConnectedStation;
use Session;
use URL;
use Cookie;
use Validator;

class SitemapController extends Controller
{


// All sitemap listing
  public function index(Request $request)
    {
        if(isset($request->page)){
          
    if (isset($request->page)) {
      $limit = 500; 
      $pn  = $request->page; 
    }else { 
      $pn=1; 
    };  
  
    $start_from = ($pn-1) * $limit;  

       $route = Routes::offset($start_from)->limit($limit)->orderBy('id','asc')->get();
         return response()->view('sitemap.route_listing', [
            'routes' => $route,
        ])->header('Content-Type', 'text/xml');
			
			
			
			
			
        }else{
           
      $dataArray = array(
          '0' => url('/')."/pages/sitemap.xml",
          '1' => url('/')."/routes/sitemap.xml"
      
      );
        return response()->view('sitemap.index', [
            'sitemap' => $dataArray,
        ])->header('Content-Type', 'text/xml');
    }
    }
	
	//sitemap html
	
	 public function sitemap_index(Request $request)
    {
        if(isset($request->page)){
          
    if (isset($request->page)) {
      $limit = 500; 
      $pn  = $request->page; 
    }else { 
      $pn=1; 
    };  
  
    $start_from = ($pn-1) * $limit;  

       $route = Routes::offset($start_from)->limit($limit)->orderBy('id','asc')->get();
         return response()->view('sitemap.route_listing_html', [
            'routes' => $route,
        ])->header('Content-Type', 'text/html');
        }else{
           
      $dataArray = array(
          '0' => url('/')."/routes/sitemap.xml",
          '1' => url('/')."/pages/sitemap.xml"
      
      );
        return response()->view('sitemap.indexhtml', [
            'sitemap' => $dataArray,
        ])->header('Content-Type', 'text/html');
    }
    }
	
	
	
    
  // Pages sitemap listing  
       public function sitemapPages()
    {
        $popularRoute = PopularRoute::all();
        $pages = Page::all();
    
        return response()->view('sitemap.sitemappages', [
            'popularRoute' => $popularRoute, 'pages' => $pages
        ])->header('Content-Type', 'text/xml');
        
    }

  // Routes all sitemap listing      
      public function sitemapPath()
    {
        
       $routesCount = Routes::count();
          $total = ceil($routesCount / 500);
       
        
       for ($i=1; $i < $total ; $i++) { 
        $sitemapCount[] = url('/').'/sitemap'.$i.'.xml.gz';
       }
      
        return response()->view('sitemap.sitemaproutes', [
           'data' => $sitemapCount
        ])->header('Content-Type', 'text/xml');  
    }
	
	  // Pages sitemap listing  
       public function sitemapPagesHtml()
    {
        $popularRoute = PopularRoute::all();
		   

		    
        $pages = Page::all();
    
        return response()->view('sitemap.sitemappageshtml', [
            'popularRoute' => $popularRoute, 'pages' => $pages
        ])->header('Content-Type', 'text/html');
        
    }
	
	
		  // Routes all sitemap listing      
      public function sitemapPathhtml()
    {
        
       $routesCount = Routes::count();
          $total = ceil($routesCount / 500);
       
        
       for ($i=1; $i < $total ; $i++) { 
        $sitemapCount[] = url('/').'/sitemap.html?page='.$i;
       }
      
        return response()->view('sitemap.sitemaprouteshtml', [
           'data' => $sitemapCount
        ])->header('Content-Type', 'text/html');  
    }
    public function getBetween($string, $start = "", $end = ""){
    if (strpos($string, $start)) { // required if $start not exist in $string
        $startCharCount = strpos($string, $start) + strlen($start);
        $firstSubStr = substr($string, $startCharCount, strlen($string));
        $endCharCount = strpos($firstSubStr, $end);
        if ($endCharCount == 0) {
            $endCharCount = strlen($firstSubStr);
        }
        return substr($firstSubStr, 0, $endCharCount);
    } else {
        return '';
    }
}
	
	 public function sitemapGZ(Request $request)
    {      
		 $getPage = $this->getBetween($_SERVER['REQUEST_URI'],"map",".xml");
    if ($getPage) {
      $limit = 500; 
      $pn  = $getPage; 
    }else { 
      $pn=1; 
    };  
  
    $start_from = ($pn-1) * $limit;  

       $route = Routes::offset($start_from)->limit($limit)->orderBy('id','asc')->get();
         return response()->view('sitemap.route_listing', [
            'routes' => $route,
        ])->header('Content-Type', 'text/xml');
					
			
		}
 

}
