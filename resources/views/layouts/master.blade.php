<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@stack('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="https://arwics.com/favicon.png">

    <!-- Bootstrap Css -->
    <link href="{{ URL::to('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/css/bootstrap-dark.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />

    <!-- Icons Css -->
    <link href="{{ URL::to('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::to('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('assets/css/app-dark.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/css3-mediaqueries-js@1.0.0/css3-mediaqueries.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">

    @stack('css')

    <style>
        .page-content{
            background-color: black;
            padding-top: 60px!important;
        }
        .main-content{
            background-color: black
        }
        ::-webkit-scrollbar {


    width: 0;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
}
        @media only screen and (max-width: 1600px) {


            .page-content {
                padding-top:10px!important;
            }
        }
    </style>
</head>

<body data-topbar="dark" data-layout="horizontal" style="padding: 0!important;">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('layouts.header')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div style="width: 100vw;">
                    @yield('content')
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            ©
                            <script>document.write(new Date().getFullYear())</script> ARWICS <span
                                class="d-none d-sm-inline-block"></span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ URL::to('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ URL::to('assets/libs/morris.js/morris.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/raphael/raphael.min.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @stack('js')
    <script src="{{ URL::to('assets/js/pages/dashboard.init.js') }}"></script>

    <script src="{{ URL::to('assets/js/pages/fontawesome.init.js') }}"></script>


    <!-- App js -->
    <script src="{{ URL::to('assets/js/app.js') }}"></script>
</body>

</html>
