<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/clear', function() {

 Artisan::call('cache:clear');
 Artisan::call('config:clear');
 Artisan::call('config:cache');
 Artisan::call('view:clear');
 Artisan::call('route:clear');
   // Artisan::call('optimize');
 return "Cleared!";

});


Route::get('mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('webtest193@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});

Route::get('duffel', [App\Http\Controllers\Frontend\FrontendController::class, 'duffel'])->name('duffel');
Route::get('send-email', [App\Http\Controllers\Frontend\FrontendController::class, 'sendMail'])->name('sendMail');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('index');
Route::get('/company-registration', [App\Http\Controllers\Frontend\CompanyController::class, 'company_registration'])->name('company_registration');
Route::get('/user-verify', [App\Http\Controllers\Frontend\FrontendController::class, 'verify_user'])->name('verify_user');
Route::post('/do-login', [App\Http\Controllers\Frontend\FrontendController::class, 'doLogin'])->name('do-login');
Route::post('/company-registration', [App\Http\Controllers\Frontend\FrontendController::class, 'doRegister'])->name('company-registration');
Route::any('/join-now', [App\Http\Controllers\Frontend\FrontendController::class, 'request_member_register'])->name('request_member_register');
Route::get('/join-now', [App\Http\Controllers\Frontend\FrontendController::class, 'member_register'])->name('member_register');

Route::get('page/{pageSlug}', [App\Http\Controllers\Frontend\FrontendController::class, 'get_page'])->name('get_page');

Route::any('/apidata', [App\Http\Controllers\Frontend\FrontendController::class, 'apiresponse'])->name('apiresponse');



Route::group(['middleware' => 'auth','prefix' => 'admin'], function(){

  Route::get('/', [App\Http\Controllers\backend\AdminController::class, 'index'])->name('admin');
  Route::get('/company-profile', [App\Http\Controllers\backend\CompanyController::class, 'company_profile'])->name('company-profile');
  Route::post('/update-company-profile', [App\Http\Controllers\backend\CompanyController::class, 'update_company_profile_edit'])->name('update-company-profile');
  Route::resource('home', App\Http\Controllers\backend\HomeController::class);
  Route::resource('booking', App\Http\Controllers\backend\BookingController::class);

   Route::get('/approvel-booking/{id}', [App\Http\Controllers\backend\BookingController::class, 'approvel_booking'])->name('approvel_booking');  

    Route::get('/unapprove-booking/{id}', [App\Http\Controllers\backend\BookingController::class, 'unapprovel_booking'])->name('unapprovel_booking'); 

    Route::get('/delete-booking/{id}', [App\Http\Controllers\backend\BookingController::class, 'delete_booking'])->name('delete_booking'); 

Route::get('/approve-user/{id}', [App\Http\Controllers\backend\UserController::class, 'approve_user'])->name('approve_user'); 

Route::get('/reject-user/{id}', [App\Http\Controllers\backend\UserController::class, 'reject_user'])->name('approve_user'); 

Route::get('/approve-user-team/{id}', [App\Http\Controllers\backend\TeamController::class, 'approve_user_team'])->name('approve_user'); 

Route::get('/reject-user-team/{id}', [App\Http\Controllers\backend\TeamController::class, 'reject_user_team'])->name('approve_user'); 
   

  

  Route::resource('teams', App\Http\Controllers\backend\TeamController::class);

  Route::get('/team-export', [App\Http\Controllers\backend\TeamController::class, 'team_export'])->name('team-export');

  Route::resource('supportteams', App\Http\Controllers\backend\SupportTeamController::class);

  Route::get('/delete-user-support/{id}', [App\Http\Controllers\backend\SupportTeamController::class, 'delete_user_suport'])->name('delete-user-support');

  
  Route::get('/delete-user_team/{id}', [App\Http\Controllers\backend\TeamController::class, 'delete_user'])->name('delete-user');
  Route::get('/delete-user/{id}', [App\Http\Controllers\backend\UserController::class, 'delete_user'])->name('delete-user');  
  Route::resource('users', App\Http\Controllers\backend\UserController::class);
  



    Route::get('/export-csv', [App\Http\Controllers\backend\UserController::class, 'exportCSV'])->name('export-csv');

  Route::post('change-password', [App\Http\Controllers\backend\ProfileController::class, 'changePassword'])->name('change-password');
  Route::resource('profile', App\Http\Controllers\backend\ProfileController::class);

  Route::get('/user-profile', [App\Http\Controllers\backend\UserProfileController::class, 'company_profile'])->name('company-profile');
  Route::post('/update-user-profile', [App\Http\Controllers\backend\UserProfileController::class, 'update_company_profile_edit'])->name('update-user-profile');  
  Route::resource('setting', App\Http\Controllers\backend\SettingController::class);
  Route::resource('support', App\Http\Controllers\backend\SupportController::class);

       // By User
  Route::post('chat/get-conversation', [App\Http\Controllers\backend\SupportController::class, 'getUserConversation'])->name('chat/get-conversation');
  Route::post('chat/send-conversation', [App\Http\Controllers\backend\SupportController::class, 'sendChatMessage'])->name('chat/send-conversation');
  Route::any('request-create', [App\Http\Controllers\backend\CheckoutController::class, 'request_create'])->name('request_create');
// By Support
  Route::get('user-conversation', [App\Http\Controllers\backend\SupportController::class, 'support_userChatSection'])->name('user-conversation');
  Route::post('support/ajax-user-conversation', [App\Http\Controllers\backend\SupportController::class, 'ajax_support_userChatSection'])->name('user-conversation');
  Route::post('support/ajax-send-conversation', [App\Http\Controllers\backend\SupportController::class, 'ajax_send_conv'])->name('ajax-send-conversation');



// API

   Route::post('/getBookingDetails', [App\Http\Controllers\backend\BookingController::class, 'getBookingDetails'])->name('getBookingDetails');

    Route::get('/get-flight/{id}', [App\Http\Controllers\backend\BookingController::class, 'get_flight'])->name('get_flight');


     Route::post('/check-out', [App\Http\Controllers\backend\BookingController::class, 'check_out'])->name('check_out');

   Route::get('/showform', [App\Http\Controllers\backend\BookingController::class, 'showform'])->name('showform');


   Route::get('/test', [App\Http\Controllers\backend\BookingController::class, 'test'])->name('test');

   Route::post('/apiresponse', [App\Http\Controllers\backend\BookingController::class, 'apiresponse'])->name('apiresponse'); 

   Route::post('/addBookingDetails', [App\Http\Controllers\backend\BookingController::class, 'addBookingDetails'])->name('addBookingDetails');   

    Route::resource('page', App\Http\Controllers\backend\PageController::class);


    Route::get('/booking_page_remove/{id}', [App\Http\Controllers\backend\PageController::class, 'booking_page_remove'])->name('booking-page-remove');

       Route::get('/booking-autocomplete-search', [App\Http\Controllers\backend\BookingController::class, 'booking_autocomplete_search'])->name('booking_autocomplete_search');

    Route::resource('travel-information', App\Http\Controllers\backend\TravelinfoController::class);


    // Route::any('/travel-information1', [App\Http\Controllers\backend\TravelinfoController::class, 'travel_information'])->name('travel-information1');    

    
});
