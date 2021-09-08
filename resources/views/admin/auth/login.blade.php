
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | Admin - Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://arwics.com/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"/>

    <!-- Bootstrap Core Css -->
    <link href="{{ URL::to('admin/assets/plugins/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet"/>

    <!-- Font Awesome Css -->
    <link href="{{ URL::to('admin/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>

    <!-- iCheck Css -->
    <link href="{{ URL::to('admin/assets/plugins/iCheck/skins/square/_all.css') }}" rel="stylesheet"/>

    <script src="https://cdn.jsdelivr.net/npm/css3-mediaqueries-js@1.0.0/css3-mediaqueries.js"></script>

    <!-- Custom Css -->
    <link href="{{ URL::to('admin/assets/css/style.css') }}" rel="stylesheet"/>

    <script src="https://cdn.jsdelivr.net/npm/css3-mediaqueries-js@1.0.0/css3-mediaqueries.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">

</head>
<body class="sign-in-page" style="background-color:#222222;">
    <div class="signin-form-area">
        <h1><b>Admin</b> - Dashboard</h1>
        <div class="signin-top-info">Selamat Datang !</div>
        <div class="row padding-15">
            <div class="col-sm-2 col-md-2 col-lg-4"></div>
            <div class="col-sm-8 col-md-8 col-lg-4">
                <form id="formLogin">
                    @csrf
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username" required/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="container-fluid">
                            <div class="form-group has-feedback">
                                <div class="captcha">
                                    <span>{!! captcha_img() !!}</span>
                                        <button type="button" style="height: 50px;" class="btn btn-danger" class="reload" id="reload">↻</button>
                                    </div>
                                <br>
                                <div class="mb-3">
                                    <input id="captcha" required type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck m-l--20">
                                <label><input type="checkbox" id="remember_me" name="remember_me"> Remember Me</label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" id="button_login" class="btn btn-success btn-block">Log In</button>
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
            <p><b>&copy; 2021 Web Admin Dashboard Monitoring</b>. All rights reserved.</p>
        </div>
    </div>
    {{-- <div class="signin-bottom-info">
        <a href="sign-up.html">
            <i class="fa fa-user-circle-o m-r-5"></i>Register Now!
        </a>
        <a href="forgot-password.html" class="pull-right">Forgot Password
            <i class="fa fa-unlock m-l-5 font-14"></i>
        </a>
    </div> --}}

    <!-- Jquery Core Js -->
    <script src="{{ URL::to('admin/assets/plugins/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ URL::to('admin/assets/plugins/bootstrap/dist/js/bootstrap.js') }}"></script>

    <!-- iCheck Js -->
    <script src="{{ URL::to('admin/assets/plugins/iCheck/icheck.js') }}"></script>

    <!-- Jquery Validation Js -->
    <script src="{{ URL::to('admin/assets/plugins/jquery-validation/dist/jquery.validate.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ URL::to('admin/assets/js/pages/examples/signin.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: `{{ url('admin/refreshCaptcha') }}`,
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
        $(document).ready(function () {
            function reset()
            {
                $('input').val('');
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            });
            function reset() {
                $("input").val('');
            }
            $("#formLogin").on('submit', function (e) {
                e.preventDefault();
                let form = $("#formLogin").serialize();
                $.ajax({
                    type: "post",
                    url: `{{ url('admin/postlogin') }}`,
                    data: form,
                    dataType: "json",
                    beforeSend: function () {
                        $('#button_login').html(`<?xml version="1.0" encoding="utf-8"?>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(22, 160, 133); display: block; shape-rendering: auto;" width="50px" height="25px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
<g transform="rotate(0 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#107360">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(30 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#107360">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(60 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#107360">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(90 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#107360">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(120 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#107360">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(150 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#107360">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(180 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#107360">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(210 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#107360">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(240 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#107360">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(270 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#107360">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(300 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#107360">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(330 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#107360">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate>
  </rect>
</g>
<!-- [ldio] generated by https://loading.io/ --></svg>`);
                        $('#button_login').attr('disabled', true);
                    },
                    success: function (response) {
                        $('#button_login').html("Log In");
                        $('#button_login').removeAttr('disabled');
                        if (response.status == 1) {
                            Swal.fire({
                                icon:  'success',
                                title: 'Berhasil',
                                text:  'Berhasil Login Admin !',
                            });
                            window.location.href = `{{url('admin/dashboard')}}`;
                        } else if (response.status == 2) {
                            Toast.fire({
                                icon: 'warning',
                                title: 'User Already Login !'
                            })
                        } else if (response.status == 3) {
                            Toast.fire({
                                icon: 'error',
                                title: 'Username Atau Password Tidak Valid !'
                            })
                        } else if(response.status == 4){
                            Toast.fire({
                                icon: 'warning',
                                title: 'Harap Isi Captcha Terlebih Dahulu !'
                            })

                        } else if(response.status == 5){
                            Toast.fire({
                                icon: 'warning',
                                title: 'Silahkan Masukkan Username dan Password Admin !'
                            })

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Gagal Login !'
                            })

                            reset();
                        }
                    },
                    complete: function () {
                        $('#button_login').removeAttr('disabled');
                        $('#button_login').html("Log In");
                    }
                });
            });
        });
</script>
</body>
</html>
