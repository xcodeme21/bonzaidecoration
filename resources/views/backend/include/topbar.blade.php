<!-- Top Bar Start -->
<div class="topbar">
            
    <!-- Navbar -->
    <nav class="topbar-main">  
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ url('/') }}" target="_blank" class="logo">
                    <img src="{{ asset('public/backend/images/logo.jpeg') }}" alt="logo-small" style="width:150px;">
            </a>
        </div><!--topbar-left-->
        <!--end logo-->
        <ul class="list-unstyled topbar-nav float-right mb-0"> 

            <!-- <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-bell noti-icon"></i>
                    <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                    <h6 class="dropdown-item-text">
                        Notifications (18)
                    </h6>
                    <div class="slimscroll notification-list">
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                            <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i></div>
                            <p class="notify-details">Your item is shipped<small class="text-muted">It is a long established fact that a reader will</small></p>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
                            <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                        </a>
                    </div>
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                        View all <i class="fi-arrow-right"></i>
                    </a>
                </div>
            </li> -->

            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user pr-0" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('public/backend/images/users/user-4.jpg') }}" alt="profile-user" class="rounded-circle" /> 
                    <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('profil') }}"><i class="dripicons-user text-muted mr-2"></i> Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item"  href="{{ route('logout') }}" data-toggle="tooltip" title="Keluar dari sistem" data-placement="left" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
                    <form id="logout-form" class="link_mimic" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li><!--end dropdown-->
            <li class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle nav-link" id="mobileToggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li> <!--end menu item-->   
        </ul><!--end topbar-nav-->

        <ul class="list-unstyled topbar-nav mb-0">
        </ul><!--end topbar-nav-->
    </nav>
    <!-- end navbar-->
        <!-- MENU Start -->
    <div class="navbar-custom-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="has-submenu">
                        <a href="{{ route('dashboard') }}">
                            <span><i class="dripicons-meter"></i> Dashboard</span>
                        </a>
                    </li><!--end has-submenu-->

                    <li class="has-submenu">
                        <a href="#">
                            <span><i class="dripicons-view-thumb"></i> Masterisasi</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('client') }}"><i class="dripicons-user-group"></i>Client</a></li>
                            <li><a href="{{ route('package-decoration') }}"><i class="fa fa-list"></i>Package Decoration</a></li>
                        </ul>
                    </li><!--end submenu-->

                    <li class="has-submenu">
                        <a href="#">
                            <span><i class="fa fa-list"></i> Transaksi</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('schedule') }}"><i class="fa fa-history"></i>Schedule</a></li>
                            <li><a href="{{ route('invoice') }}"><i class="fas fa-file-invoice-dollar"></i>Invoice</a></li>
                        </ul>
                    </li><!--end submenu-->

                    <li class="has-submenu">
                        <a href="{{ route('laporan') }}">
                            <span><i class="fa fa-list"></i> Laporan</span>
                        </a>
                    </li><!--end has-submenu-->

                </ul><!-- End navigation menu -->
            </div> <!-- end navigation -->
        </div> <!-- end container-fluid -->
    </div> <!-- end navbar-custom -->
</div>
<!-- Top Bar End -->