<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Court Management System</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>


<body 
class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  " 
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto">
                                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                    <i class="ficon feather icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                        </ul>
                        <ul class="nav navbar-nav">
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-bold-600">John Doe</span>
                                    <span class="user-status">Available</span>
                                </div>
                                <span>
                                    <img class="round" src="{{ asset('app-assets/images/portrait/small/avatar-s-11.png')}}" alt="avatar" height="40" width="40">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/settings">
                                    <i class="feather icon-user"></i>Settings 
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">
                                    <i class="feather icon-power"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="/admin/dashboard">
                        <h2 class="brand-text mb-0">CMSystem</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                        <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ Request::is('admin/dashboard') ? 'active': '' }} nav-item">
                    <a href="/admin/dashboard">
                        <span class="menu-item" data-i18n="Analytics">Dashboard</span>
                    </a>
                </li>
                @if (isAdmin())
                    <li class=" navigation-header"><span>User Management</span>
                    </li>
                    <li class="{{  Request::is('admin/newuser') ? 'active': '' }} nav-item">
                        <a href="/admin/newuser">
                            <i class="feather  icon-user"></i>
                            <span class="menu-title" data-i18n="Email">Create Admin</span>
                        </a>
                    </li>
                    <li class="{{  Request::is('admin/viewuser') ? 'active': '' }} nav-item">
                        <a href="/admin/viewuser">
                            <i class="feather  icon-users"></i>
                            <span class="menu-title" data-i18n="Chat">View Admin</span>
                        </a>
                    </li>
                        
                @endif


                <li class=" navigation-header"><span>Court Setup</span>
                </li>
                @if (isAdmin())
                    <li class="{{  Request::is('admin/newcourt') ? 'active': '' }} nav-item">
                        <a href="/admin/newcourt">
                            <i class="feather icon-grid"></i>
                            <span class="menu-title" data-i18n="Chat">New Court</span>
                        </a>
                    </li>
                @endif
                <li class="{{  Request::is('admin/viewcourt*') ? 'active': '' }} nav-item">
                    <a href="/admin/viewcourt">
                        <i class="feather icon-grid"></i>
                        <span class="menu-title" data-i18n="Chat">View Court</span>
                    </a>
                </li>
                <li class=" navigation-header"><span>Case Setup</span>
                </li> 
                @if (isAdmin())
                    <li class="{{  Request::is('admin/newcasetype') ? 'active': '' }} nav-item">
                        <a href="/admin/newcasetype">
                            <i class="feather icon-grid"></i>
                            <span class="menu-title" data-i18n="Chat">New Case Type</span>
                        </a>
                    </li>
                @endif
                <li class="{{  Request::is('admin/viewcasetype') ? 'active': '' }} nav-item">
                    <a href="/admin/viewcasetype">
                        <i class="feather icon-grid"></i>
                        <span class="menu-title" data-i18n="Chat">View Case Type</span>
                    </a>
                </li>
                <li class=" navigation-header"><span>Court Notice </span>
                </li>
                @if (isRegistrar())
                    <li class=" {{  Request::is('admin/newnotice') ? 'active': '' }} nav-item">
                        <a href="/admin/newnotice">
                            <i class="feather icon-grid"></i>
                            <span class="menu-title" data-i18n="Chat">New Notice</span>
                        </a>
                    </li>
                @endif

                @if (!isJudge())
                    <li class="{{  Request::is('admin/viewnotice') ? 'active': '' }} nav-item">
                        <a href="/admin/viewnotice">
                            <i class="feather icon-grid"></i>
                            <span class="menu-title" data-i18n="Chat">View Notice</span>
                        </a>
                    </li>
                @endif
                @if (isJudge())
                    <li class="{{  Request::is('admin/viewmynotice') ? 'active': '' }} nav-item">
                        <a href="/admin/viewmynotice">
                            <i class="feather icon-grid"></i>
                            <span class="menu-title" data-i18n="Chat">View My Notice</span>
                        </a>
                    </li>
                @endif
                <li class=" navigation-header"><span>Court Case</span>
                </li>
                @if (isRegistrar())
                    <li class="{{  Request::is('admin/newcourtcase') ? 'active': '' }} nav-item">
                        <a href="/admin/newcourtcase">
                            <i class="feather icon-grid"></i>
                            <span class="menu-title" data-i18n="Chat">New Case</span>
                        </a>
                    </li>
                @endif
                @if (!isJudge())
                    <li class="{{  Request::is('admin/viewcase') ? 'active': '' }} nav-item">
                        <a href="/admin/viewcase">
                            <i class="feather icon-grid"></i>
                            <span class="menu-title" data-i18n="Chat">View Case</span>
                        </a>
                    </li>
                @endif

                @if (isJudge())
                    <li class="{{  Request::is('admin/viewmycourtcase') ? 'active': '' }} nav-item">
                        <a href="/admin/viewmycourtcase">
                            <i class="feather icon-grid"></i>
                            <span class="menu-title" data-i18n="Chat">My Cases</span>
                        </a>
                    </li>
                @endif
                
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
 
    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{ Date('Y')}}
                All rights Reserved</span>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/tether.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/components.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/datatables/datatable.js')}}"></script>


</body>

</html>