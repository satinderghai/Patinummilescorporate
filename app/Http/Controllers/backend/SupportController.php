<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Messages;
use App\Models\ChatUser;
use App\Models\User;
use App\Models\Company;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class SupportController extends Controller
{

  public function index()
  {



    return view('backend.chat.index');
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


  public function support_userChatSection()
  {
    $chatUsers = Chat::join('users', 'chat.user_id', '=', 'users.id')
    ->orderBy('chat.updated_at','DESC')
    ->get();
    
    if(isset($_GET['uid'])){
        $userInfo = User::find($_GET['uid']);
        $username = $userInfo->name;
    }else{
       $username = null;
    }
    
    return view('backend.chat.userChat',compact('chatUsers','username'));
}





public function getUserConversation()
{   
   $messageCollection = Chat::join('messages', 'chat.id', '=', 'messages.chat_id')
   ->join('users', 'chat.user_id', '=', 'users.id')
   ->where('chat.user_id',Auth::user()->id)
   ->select('chat.id as main_chat_id',
       'chat.compnay_id as main_compnay_id',
       'chat.message as main_message',
       'chat.status as main_status',
       'chat.created_at as main_created_at',
       'chat.updated_at as main_updated_at',
       'messages.message as msg_message',
       'messages.user_id as msg_user_id',
       'messages.created_at as msg_created_at',
       'users.name'
   )
   ->get();

   $chatHistory = "";
   $chatID = "";
   if (!empty($messageCollection)) {
    foreach ($messageCollection as $messageChat) {
        $message = $messageChat->msg_message;
        $chatID = $messageChat->main_chat_id;
        if(Auth::user()->id != $messageChat->msg_user_id){

            $getUserUid = User::where('id',$messageChat->msg_user_id)->first();
            $chatHistory .= '<div class="direct-chat-msg">
             <div class="lft_icn">
            <!-- /.direct-chat-info -->
            <img class="direct-chat-img" src="'.url('/').'/public/backend/images/support_chat.jpg'.'" alt="Message User Image"><!-- /.direct-chat-img -->
            <div class="direct-chat-text">
            <span class="to-msg">'.$messageChat->msg_message.'</span>
            </div></div>
            <div class="direct-chat-info clearfix">
            <span class="direct-chat-name pull-left">platinum</span>
            <span class="direct-chat-timestamp pull-right">'.Carbon::parse($messageChat->msg_created_at)->format('g:i A | d M').'</span>
            </div>
            <!-- /.direct-chat-text -->
            </div> ';
        }else{
         $chatHistory .= '
         <div class="my-chat-sections">
         <div class="direct-chat-msg right">
          <div class="ryt_icn">
         <!-- /.direct-chat-info -->
         <img class="direct-chat-img" src="'.url('/').'/public/backend/images/user-default.png'.'" alt="Message User Image"><!-- /.direct-chat-img -->
         <div class="direct-chat-text">
         <span class="from-msg">'.$messageChat->msg_message.'</span>
         </div>
         </div>
         <div class="direct-chat-info myinfo clearfix">
         <span class="direct-chat-timestamp pull-left">'.Carbon::parse($messageChat->msg_created_at)->format('g:i A | d M').'</span>
         </div>
         <!-- /.direct-chat-text -->
         </div>
         </div>
         ';
     }
 }
}

return $userMessagesData = [
    'userConversations' => $chatHistory,
    'chatID' => $chatID
];

}


public function ajax_support_userChatSection(Request $request)
{   

    if(isset($request->uid)){
       $chatUserId = $request->uid;

       $getChatUser = Chat::where('user_id',$chatUserId)->first();  

       $messageCollection = Chat::join('messages', 'chat.id', '=', 'messages.chat_id')
       ->join('users', 'chat.user_id', '=', 'users.id')
       ->where('messages.chat_id',$getChatUser->id)
       ->select('chat.id as main_chat_id',
           'chat.compnay_id as main_compnay_id',
           'chat.message as main_message',
           'chat.status as main_status',
           'chat.created_at as main_created_at',
           'chat.updated_at as main_updated_at',
           'messages.message as msg_message',
           'messages.user_id as msg_user_id',
           'messages.created_at as msg_created_at',
           'users.name'
       )
       ->get();


       $chatHistory = "";
       $chatID = "";
       if (!empty($messageCollection)) {
        foreach ($messageCollection as $messageChat) {
            $message = $messageChat->msg_message;
            $chatID = $messageChat->main_chat_id;
            $getUserUid = User::where('id',$messageChat->msg_user_id)->first();
            if($chatUserId != $messageChat->msg_user_id){
                
                $chatHistory .= '<div class="chat-message-right pb-4">
                <div>
                <!-- <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40"> -->
                <!-- <i class="fa fa-user-circle" style="font-size: 43px!important; width: 57px;"></i> -->
                <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                  <div class="font-weight-bold mb-1"></div>
                '.$messageChat->msg_message.'
                </div>
                <div class="text-muted small text-nowrap mt-2">'.Carbon::parse($messageChat->msg_created_at)->format('g:i A | d M').'</div>
                </div>
                

                </div>';
            }else{
             $chatHistory .= '<div class="chat-message-left pb-4">
             <div>
             <!-- <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40"> -->
             <i class="fa fa-user-circle" style="font-size: 33px!important; width: 47px;"></i>
              <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
              '.$messageChat->msg_message.'
              </div>
             <div class="text-muted small text-nowrap mt-2">'.Carbon::parse($messageChat->msg_created_at)->format('g:i A | d M').'</div>
             </div>
             
             <!--  <div class="font-weight-bold mb-1">'.$getUserUid->name.'</div> -->
            
             
             </div>


             ';
         }
     }
 }

 return $userMessagesData = [
    'userConversations' => $chatHistory,
    'chatID' => $chatID
];
}
}




public function sendChatMessage(Request $request)
{  

   if($request){

    $chat_user = Chat::where('user_id',Auth::user()->id)->first();

    if ($chat_user === null) {
        $chat_user = new Chat;
        $chat_user->status = 1;
        $chat_user->message = $request->message;
        $chat_user->user_id = Auth::user()->id;
        $chat_user->save();
    }else{
       $chat_user->message = $request->message;
       $chat_user->updated_at=Carbon::now();
       $chat_user->save(); 
   }

   $support = new Messages;
   $support->chat_id = $chat_user->id;
   $support->user_id = Auth::user()->id;
   $support->message = $request->message;
   $support->status = 1;
   $support->type = 1;
   $support->is_read = 1;
   $support->save();

   $chatHistory = '<div class="my-chat-sections">
   <div class="direct-chat-msg right">
   <img class="direct-chat-img" src="'.url('/').'/public/backend/images/user-default.png'.'" alt="Message User Image"><!-- /.direct-chat-img -->

   <div class="direct-chat-text">
   <span class="from-msg">'.$request->message.'</span>
   </div>
   <div class="direct-chat-info myinfo clearfix">
   <span class="direct-chat-timestamp pull-left">'.Carbon::parse($support->created_at)->format('g:i A | d M').'</span>
   </div>
   </div>
   </div>';


   return $userMessagesData = [
    'status' => true,
    'msg' => $chatHistory
];


}
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
         'email' => 'required',
     ]);
      if( $validation->fails() ) {
       return redirect('admin/teams/create')->withErrors($validation->errors());
   }
   else
   {
    $User = new User;
    $User->name = $request->name;
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


public function ajax_send_conv(Request $request)
{  

   if($request){

    $chat_user = Chat::where('user_id',$request->uid)->first();

   $support = new Messages;
   $support->chat_id = $chat_user->id;
   $support->user_id = Auth::user()->id;
   $support->message = $request->message;
   $support->status = 1;
   $support->type = 1;
   $support->is_read = 1;
   $support->save();

           $chatHistory = '<div class="chat-message-right pb-4">
                <div>
                <!-- <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40"> -->
                <!-- <i class="fa fa-user-circle" style="font-size: 43px!important; width: 57px;"></i> -->
                <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                '.$request->message.'
                </div>
                <div class="text-muted small text-nowrap mt-2">'.Carbon::parse($support->created_at)->format('g:i A | d M').'</div>
                </div>
                
                </div>';
            }


   return $userMessagesData = [
    'status' => true,
    'msg' => $chatHistory
];


}


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        // $getUserInfo = Support::join('company','users.id','=','company.user_id')
        // ->where('users.id',Auth::user()->id)
        // ->select('users.id as userId','users.name','users.email','users.phone','users.role','users.status','company.*')
        // ->first();


        $getUserInfo = Support::join('user_company','users.id','=','user_company.user_id')
        ->join('company','user_company.company_id','=','company.id')
        ->where('users.id',$id)
        ->select('users.id as userId','users.name','users.email','users.phone','users.role','users.status','company.*')
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

      $teamss = Support::findOrFail($id);

      return view('backend.teams.edit',compact('users'));

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

     $teams = Support::findOrFail($id);

     $input = Request::all();



     $validation = Validator::make($input,

       [

         'name' => 'required',

         'email' => 'required',

     ]);



     if( $validation->fails() ) {

       return redirect('/admin/users/'.$id.'/edit')->withErrors($validation->errors());

   }

   else

   {

       $teams->name =$input['name'];

       $teams->email=$input['email'];

      // $blog->image=$imagedata;

       $teams->updated_at=Carbon::now();

       $teams->save();



       Session::flash('success','Update record successfully.');

       return redirect('admin/users');

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

      $teams = Support::findOrFail($id);

      $teams->delete();

      Session::flash('success','Successfully deleted.');

      return redirect('admin/users');

  }

  public function delete_user($id)
  {
      $user = Support::findOrFail($id);
      $user->delete();

      DB::table('user_company')->where('user_id',$id)->delete();

      Session::flash('success','Successfully deleted.');

      return redirect('admin/teams');

  }


}

