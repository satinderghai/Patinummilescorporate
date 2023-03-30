<style>
    .actived .nk-menu-text {
        color: #fff !important;
    }
    .actived .fa-solid.fa-gauge {
        color: #fff !important;
    }
    .admin.nk-menu-item.active.current-page .nk-menu-link  {
        color: #626262 !important;
        background: transparent;
    }
    .admin.nk-menu-item.active.current-page .nk-menu-link .nk-menu-icon {
        color: #626262 !important;
    }
    .actived .nk-menu-link {
        background: #00538c !important;
        color: #fff !important;
    }
    .actived .nk-menu-link .nk-menu-icon {
        color: #fff !important;
    }
    .is-light .nk-menu-link:hover, .is-light .active > .nk-menu-link {
        color: none !important;
    }
</style>


<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ url('/admin') }}"  class="logo-link nk-sidebar-logo">
                <img class="logo-img" src="{{ asset('public/backend/images/logo.png') }}" alt="logo">
                <!-- {{ config('app.name', 'Laravel') }} -->
            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                class="icon ni ni-arrow-left"></em></a>
                <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
        </div><!-- .nk-sidebar-element -->


        <div class="nk-sidebar-element">
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu" data-simplebar>
                    <ul class="nk-menu">
                        
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Dashboard</h6>
                        </li><!-- .nk-menu-item -->
                        <li class="@if(Request::url()=== url('/').'/admin') actived @endif admin nk-menu-item">
                            <a href="{{ url('admin') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><i class="fa-solid fa-gauge"></i></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        @if(Auth::user()->role == 1 )
                        <!-- <li class="@if(Request::url()=== url('/').'/company-profile') actived @endif nk-menu-item">
                            <a href="{{ url('admin/company-profile') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><i class="fa-sharp fa-solid fa-user"></i></span>
                                <span class="nk-menu-text">Company Profile</span>
                            </a>
                        </li> --><!-- .nk-menu-item -->
                        @endif

                        @if(Auth::user()->role == 0 )
                        <li class=" nk-menu-item">
                            <a href="{{ url('admin/users') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><i class="fa-sharp fa-solid fa-list"></i></span>
                                <span class="nk-menu-text">Company List</span>
                            </a>
                        </li><!-- .nk-menu-item -->

                     <!--    <li class=" nk-menu-item">
                            <a href="{{ url('admin/booking') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><i class="fa-sharp fa-solid fa-calendar"></i></span>
                                <span class="nk-menu-text">Booking</span>
                            </a>
                        </li> -->

                        @endif
                        
                        @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 0 )

                        <li class=" nk-menu-item has-sub info-data-pending">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><i class="fa-solid fa-calendar"></i></span>
                                <span class="nk-menu-text">Booking</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class=" nk-menu-item">
                                    <a href="{{ url('admin/booking') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Booking List</span></a>
                                    </li>
                                    @if( Auth::user()->role == 2)
                                    <li class=" nk-menu-item info-data-pending">
                                        <a href="{{ route('booking.create') }}" class="nk-menu-link"><span
                                            class="nk-menu-text">Add Booking</span></a>
                                        </li>
                                        @endif

                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                @endif
                                @if(Auth::user()->role == 1)
                                <li class=" nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><i class="fa-solid fa-steam"></i></span>
                                        <span class="nk-menu-text">Team</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="  nk-menu-item">
                                            <a href="{{ url('admin/teams') }}" class="nk-menu-link"><span
                                                class="nk-menu-text">Employee List</span></a>
                                            </li>
                                            
                                            <li class=" nk-menu-item">
                                                <a href="{{ route('teams.create') }}" class="nk-menu-link"><span
                                                    class="nk-menu-text">Add Employee</span></a>
                                                </li>
                                                
                                            </ul><!-- .nk-menu-sub -->



                                        </li><!-- .nk-menu-item -->

                                        @endif

                                        @if(Auth::user()->role == 0)

                                        <li class=" nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                                <span class="nk-menu-icon"><i class="fa-solid fa-steam"></i></span>
                                                <span class="nk-menu-text"> Support Team</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="  nk-menu-item">
                                                    <a href="{{ url('admin/supportteams') }}" class="nk-menu-link"><span
                                                        class="nk-menu-text">Support Teams</span></a>
                                                    </li>
                                                    
                                                    <li class=" nk-menu-item">
                                                        <a href="{{ route('supportteams.create') }}" class="nk-menu-link"><span
                                                            class="nk-menu-text">Add Support Team</span></a>
                                                        </li>
                                                        
                                                    </ul><!-- .nk-menu-sub -->


                                                    
                                                </li><!-- .nk-menu-item -->

                                                @endif
                                                

                                                @if(Auth::user()->role == 0 || Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
                                                <li class=" nk-menu-item">
                                                    <a href="{{ url('admin/profile') }}" class="nk-menu-link">
                                                        <span class="nk-menu-icon"><i class="fa-sharp fa-solid fa-user"></i></span>
                                                        <span class="nk-menu-text">Profile</span>
                                                    </a>
                                                </li>

                                                @endif
                                                
                                                @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                                <li class=" nk-menu-item info-data-pending">
                                                    <a href="{{ url('admin/support') }}" class="nk-menu-link">
                                                        <span class="nk-menu-icon"><i class="fa-solid fa-comment"></i></span>
                                                        <span class="nk-menu-text">Support</span>
                                                    </a>
                                                </li><!-- .nk-menu-item -->
                                                @endif



                                                @if(Auth::user()->role == 0 || Auth::user()->role == 3)
                                                <li class=" nk-menu-item">
                                                    <a href="{{ url('admin/user-conversation') }}" class="nk-menu-link">
                                                        <span class="nk-menu-icon"><i class="fa-solid fa-comment"></i></span>
                                                        <span class="nk-menu-text">Chat</span>
                                                    </a>
                                                </li><!-- .nk-menu-item -->
                                                @endif

                                                

                                                @if(Auth::user()->role == 0)
                                                <li class=" nk-menu-item">
                                                    <a href="{{ url('admin/page') }}" class="nk-menu-link">
                                                        <span class="nk-menu-icon"><i class="fa-solid fa-file"></i></span>
                                                        <span class="nk-menu-text">Pages</span>
                                                    </a>
                                                </li><!-- .nk-menu-item -->
                                                @endif


                                                @if(Auth::user()->role == 2)
                                                @if(Auth::user()->user_company_is == 0)
                                                <li class=" nk-menu-item">
                                                    <a href="{{ url('admin/travel-information') }}" class="nk-menu-link">
                                                        <span class="nk-menu-icon"><i class="fa-solid fa-file"></i></span>
                                                        <span class="nk-menu-text">Travel Information</span>
                                                    </a>
                                                </li><!-- .nk-menu-item -->
                                                @endif
                                                @endif

                                            </ul><!-- .nk-menu -->
                                        </div><!-- .nk-sidebar-menu -->
                                    </div><!-- .nk-sidebar-content -->
                                </div><!-- .nk-sidebar-element -->
                            </div>