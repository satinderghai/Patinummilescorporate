@extends('layouts.backend.master')
@section('content')
<style type="text/css">
    .overflow-x-scroll{
        overflow-x: scroll ;
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

                               Booking Lists
                            </h3>
                        </div><!-- .nk-block-head-content -->

                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">


                    <div class="card">
                       @include('backend.flash-message')
                       <div class="card-inner">
                         <div class="overflow-x-scroll">
                         <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                            <thead>
                                <tr class="nk-tb-item nk-tb-head">

                                    <th class="nk-tb-col tb-col-sm"><span>S.No.</span></th>
                                    <!-- <th class="nk-tb-col tb-col-sm"><span>Flight logo</span></th> -->
                                    <th class="nk-tb-col tb-col-sm"><span>Flight Name</span></th>
                                     <th class="nk-tb-col tb-col-sm"><span>Passenger Full Name</span></th>

                                      <th class="nk-tb-col tb-col-sm"><span>Start From</span></th>

                                      <th class="nk-tb-col tb-col-sm"><span>Going To</span></th>
                                   
                                    
                                    <th class="nk-tb-col tb-col-sm"><span>Booking Reference</span></th>
                                    <th class="nk-tb-col"><span>Price</span></th>
                                    <th class="nk-tb-col"><span>Departure Date</span></th>
                                    <th class="nk-tb-col"><span>Status</span></th>
                                    <th class="nk-tb-col tb-col-md"><span>Action</span></th>

                                </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                              @forelse($booking as $key=>$value)
                              <tr class="nk-tb-item">
                                <td class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        {{ $key+1 }}
                                    </div>
                                </td>


                                <!--  <td class="nk-tb-col tb-col-sm">
                                    <img src="{{ $value->image }}" width="40px" height="40px">
                                </td> -->

                                 <td class="nk-tb-col tb-col-sm">

                                    <div class="user-info">
                                                <span class="tb-lead">{{ $value->flight_name }}<span class="dot dot-success d-md-none ms-1"></span></span>
                                            </div> 

                                          
                                            
                                        </td>
                                <td class="nk-tb-col tb-col-sm">
                                        <div class="user-info">
                                                <span class="tb-lead">{{ $value->given_name }}<span class="dot dot-success d-md-none ms-1"></span></span>
                                            </div> 
                                            
                                        </td>
                                          <td class="nk-tb-col">
                                            <span class="tb-sub">{{ $value->checkin }}</span>
                                        </td> 
                                         <td class="nk-tb-col">
                                            <span class="tb-sub">{{ $value->checkout }}</span>
                                        </td>  

                                           

                                        <td class="nk-tb-col">
                                            <span class="tb-sub">{{ $value->booking_reference }}</span>
                                        </td> 

                                       
                                       
                                        <td class="nk-tb-col">
                                            <span class="tb-sub">{{ $value->price }}</span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-lead">{{ date('d M Y', strtotime($value->departing_at)) }}</span>

                                        </td> 
                                        <td class="nk-tb-col">
                                         @if($value->status == 1)
                                         <span class="tb-status text-success">completed</span>
                                         @endif                                                           
                                         @if($value->status == 2)
                                         <span class="tb-status text-warning" style="color:red !important;">Cancelled</span>
                                         @endif
                                          @if($value->status == 0)
                                         <span class="tb-status text-warning">hold</span>
                                         @endif

                                     </td>

                                     <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1 my-n1">
                                            <li class="me-n1">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                       <ul class="link-list-opt no-bdr">
                                                        
                                                            
                                                                <li><a href="{{action('App\Http\Controllers\backend\BookingController@show', $value->id)}}"><em class="icon ni ni-eye"></em><span>View</span></a></li>
                                                                 @if(Auth::user()->role == 1)

                                                                  @if($value->status == 0)

                                                                 <li><a href="{{url('admin/approvel-booking')}}/{{ $value->id }}" onclick="return confirm('Are you sure?')"><em class="icon fas fa-circle-check"></em><span> Approve Order</span></a>
                                                                 </li>
                                                                    @endif
                                                                     @if($value->status == 1)
                                                                  <li><a href="{{url('admin/unapprove-booking')}}/{{ $value->id }}"onclick="return confirm('Are you sure?')"><em class="icon fas fa-remove"></em><span>Cancel Order</span></a></li>
                                                                   @endif
                                                                    <!-- @if($value->status == 2)
                                                                    <li><a href="{{url('admin/approvel-booking')}}/{{ $value->id }}" onclick="return confirm('Are you sure?')"><em class="icon fas fa-circle-check"></em><span>Approve</span></a></li>
                                                                  @endif -->
                                                                    @endif

                                                                <li>
                                                                    <a href="{{url('admin/delete-booking')}}/{{ $value->id }}" onclick="return confirm('Are you sure?')"><em class="icon ni ni-trash"></em><span>Remove Record</span></a>

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
</script>
@stop

