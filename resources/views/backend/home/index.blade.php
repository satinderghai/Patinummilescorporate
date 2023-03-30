@extends('layouts.backend.master')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">

                                Home
                            </h3>
                        </div><!-- .nk-block-head-content -->

                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
<div class="div-invite-carrier">
                                     <button type="button" class="btn btn-success button-invite-carrier" data-dismiss="modal">INVITE CARRIER</button>
</div>
                    <div class="card">
                     @include('backend.flash-message')
                     <div class="card-inner">

                         <h4 class="table-sub-title">
                                Carriers
                            </h4>
                       <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">

                                <th class="nk-tb-col tb-col-sm"><span>S.No.</span></th>
                                <th class="nk-tb-col tb-col-sm"><span>Carrier</span></th>
                                <th class="nk-tb-col"><span>Dot#</span></th>
                                <th class="nk-tb-col"><span>MC#</span></th>
                                <th class="nk-tb-col"><span>Email</span></th>
                                <th class="nk-tb-col"><span>Status</span></th>
                                <th class="nk-tb-col"><span>Updated</span></th>
                                <th class="nk-tb-col tb-col-md"><span>Action</span></th>

                            </tr><!-- .nk-tb-item -->
                        </thead>
                        <tbody>
                          @forelse($home as $key=>$value)
                          <tr class="nk-tb-item">
                            <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    {{ $key+1 }}
                                </div>
                            </td>

                            <td class="nk-tb-col">
                                <span class="tb-sub">{{ $value['carrier_name'] }}</span>
                            </td>
                               <td class="nk-tb-col">
                                <span class="tb-sub">{{ $value['dot_number'] }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span class="tb-sub">{{ $value['mc_number'] }}</span>
                            </td>
                         
                            <td class="nk-tb-col">
                                <span class="tb-sub">{{ $value['email'] }}</span>
                            </td>

                            <td class="nk-tb-col">
                               @if($value->is_verified == 1)
                               <span class="pricing-badge badge bg-primary">Completed</span>
                               @elseif($value->status == 2)
                                                              <span class="pricing-badge badge bg-danger">Declined</span>

                               @else
                                                                                             <span class="pricing-badge badge bg-warning">Opened</span>


                               @endif

                           </td>
                           <td class="nk-tb-col">
                            <span class="tb-lead">{{ date('d M Y', strtotime($value['created_at'])) }}</span>                                            
                        </td> 

                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1 my-n1">
                                <li class="me-n1">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                         <ul class="link-list-opt no-bdr">
                                                           
                                                                <li><a href="{{action('App\Http\Controllers\backend\HomeController@show', $value['id'])}}"><em class="icon ni ni-eye"></em><span>View</span></a></li>
                                                                <li><a href="{{action('App\Http\Controllers\backend\HomeController@show', $value['id'])}}"><em class="icon ni ni-eye"></em><span>Download</span></a></li>
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

