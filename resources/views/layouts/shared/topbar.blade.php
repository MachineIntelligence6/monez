<!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="d-none d-lg-block">
                <form class="app-search">
                    <div class="app-search-box dropdown">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Search..." id="top-search">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>

            <li class="dropdown d-inline-block d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li>

            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>

            <li class="dropdown d-inline-block">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" data-target="#notifications-dropdown" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" id="notifications-dropdown" >
                    <!-- item-->
                    <a href="{{route('account.index')}}" class="dropdown-item notify-item">
                        <span>Notification Item</span>
                        <p style="max-width: 300px; overflow: hidden; text-overflow: ellipsis;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex saepe ducimus quis, veniam quae a ipsa consequuntur praesentium distinctio. Distinctio iste nam est nulla delectus ipsa repellendus quas omnis aperiam.</p>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item notify-item" href="#">
                        <span>View all notifications</span>
                    </a>
                </div>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" data-target="#profile-dropdown" role="button" aria-haspopup="false" aria-expanded="false">
                    <!-- <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle"> -->
                    <span class="pro-user-name ml-1">
                        {{auth()->user()->name ?? ''}} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" id="profile-dropdown">
                    <!-- item-->
{{--                    <a href="{{route('account.index')}}" class="dropdown-item notify-item">--}}
{{--                        <i class="fe-user mr-1"></i>--}}
{{--                        <span>Company Profile</span>--}}
{{--                    </a>--}}
                    <a href="{{ route('team-members.view', auth()->user()->id) }}" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Profile</span>
                    </a>
                    <!-- item-->
{{--                    <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                        <i class="fe-lock mr-1"></i>--}}
{{--                        <span>Change Password</span>--}}
{{--                    </a>--}}

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>

                </div>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('any', ['dashboard'])}}" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <!-- <img src="{{asset('assets/images/logo-sm.png')}}"alt="" height="22"> -->
                    <span class="logo-lg-text-light">Monez</span>
                </span>
                <span class="logo-lg">
                    <!-- <img src="{{asset('assets/images/logo-dark.png')}}"alt="" height="20"> -->
                    <span class="logo-lg-text-light">M</span>
                </span>
            </a>

            <a href="{{route('any', ['dashboard'])}}" class="logo logo-light text-center">
                <span class="logo-sm">
                    <span class="logo-lg-text-light">M</span>
                    <!-- <img src="{{asset('assets/images/logo-sm.png')}}"alt="" height="22"> -->
                </span>
                <span class="logo-lg">
                    <span class="logo-lg-text-light">Monez</span>
                    <!-- <img src="{{asset('assets/images/logo-light.png')}}"alt="" height="20"> -->
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<!-- end Topbar -->
