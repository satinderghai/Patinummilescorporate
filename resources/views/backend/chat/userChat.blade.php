@extends('layouts.backend.master')
@section('content')
<style type="text/css">
    body{margin-top:20px;}

    .chat-online {
        color: #34ce57
    }

    .chat-offline {
        color: #e4606d
    }

    .chat-messages {
        display: flex;
        flex-direction: column;
        max-height: 250px;
        overflow-y: scroll
        
    }

    .chat-message-left,
    .chat-message-right {
        display: flex;
        flex-shrink: 0
    }

    .chat-message-left {
        margin-right: auto
    }

    .chat-message-right {
        flex-direction: row-reverse;
        margin-left: auto
    }
    .py-3 {
        padding-top: 1rem!important;
        padding-bottom: 1rem!important;
    }
    .px-4 {
        padding-right: 1.5rem!important;
        padding-left: 1.5rem!important;
    }
    .flex-grow-0 {
        flex-grow: 0!important;
    }
    .border-top {
        border-top: 1px solid #dee2e6!important;
    } 
               
               
</style>

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">

                        </div><!-- .nk-block-head-content -->

                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                @include('backend.flash-message')

                <div class="nk-block">
                    <div class="card">
                     <div class="card-inner">
                        <div class="row bootstrap snippets">


                          <div class="col-md-12">






                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-12 col-lg-5 col-xl-3 border-right">

                                        <div class="px-4 d-none d-md-block">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <input type="hidden" class="form-control my-3" placeholder="Search...">
                                                    <h3>Users</h3>
                                                </div>
                                            </div>
                                        </div>
                                                <hr class="">
                                        @foreach ($chatUsers as $users) 
                                        <a href="{{ url('/admin/user-conversation') }}?uid={{ $users->user_id }}" class="list-group-item list-group-item-action border-0">
                                            <!-- <div class="badge bg-success float-right">5</div> -->
                                            <div class="d-flex align-items-start">
                                                <i class="fa fa-user-circle" style="font-size: 43px!important; width: 57px;"></i>
                                               <!--  <i class="fas fa-user-alt"style="font-size:36px;width: 39px;"></i> -->
                                          <!--       <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40"> -->
                                                <div class="flex-grow-1 ml-3">
                                                    {{ $users->name }}
                                                    <div class="small">  {{ $users->message }}</div>
                                                </div>
                                            </div>
                                        </a>
                                         <hr class="">

                                        @endforeach
                                        <hr class="d-block d-lg-none mt-1 mb-0">
                                    </div>

                                    @if(isset($_GET['uid']))
                                    @php 
                                    $chatUser = $_GET['uid'];
                                   if(isset($username)){
                                    $chatUserName = $username;
                                   }else{
                                    $chatUserName = $chatUsers[0]->name;
                                   }
                                   
                                    
                                    @endphp
                                    @else

                                    @if(isset($chatUsers[0]->user_id))
                                    @php $chatUser = $chatUsers[0]->user_id; 
                                    $chatUserName = $chatUsers[0]->name;
                                    @endphp
                                    @else
                                    @php $chatUser = ""; 
                                    $chatUserName = ""; 
                                    @endphp
                                    @endif
                                    @endif

                                    <input type="hidden" class="uid" name="uid" value="{{ $chatUser }}">
                                    <div class="col-12 col-lg-7 col-xl-9">
                                        <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                            <div class="d-flex align-items-center py-1">
                                                <div class="position-relative">
                                                    <i class="fa fa-user-circle" style="font-size: 43px!important; width: 57px;"></i>
                                                    <!-- <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40"> -->
                                                </div>

                                                {{ $chatUserName }}
                                                <div class="flex-grow-1 pl-3">
                                                    <strong></strong>
                                                    <!-- <div class="text-muted small"><em>Typing...</em></div> -->
                                                </div>

                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <div id="newpage" class="chat-messages p-4 userChatHistory">






                                            </div>
                                        </div>

                                        <div class="flex-grow-0 py-3 px-4 border-top">
                                            <div class="input-group">
                                                <input type="text" name="message" class="form-control write_msg" placeholder="Type your message">
                                                <button id="send_chat" class="btn btn-primary">Send</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div><!-- .nk-block -->
</div>
</div>
</div>
</div>

<div id="DeleteModal" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="post">
       <div class="modal-content">
         <div class="modal-header bg-danger">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
       </div>
       <div class="modal-body">
           {{ csrf_field() }}
           {{ method_field('DELETE') }}
           <p class="text-center">Are You Sure Want To Delete ?</p>
       </div>
       <div class="modal-footer">
           <center>
             <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
             <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
         </center>
     </div>
 </div>
</form>
</div>
</div>
<script type="text/javascript">
   function deleteData(id)
   {
     var id = id;
     var url = '{{ route("users.destroy", ":id") }}';
     url = url.replace(':id', id);
     $("#deleteForm").attr('action', url);
 }

 function formSubmit()
 {
     $("#deleteForm").submit();
 }
</script>

<script type="text/javascript">
    $(document).ready(function () {
       // $('#example').DataTable();
    });

    $(document).ready(function(){
        setTimeout(realTime, 100);
    });

        // Get User Conversations
    function realTime() {
        $.ajax({
            type:'post',
            url: "{{ url('admin/support/ajax-user-conversation') }}",
            dataType:'json',
            data:{
                '_token':$('meta[name="csrf-token"]').attr('content'),
                'uid':$('input[name=uid]').val(),
            },
            success: function (data) {
                if(data){
                    $('.userChatHistory').html(data.userConversations);
                }
            },
        });
        setTimeout(realTime,2000);
    }


            // Send User Conversations
    $(document).on('click','#send_chat', function (e){
        e.preventDefault();
        var write_msg1 = $('.write_msg').val();
        if(write_msg1 == ''){
            return false;
        }
        $.ajax({
            type:'post',
            url:"{{ url('admin/support/ajax-send-conversation') }}",
            dataType:'json',
            data:{
                '_token':$('meta[name="csrf-token"]').attr('content'),
                'uid':$('input[name=uid]').val(),
                'message':$('input[name=message]').val(),
            },
            success: function (data) {
                console.log(data.msg);
                if(data.msg){
                    $('.userChatHistory').append(data.msg);
                }
            }
        });
        $('input[name=message]').val('');

    });

    $('.write_msg').keypress(function(e){


        if(e.which == 13){//Enter key pressed
            $('#send_chat').click();//Trigger search button click event
            $('input[name=message]').val('');
        }
    });

     $("#send_chat").click(function(){
            $('#newpage').animate({
                scrollTop: $('#newpage')[0].scrollHeight}, "slow");
        });

</script>
@stop

