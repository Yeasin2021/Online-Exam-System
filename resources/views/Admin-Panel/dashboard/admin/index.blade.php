<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="IE=edge" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <title>Admin Dashboard</title>
        <!-- loader-->
        <link href="{{ asset('dashboard') }}/assets/css/pace.min.css" rel="stylesheet" />
        <script src="{{ asset('dashboard') }}/assets/js/pace.min.js"></script>
        <!--favicon-->
        <link href="{{ asset('dashboard') }}/assets/images/favicon.ico" rel="icon" type="image/x-icon" />
        <!-- simplebar CSS-->
        <link href="{{ asset('dashboard') }}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
        <!-- Bootstrap core CSS-->
        <link href="{{ asset('dashboard') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
        <!-- animate CSS-->
        <link href="{{ asset('dashboard') }}/assets/css/animate.css" rel="stylesheet" type="text/css" />
        <!-- Icons CSS-->
        <link href="{{ asset('dashboard') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <!-- Metismenu CSS-->
        <link href="{{ asset('dashboard') }}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
        <!-- Custom Style-->
        <link href="{{ asset('dashboard') }}/assets/css/app-style.css" rel="stylesheet" />
    </head>
    <body class="bg-theme bg-theme1">
        <!-- Start wrapper-->
        <div id="wrapper">
            <!--Start sidebar-wrapper-->
            @include('Admin-Panel.dashboard.admin.sidebar')
            <!--End sidebar-wrapper--><!--Start topbar header-->
            @include('Admin-Panel.dashboard.admin.header')
            <!--End topbar header-->
            <div class="clearfix"></div>
            <div class="content-wrapper">
                <div class="container-fluid">
                    @include('Admin-Panel.dashboard.admin.breadcumb')
                        @yield('content')
                    <!--start overlay-->
                    <div class="overlay"></div>
                    <!--end overlay-->
                </div>
                <!-- End container-fluid-->
            </div>
            <!--End content-wrapper-->
            <!--Start Back To Top Button-->
            <a class="back-to-top" href="javaScript:void();"><i class="fa fa-angle-double-up"></i></a>
            <!--End Back To Top Button-->
            <!--Start footer-->
            @include('Admin-Panel.dashboard.admin.footer')
            <!--End footer-->
            <!--start color switcher-->
            <div class="right-sidebar">
                <div class="switcher-icon"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></div>
                <div class="right-sidebar-content">
                    <p class="mb-0">Gaussion Texture</p>
                    <hr />
                    <ul class="switcher">
                        <li id="theme1"></li>
                        <li id="theme2"></li>
                        <li id="theme3"></li>
                        <li id="theme4"></li>
                        <li id="theme5"></li>
                        <li id="theme6"></li>
                    </ul>
                    <p class="mb-0">Gradient Background</p>
                    <hr />
                    <ul class="switcher">
                        <li id="theme7"></li>
                        <li id="theme8"></li>
                        <li id="theme9"></li>
                        <li id="theme10"></li>
                        <li id="theme11"></li>
                        <li id="theme12"></li>
                        <li id="theme13"></li>
                        <li id="theme14"></li>
                        <li id="theme15"></li>
                    </ul>
                </div>
            </div>
            <!--end color switcher-->
        </div>
        <!--End wrapper-->
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('dashboard') }}/assets/js/jquery.min.js"></script>
        <script src="{{ asset('dashboard') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('dashboard') }}/assets/js/bootstrap.min.js"></script>
        <!-- simplebar js -->
        <script src="{{ asset('dashboard') }}/assets/plugins/simplebar/js/simplebar.js"></script>
        <!-- Metismenu js -->
        <script src="{{ asset('dashboard') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <!-- Custom scripts -->
        <script src="{{ asset('dashboard') }}/assets/js/app-script.js"></script>
        <!-- Chart js -->
        <script src="{{ asset('dashboard') }}/assets/plugins/Chart.js/Chart.min.js"></script>
        <!--Peity Chart -->
        <script src="{{ asset('dashboard') }}/assets/plugins/peity/jquery.peity.min.js"></script>
        <!-- Index2 js -->
        <script src="{{ asset('dashboard') }}/assets/js/dashboard-service-support.js"></script>
    </body>
</html>
