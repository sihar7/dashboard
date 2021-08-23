<header>
    <nav class="navbar navbar-default">

        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="material-icons">swap_vert</i>
                </button>
                <a href="javascript:void(0);" class="left-toggle-left-sidebar js-left-toggle-left-sidebar">
                    <i class="material-icons">menu</i>
                </a>
                <!-- Logo -->
                <a class="navbar-brand" href="index-2.html">
                    <span class="logo-minimized">AD</span>
                    <span class="logo">Admin - Dashboard</span>
                </a>
                <!-- #END# Logo -->
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="javascript:void(0);" class="toggle-left-sidebar js-toggle-left-sidebar">
                            <i class="material-icons">menu</i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Fullscreen Request -->
                    <li>
                        <a href="javascript:void(0);" class="fullscreen js-fullscreen">
                            <i class="material-icons">fullscreen</i>
                        </a>
                    </li>
                    <!-- #END# Fullscreen Request -->

                    <!-- User Menu -->
                    <li class="dropdown user-menu">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ URL::to('admin/assets/images/avatars/face2.jpg') }}" alt="User Avatar" />
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                <img src="{{ URL::to('admin/assets/images/avatars/face2.jpg') }}" alt="User Avatar" />
                                <div class="user">
                                    {{ Auth::user()->name }}
                                    <div class="title">Admin</div>
                                </div>
                            </li>
                            <li class="body">
                                <ul>
                                    {{-- <li>
                                        <a href="pages/miscellaneous/profile.html">
                                            <i class="material-icons">account_circle</i> Profile
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="javascript:void(0);">
                                            <i class="material-icons">lock_open</i> Change Password
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <div class="row clearfix">
                                    {{-- <div class="col-xs-5">
                                        <a href="pages/examples/locked-screen.html" class="btn btn-default btn-sm btn-block">Log Off</a>
                                    </div> --}}
                                    <div class="col-xs-2"></div>
                                    <div class="col-xs-5">
                                        <form method="post" action="{{ url('admin/logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-default btn-sm btn-block">Log Out</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# User Menu -->
                    {{-- <li class="pull-right">
                        <a href="javascript:void(0);" class="js-right-sidebar" data-close="true">
                            <i class="material-icons">more_vert</i>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
</header>
