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
use App\Models\Routes;
use App\Models\Subscribe;
use App\Models\Cities;
use App\Models\Page;
use App\Models\MarketingCarrier;
use App\Models\ConnectedStation;
use Session;
use URL;
use Cookie;
use Validator;
use App\Models\Plan;


class PlanController extends Controller
{
   private $partner_id;

   public function __construct()
   {
        //blockio init

   }

   public function index()

    {

        $plans = Plan::get(); 

        return view("frontend.index", compact("plans"));

    }  



    /**

     * Write code on Method

     *

     * @return response()

     */

    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent(); 

        return view("subscription", compact("plan", "intent"));

    }

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function subscription(Request $request)

    {

        $plan = Plan::find($request->plan);

  

        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)

                        ->create($request->token);

  

        return view("subscription_success");

    }


}
