<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>@yield('pagetitle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="@yield('keywords')" name="keywords" />
    <meta content="@yield('description')" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('backend/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('backend/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    @yield('css-content')
</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="{{ asset('backend/images/logo-light.png') }}" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                @yield('page-content')
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                {{ date('Y') }} Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('backend/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/plugins.js') }}"></script> --}}
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>

    <!-- particles js -->
    <script src="{{ asset('backend/libs/particles.js/particles.js') }}"></script>
    <!-- particles app js -->
    <script src="{{ asset('backend/js/pages/particles.app.js') }}"></script>
    <!-- password-addon init -->
    <script src="{{ asset('backend/js/customjs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/customjs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('backend/js/customjs/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/password-addon.init.js') }}"></script>
    <script src="{{ asset('backend/js/customjs/comman_function.js') }}"></script>
    <script src="{{ asset('backend/js/customjs/ajaxfileupload.js') }}"></script>
    <script src="{{ asset('backend/js/customjs/jquery.form.min.js') }}"></script>



    @yield('js-content')
</body>
</html>
