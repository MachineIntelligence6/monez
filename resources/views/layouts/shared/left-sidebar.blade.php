<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
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

                <!-- <li class="menu-title">Navigation</li>

                <li>
                    <a href="#sidebarDashboards" data-toggle="collapse">
                        <i data-feather="airplay"></i>
                        <span class="badge badge-success badge-pill float-right">4</span>
                        <span> Dashboards </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('any', 'dashboard')}}">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="{{route('any', 'dashboard-2')}}">Dashboard 2</a>
                            </li>
                            <li>
                                <a href="{{route('any', 'dashboard-3')}}">Dashboard 3</a>
                            </li>
                            <li>
                                <a href="{{route('any', 'dashboard-4')}}">Dashboard 4</a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <li>
                    <a href="{{route('second', ['crm', 'admin'])}}" class="isDisabled">
                        <i data-feather="airplay"></i>
                        <span> ADMIN </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('advertiser.index')}}">
                        <i data-feather="users"></i>
                        <span> TEAM MEMBERS </span>
                    </a>
                </li>
                

                <li>
                    <a href="{{route('advertiser.index')}}">
                        <i data-feather="briefcase"></i>
                        <span> ADVERTISERS </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('second', ['crm', 'publishers'])}}">
                        <i data-feather="package"></i>
                        <span> PUBLISHERS </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('second', ['crm', 'feeds'])}}"  class="isDisabled">
                        <i data-feather="users"></i>
                        <span> FEEDS </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('second', ['crm', 'channels'])}}"  class="isDisabled">
                        <i data-feather="file-text"></i>
                        <span> CHANNELS </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('second', ['crm', 'reports'])}}"  class="isDisabled">
                        <i data-feather="book"></i>
                        <span> REPORTS </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('second', ['crm', 'finances'])}}"  class="isDisabled">
                        <i data-feather="shopping-cart"></i>
                        <span> FINANCE </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('second', ['crm', 'settings'])}}">
                        <i class="fe-settings"></i>
                        <span> SETTINGS </span>
                    </a>
                </li>

                <?php /*li>
                    <a href="#sidebarEcommerce" data-toggle="collapse">
                        <i data-feather="shopping-cart"></i>
                        <span> Ecommerce </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('second', ['ecommerce', 'dashboard'])}}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['ecommerce', 'products'])}}">Products</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['ecommerce', 'product-detail'])}}">Product Detail</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['ecommerce', 'product-edit'])}}">Add Product</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['ecommerce', 'customers'])}}">Customers</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['ecommerce', 'orders'])}}">Orders</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['ecommerce', 'order-detail'])}}">Order Detail</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['ecommerce', 'sellers'])}}">Sellers</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['ecommerce', 'cart'])}}">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['ecommerce', 'checkout'])}}">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarCrm" data-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> CRM </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('second', ['crm', 'dashboard'])}}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['crm', 'contacts'])}}">Contacts</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['crm', 'opportunities'])}}">Opportunities</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['crm', 'leads'])}}">Leads</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['crm', 'customers'])}}">Customers</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarProjects" data-toggle="collapse">
                        <i data-feather="briefcase"></i>
                        <span> Projects </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProjects">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('second', ['project', 'list'])}}">List</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['project', 'detail'])}}">Detail</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['project', 'create'])}}">Create Project</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarContacts" data-toggle="collapse">
                        <i data-feather="book"></i>
                        <span> Contacts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarContacts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('second', ['contacts', 'list'])}}">Members List</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['contacts', 'profile'])}}">Profile</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{route('second', ['apps', 'file-manager'])}}">
                        <i data-feather="folder-plus"></i>
                        <span> File Manager </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Custom</li>

                <li>
                    <a href="#sidebarAuth" data-toggle="collapse">
                        <i data-feather="file-text"></i>
                        <span> Auth Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('second', ['auth', 'login'])}}">Log In</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'login-2'])}}">Log In 2</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'register'])}}">Register</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'register-2'])}}">Register 2</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'signin-signup'])}}">Signin - Signup</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'signin-signup-2'])}}">Signin - Signup 2</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'recoverpw'])}}">Recover Password</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'recoverpw-2'])}}">Recover Password 2</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'lock-screen'])}}">Lock Screen</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'lock-screen-2'])}}">Lock Screen 2</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'logout'])}}">Logout</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'logout-2'])}}">Logout 2</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'confirm-mail'])}}">Confirm Mail</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['auth', 'confirm-mail-2'])}}">Confirm Mail 2</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarExpages" data-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Extra Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('second', ['pages', 'starter'])}}">Starter</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', 'timeline'])}}">Timeline</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', 'sitemap'])}}">Sitemap</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', 'invoice'])}}">Invoice</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', 'faqs'])}}">FAQs</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', 'search-results'])}}">Search Results</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', 'pricing'])}}">Pricing</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', 'maintenance'])}}">Maintenance</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', 'coming-soon'])}}">Coming Soon</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', 'gallery'])}}">Gallery</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', '404'])}}">Error 404</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', '404-two'])}}">Error 404 Two</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', '404-alt'])}}">Error 404-alt</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', '500'])}}">Error 500</a>
                            </li>
                            <li>
                                <a href="{{route('second', ['pages', '500-two'])}}">Error 500 Two</a>
                            </li>
                        </ul>
                    </div>
                </li */?>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
