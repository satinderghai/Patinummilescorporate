@extends('layouts.backend.master')

@section('content')
      <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Dashboard</h3>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Total Bookings</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">{{ $booking_count}}</div>                                                                
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        @if(Auth::user()->role == 2)
                                         <div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Your Budget</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount"> $ {{ Auth::user()->budget}}</div>                                                                
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        @endif
                                        @if(Auth::user()->role == 0 || Auth::user()->role == 1)
                                        <div class="col-xxl-3 col-sm-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg6">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Total Team</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">{{ $teams_count }}</div>                                                                
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        @endif

                                        <div class="col-xxl-12">
                                            <div class="card card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Recent Bookings</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="card">
                       <div class="card-inner">

                                                 <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                            <thead>
                                <tr class="nk-tb-item nk-tb-head">

                                    <th class="nk-tb-col tb-col-sm"><span>S.No.</span></th>
                                    <th class="nk-tb-col tb-col-sm"><span>Flight Name</span></th>
                                     <th class="nk-tb-col tb-col-sm"><span>Passenger Name</span></th>

                                      <th class="nk-tb-col tb-col-sm"><span>Start From</span></th>

                                      <th class="nk-tb-col tb-col-sm"><span>Going To</span></th>
                                    <th class="nk-tb-col"><span>Price</span></th>
                                    <th class="nk-tb-col"><span>Departure Date</span></th>
                                    <th class="nk-tb-col"><span>Status</span></th>
                                    <!-- <th class="nk-tb-col tb-col-md"><span>Action</span></th> -->

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
                                <td class="nk-tb-col tb-col-sm">

                                           <div class="user-info">
                                                <span class="tb-lead">{{ $value->flight_name }}<span class="dot dot-success d-md-none ms-1"></span></span>
                                            </div> 
                                            <!-- <span class="tb-product">
                                                @if(isset($value->image))
                                                <img src="{{ asset('public/backend/images/profile/') }}/{{ $value->image }}" alt="" class="thumb">
                                                @else
                                                <img src="{{ asset('public/backend/images/profile/default.jpg') }}" alt="" class="thumb">

                                                @endif
                                                <span class="title">{{ $value['firstname'] }}</span>
                                            </span> -->
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-sub">{{ $value->given_name }}</span>
                                        </td>   

                                        <td class="nk-tb-col">
                                            <span class="tb-sub">{{ $value->checkin }}</span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-sub">{{ $value->checkout }}</span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-sub">{{ $value->price }}</span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <span class="tb-lead">{{ date('d M Y', strtotime($value->departing_at)) }}</span>

                                        </td> 
                                        <td class="nk-tb-col">
                                         @if($value->status == 1)
                                         <span class="tb-status text-success">Approve</span>                                                     @endif      
                                         @if($value->status == 0)
                                         <span class="tb-status text-warning">Pending</span>
                                         @endif

                                          @if($value->status == 2)
                                         <span class="tb-status text-warning" style="color:red !important;">Cancelled</span>                                                           
                                         @endif

                                     </td>

                         <!--             <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1 my-n1">
                                            <li class="me-n1">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                       <ul class="link-list-opt no-bdr">
                                                        
                                                            
                                                                <li><a href="{{action('App\Http\Controllers\backend\BookingController@show', $value->id)}}"><em class="icon ni ni-eye"></em><span>View</span></a></li>

                                                                <li>
                                                                    <a href="{{url('admin/delete-user')}}/{{ $value->id }}" onclick="return confirm('Are you sure?')"><em class="icon ni ni-trash"></em><span>Remove</span></a>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td> -->
                                    </tr><!-- .nk-tb-item -->

                                    @empty
                                    <tr class="nk-tb-item"><td class="nk-tb-col" valign="top" colspan="7">No records found !</td></tr>

                                    @endforelse

                                </tbody>
                            </table><!-- .nk-tb-list -->
                                            </div><!-- .card -->
                                            </div><!-- .card -->
                                            </div><!-- .card -->
                                        </div>
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
@endsection