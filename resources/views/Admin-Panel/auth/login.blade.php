<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <!-- loader-->
    <link href="{{ asset('dashboard') }}/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{ asset('dashboard') }}/assets/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="{{ asset('dashboard') }}/assets/images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('dashboard') }}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('dashboard') }}/assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('dashboard') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="{{ asset('dashboard') }}/assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endforeach
                @if(Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Opps !</strong> {{ Session::get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @php
                    Session::forget('error')
                @endphp

                @endif
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="height-100v d-flex align-items-center justify-content-center">

            <div class="card card-authentication1 mb-0">
                <div class="card-body">
                    <div class="card-content p-2">
                        <div class="text-center">
                            <img src="{{ asset('dashboard') }}/assets/images/logo-icon.png" alt="logo icon">
                        </div>
                        <div class="card-title text-uppercase text-center py-3">Sign In</div>
                        <form method="POST" action="login">@csrf
                            <div class="form-group">
                                <label for="exampleInputUsername" class="sr-only">Username</label>
                                <div class="position-relative has-icon-right">
                                    <input type="email" id="exampleInputUsername" class="form-control input-shadow"
                                        placeholder="Enter Email Id" name="email">
                                    <div class="form-control-position">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword" class="sr-only">Password</label>
                                <div class="position-relative has-icon-right">
                                    <input type="password" id="exampleInputPassword" class="form-control input-shadow"
                                        placeholder="Enter Password" name="password">
                                    <div class="form-control-position">
                                        <i class="icon-lock"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <div class="icheck-material-white">
                                        <input type="checkbox" id="user-checkbox" checked="" />
                                        <label for="user-checkbox">Remember me</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 text-right">
                                    <a href="authentication-reset-password.html">Reset Password</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-light btn-block">Sign In</button>
                            <div class="text-center mt-3">Sign In With</div>

                            <div class="form-row mt-4">
                                <div class="form-group mb-0 col-6">
                                    <button type="button" class="btn btn-light btn-block"><i
                                            class="fa fa-facebook-square"></i> Facebook</button>
                                </div>
                                <div class="form-group mb-0 col-6 text-right">
                                    <button type="button" class="btn btn-light btn-block"><i
                                            class="fa fa-twitter-square"></i> Twitter</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card-footer text-center py-3">
                    <p class="text-warning mb-0">Do not have an account? <a href="authentication-signup.html"> Sign Up
                            here</a></p>
                </div>
            </div>
        </div>

        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--start color switcher-->
        <div class="right-sidebar">
            <div class="switcher-icon">
                <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
            </div>
            <div class="right-sidebar-content">

                <p class="mb-0">Gaussion Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>

                <p class="mb-0">Gradient Background</p>
                <hr>

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
    <!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('dashboard') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/bootstrap.min.js"></script>

    <!-- Metismenu js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>

    <!-- Custom scripts -->
    <script src="{{ asset('dashboard') }}/assets/js/app-script.js"></script>

</body>


</html>
