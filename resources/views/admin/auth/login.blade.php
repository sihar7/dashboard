
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sign In | Admin - Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('admin/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"/>

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('admin/assets/plugins/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet"/>

    <!-- Font Awesome Css -->
    <link href="{{ asset('admin/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>

    <!-- iCheck Css -->
    <link href="{{ asset('admin/assets/plugins/iCheck/skins/square/_all.css') }}" rel="stylesheet"/>

    {!! NoCaptcha::renderJs() !!}
    <script src="https://cdn.jsdelivr.net/npm/css3-mediaqueries-js@1.0.0/css3-mediaqueries.js"></script>
       
    <!-- Custom Css -->
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet"/>

    <style>
        .g-recaptcha {
            transform:scale(0.77);
            transform-origin:0 0;
            -webkit-transform-origin: 0 0;
            -webkit-transform: scale(0.77);
        }
    </style>
</head>
<body class="sign-in-page" style="background-color:#222222;">
    <div class="signin-form-area">
        <h1><b>Admin</b> - Dashboard</h1>
        <div class="signin-top-info">Sign in to start your session</div>
        <div class="row padding-15">
            <div class="col-sm-2 col-md-2 col-lg-4"></div>
            <div class="col-sm-8 col-md-8 col-lg-4">
                <form id="data-master">
                    @csrf
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Username" name="username" id="username" required/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                               required/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="container-fluid">      
                            <div class="form-group has-feedback">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck m-l--20">
                                <label><input type="checkbox" name="remember_me"> Remember Me</label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" id="button_login" class="btn btn-success btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-4"></div>
        </div>
    </div>
    <div class="signin-right-image">
        <div class="background-layer"></div>
        <div class="copyright-info">
            This photo taken from <b>Unsplash.com</b>
            <p><b>&copy; 2016-2017 AdminBSB - Sensitive</b>. All rights reserved.</p>
        </div>
    </div>
    <div class="signin-bottom-info">
        <a href="sign-up.html">
            <i class="fa fa-user-circle-o m-r-5"></i>Register Now!
        </a>
        <a href="forgot-password.html" class="pull-right">Forgot Password
            <i class="fa fa-unlock m-l-5 font-14"></i>
        </a>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('admin/assets/plugins/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('admin/assets/plugins/bootstrap/dist/js/bootstrap.js') }}"></script>

    <!-- iCheck Js -->
    <script src="{{ asset('admin/assets/plugins/iCheck/icheck.js') }}"></script>

    <!-- Jquery Validation Js -->
    <script src="{{ asset('admin/assets/plugins/jquery-validation/dist/jquery.validate.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('admin/assets/js/pages/examples/signin.js') }}"></script>
</body>
</html>
