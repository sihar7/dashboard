
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@stack('mytitle')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="https://arwics.com/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ URL::to('admin/assets/plugins/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet" />

    <!-- Animate.css Css -->
    <link href="{{ URL::to('admin/assets/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Font Awesome Css -->
    <link href="{{ URL::to('admin/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- iCheck Css -->
    <link href="{{ URL::to('admin/assets/plugins/iCheck/skins/flat/_all.css') }}" rel="stylesheet" />

    <!-- Switchery Css -->
    <link href="{{ URL::to('admin/assets/plugins/switchery/dist/switchery.css') }}" rel="stylesheet" />

    <!-- Metis Menu Css -->
    <link href="{{ URL::to('admin/assets/plugins/metisMenu/dist/metisMenu.css') }}" rel="stylesheet" />

    <!-- Jquery Datatables Css -->
    <link href="{{ URL::to('admin/assets/plugins/DataTables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet" />

    <!-- Pace Loader Css -->
    <link href="{{ URL::to('admin/assets/plugins/pace/themes/white/pace-theme-flash.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ URL::to('admin/assets/css/style.css') }}" rel="stylesheet" />

    @stack('mycss')

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ URL::to('admin/assets/css/themes/allthemes.css') }}" rel="stylesheet" />

    {{-- <!-- Demo Purpose Only -->
    <link href="{{ URL::to('admin/assets/css/demo/setting-box.css') }}" rel="stylesheet" /> --}}
</head>

<body>
    <div class="all-content-wrapper">
        <!-- Top Bar -->
        @include('admin.layouts.header')
        <!-- #END# Top Bar -->
        <!-- Left Menu -->
        @include('admin.layouts.sidebar')
        <!-- #END# Left Menu -->

        <section class="content dashboard">
            <!-- Dashboard Heading -->
            {{-- <div class="dashboard-heading">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <h1>
                            DASHBOARD
                            <small>Lorem ipsum dolor sit amet, ut sea</small>
                        </h1>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                        <div class="graph">
                            <div class="stats">
                                23 400<small>unique visitors</small>
                            </div>
                            <span data-type="bar" data-sparkline="true">5,7,5,4,8,8,7,12,9,9,5,8,8,8,12,14,20,16,14,20,12,10,14,8,4,4,5,7,8</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                        <div class="graph">
                            <div class="stats">
                                12 400<small>page views</small>
                            </div>
                            <span data-type="bar" data-sparkline="true">5,7,5,12,9,9,5,8,8,8,12,14,20,16,14,20,12,10,14,8,4,4,5,7,8</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                        <div class="graph">
                            <div class="stats">
                                $52 750<small>sales</small>
                            </div>
                            <span data-type="bar" data-sparkline="true">3,4,3,7,12,9,9,5,8,8,8,12,14,20,16,14,20,12,10,14,8,4,4,5,7,8</span>
                        </div>
                    </div>
                </div>
            </div> --}}
            @stack('myheading')
            <!-- #END# Dashboard Heading -->

            <div class="page-body">
                @yield('content')
            </div>
        </section>
        <!-- Footer -->
        <footer>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        Copyright &copy; 2021, <b>Admin - Dashboard</b>
                    </div>
                    {{-- <div class="col-sm-6 align-right">
                        Hand-crafted & Made with love :)
                    </div> --}}
                </div>
            </div>
        </footer>
        <!-- #END# Footer -->
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ URL::to('admin/assets/plugins/jquery/dist/jquery.min.js') }}"></script>

    <!-- JQuery UI Js -->
    <script src="{{ URL::to('admin/assets/plugins/jquery-ui/jquery-ui.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ URL::to('admin/assets/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Pace Loader Js -->
    <script src="{{ URL::to('admin/assets/plugins/pace/pace.js') }}"></script>

    <!-- Screenfull Js -->
    <script src="{{ URL::to('admin/assets/plugins/screenfull/src/screenfull.js') }}"></script>

    <!-- Metis Menu Js -->
    <script src="{{ URL::to('admin/assets/plugins/metisMenu/dist/metisMenu.js') }}"></script>

    <!-- Jquery Slimscroll Js -->
    <script src="{{ URL::to('admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Switchery Js -->
    <script src="{{ URL::to('admin/assets/plugins/switchery/dist/switchery.js') }}"></script>

    <!-- iCheck Js -->
    <script src="{{ URL::to('admin/assets/plugins/iCheck/icheck.js') }}"></script>

    <!-- Jquery Sparkline Js -->
    <script src="{{ URL::to('admin/assets/plugins/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>

    <!-- Flot Chart Js -->
    <script src="{{ URL::to('admin/assets/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/flot-spline/js/jquery.flot.spline.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/flot/jquery.flot.time.js') }}"></script>

    <!-- JQuery Datatables Js -->
    <script src="{{ URL::to('admin/assets/plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/DataTables/media/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/DataTables/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/DataTables/extensions/export/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/DataTables/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/DataTables/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/DataTables/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/DataTables/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/DataTables/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::to('admin/assets/plugins/DataTables/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Peity Js -->
    <script src="{{ URL::to('admin/assets/plugins/peity/jquery.peity.js') }}"></script>

    @stack('myjs')
    <!-- Custom Js -->
    <script src="{{ URL::to('admin/assets/js/admin.js') }}"></script>
    <script src="{{ URL::to('admin/assets/js/pages/dashboard/dashboard.js') }}"></script>

    <!-- Google Analytics Code -->
    <script src="{{ URL::to('admin/assets/js/google-analytics.js') }}"></script>

    <!-- Demo Purpose Only -->
    <script src="{{ URL::to('admin/assets/js/demo.js') }}"></script>
</body>


</html>
