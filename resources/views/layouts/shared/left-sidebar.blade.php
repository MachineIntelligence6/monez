<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>Company Profile</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Profile</span>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Change Password</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li>
                    <a href="{{route('second', ['crm', 'admin'])}}" class="isDisabled">
                        <i data-feather="airplay"></i>
                        <span> Admin </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('team-members.index')}}">
                        <i data-feather="users"></i>
                        <span> Team Members </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('advertiser.index')}}">
                        <i data-feather="briefcase"></i>
                        <span> Advertisers </span>
                    </a>
                </li>

                <li>
                    <a href="#siderbarFeeds" data-toggle="collapse">
                        <i data-feather="search"></i>
                        <span> Search Feeds </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="siderbarFeeds">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('feeds.index')}}">Feeds</a>
                            </li>
                            <li>
                                <a href="{{route('feeds.redirects-test')}}">Redirect Tests</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{route('publisher.index')}}">
                        <i data-feather="package"></i>
                        <span> Publishers </span>
                    </a>
                </li>



                <li>
                    <a href="{{route('channels.index')}}">
                        <i data-feather="file-text"></i>
                        <span> CHannels </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarReports" data-toggle="collapse" style="cursor: pointer;">
                        <i data-feather="book"></i>
                        <span> Reports </span>
                        <span class="menu-arrow"></span>
                        <!-- <span class="fas fa-chevron-down float-right"></span> -->
                    </a>
                    <div class="collapse" id="sidebarReports">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('activity')}}">Activity Reports</a>
                            </li>
                            <li>
                                <a href="{{route('revenue')}}">Revenue Reports</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{route('finance.index')}}">
                        <i data-feather="shopping-cart"></i>
                        <span> Finance </span>
                    </a>
                </li>


                <li>
                    <a href="#sidebarSettings" data-toggle="collapse" style="cursor: pointer;">
                        <i class="fe-settings"></i>
                        <span> Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSettings">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('settings.index')}}">Default Settings</a>
                            </li>
                            <li>
                                <a href="{{route('channelpaths.index')}}">Channel Paths</a>
                            </li>
                            <li>
                                <a href="{{route('notification.view')}}">Notification</a>
                            </li>
                            <li>
                                <a href="{{route('newsletter.view')}}">Newsletter</a>
                            </li>
                            <li>
                                <a href="{{route('custommessage.view')}}">Custom Messages</a>
                            </li>
                            <li>
                                <a href="{{route('drafts.view')}}">Drafts</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- <li>
                    <a href="{{route('settings.index')}}">
                        <i class="fe-settings"></i>
                        <span> SETTINGS </span>
                    </a>
                </li> -->
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->