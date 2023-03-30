@extends('layouts.backend.master')
@section('content')
<style type="text/css">
    .tab-btn:last-child {
    border-radius: 11px 11px 12px 9px;
}

.tab-btn.active {
    color: #fff;
}
</style>

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">

                                       My Pages
                                        </h3>
                                    </div><!-- .nk-block-head-content -->

                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->

                              @include('backend.flash-message')

<div class="panel-tab">
    <div class="pt-head">
       <div class="btn theme-btn" id="">
            <a href="{{ url('admin/page/create')}}" class="tab-btn active"
            >Add New Page</a>
           
        </div> 
</div>
            <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
            <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">


            </h3>
            </div><!-- .nk-block-head-content -->

            </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->

                    <div class="listing-content">          
                        <div class="table-listing-section">
                            <div class="card">
                                <div class="card-inner">
                                 @if(!$pages->isEmpty())
                                 <table id="table" class="display datatable-init nowrap nk-tb-list is-separate" style="width:100%" data-auto-responsive="false">
                                 <!-- <table class="datatable-init nowrap nk-tb-list is-separate" id="table" data-auto-responsive="false"> -->
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">

                                            <th class="nk-tb-col tb-col-sm"><span>S.No.</span></th>
                                          
                                            <th class="nk-tb-col"><span>Title</span></th>
                                            <th class="nk-tb-col"><span>Slug</span></th>
                                            <th class="nk-tb-col"><span>Content</span></th>
                                            <th class="nk-tb-col"><span>Created at</span></th>
                                              
                                         
                                            <th class="nk-tb-col tb-col-md"><span>Action</span></th>
                                         

                                        </tr><!-- .nk-tb-item -->
                                    </tr><!-- .nk-tb-item -->
                                </thead>
                                <tbody>

                                  @forelse($pages as $key=>$value)
                                  <tr class="nk-tb-item">
                                    <td class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            {{ $key+1 }}
                                        </div>
                                    </td>

                                   <!--  <td class="nk-tb-col">
                                        <span class="tb-sub">{{ $value['tnx_id'] }}</span>
                                    </td> -->
                                    <td class="nk-tb-col">
                                        <span class="tb-sub">{{ $value['title'] }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-sub">{{ $value['slug'] }}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                      <?php $content = substr(strip_tags($value['content']),0,50)."..."; ?>
                                        <span class="tb-sub">{!! $content !!}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-sub">{{ date('d M Y', strtotime($value['created_at'])) }}</span>
                                    </td>
                                   
                                    
                                    
                              <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1 my-n1">
                                            <li class="me-n1">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                       <ul class="link-list-opt no-bdr">
                                                              
                                                               <li><a href="{{action('App\Http\Controllers\backend\PageController@edit', $value['id'])}}"><em class="icon fas fa-edit"></em><span>Edit</span></a></li>

                                                               
                                                                 
                                                           
                                                                <li>
                                                                <li><a href="{{action('App\Http\Controllers\backend\PageController@show', $value['id'])}}"><em class="icon ni ni-eye"></em><span>View</span></a></li>

                                                                <li>
                                                                    <a href="{{url('admin/booking_page_remove')}}/{{ $value['id'] }}" onclick="return confirm('Are you sure?')"><em class="icon ni ni-trash"></em><span>Remove</span></a>
                                                                </li>
                                                               
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>

   
                         </tr><!-- .nk-tb-item -->
                         @empty
                          <tr class="nk-tb-item"><td class="nk-tb-col" valign="top" colspan="7">No records found !</td></tr>

                         @endforelse




                     </tbody>
                 </table><!-- .nk-tb-list -->

                 @else
                 
 <tr class="nk-tb-item"><td class="nk-tb-col" valign="top" colspan="7">No records found !</td></tr>
                @endif
            </div>
        </div>
    </div><!-- .nk-block -->
</div>
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


</div>
</div>
<script>
    $(document).ready(function(){

      $("#listing").click(function(){
        $(".listing-content").show();
        $(".sale-content").hide();
    });
      $("#sales").click(function(){
        $(".listing-content").hide();
        $(".sale-content").show();
    });

      var header = document.getElementById("tab-btns");
      var btns = header.getElementsByClassName("tab-btn");
      for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
              var current = document.getElementsByClassName("active");
              current[1].className = current[1].className.replace(" active", "");
              this.className += " active";
          });
      }
      
  });
</script>

<script type="text/javascript">
 function deleteData(id)
 {
   var id = id;
   var url = '{{ route("page.destroy", ":id") }}';
   url = url.replace(':id', id);
   $("#deleteForm").attr('action', url);
 }

 function formSubmit()
 {
   $("#deleteForm").submit();
 }
</script>

@stop

