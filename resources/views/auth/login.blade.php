
<!DOCTYPE html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>{{ $judul }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="https://arwics.com/favicon.png">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        {!! NoCaptcha::renderJs() !!}
        <script src="https://cdn.jsdelivr.net/npm/css3-mediaqueries-js@1.0.0/css3-mediaqueries.js"></script>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">
        <style>

        </style>
    </head>

    <body data-topbar="dark" style="background-color:#000000;">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden" style="background-color:#222222;">
                            <div class="card-body pt-0">

                                <h3 class="text-center mt-5 mb-4">
                                    <a href="#" class="d-block auth-logo">
                                        <img src="{{ asset('assets/images/logo.png') }}" alt=""style="width:150px;height:90px;object-fit: contain; opacity:0.5;"  class="auth-logo-dark">
                                        <img src="{{ asset('assets/images/logo.png') }}" alt="" height="30" class="auth-logo-light">
                                    </a>
                                </h3>

                                <div class="p-3">
                                    <center><h4 style="color:#ffffff;">Welcome Back !</h4></center>
                                    <center><p style="color:#ffffff;">Sign in to continue to {{ $nama }}.</p></center>
                                    <form class="form-horizontal mt-4" id="formLogin">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" style="color:#ffffff;">Username</label>
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword" style="color:#ffffff;">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword" style="color:#ffffff;">Captcha</label>
                                            {!! app('captcha')->display() !!}
                                        </div>

                                        <div class="mb-3 row mt-4">
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="remember_me" id="customControlInline">
                                                    <label class="form-check-label" for="customControlInline" style="color:#ffffff;">Remember me
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit" id="button_login">Log In</button>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-4">
                                                <a href="#" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            © <script>document.write(new Date().getFullYear())</script> ARWICS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

            <script type="text/javascript">
                $(document).ready(function () {
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
                            url: `{{ url('postlogin') }}`,
                            data: form,
                            dataType: "json",
                            beforeSend: function () {
                                $('#button_login').html("Memproses....");
                                $('#button_login').attr('disabled', true);
                            },
                            success: function (response) {
                                $('#button_login').html("Log In");
                                $('#button_login').removeAttr('disabled');
                                if (response.message == 1) {
                                    Swal.fire({
                                        icon:  'success',
                                        title: 'Berhasil',
                                        text:  'Berhasil Login Management!',
                                    });
                                    window.location.href = `{{url('management/dashboard')}}`;
                                } else if (response.message == 2) {
                                    Swal.fire({
                                        icon:  'success',
                                        title: 'Berhasil',
                                        text:  'Berhasil Login Partner!',
                                    });
                                    window.location.href = `{{url('partner/dashboard')}}`;
                                } else if (response.status == 3) {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Username Atau Password Tidak Valid !'
                                    })
                                } else if (response.status == 6) {
                                    Toast.fire({
                                        icon: 'warning',
                                        title: 'User Already Login !'
                                    })
                                } else if(response.status == 5){
                                    Toast.fire({
                                        icon: 'warning',
                                        title: 'Harap Isi Captcha Terlebih Dahulu !'
                                    })
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Gagal Login !'
                                    })
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

