<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $judul }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/loginForm.css') }}">


    <script src="https://cdn.jsdelivr.net/npm/css3-mediaqueries-js@1.0.0/css3-mediaqueries.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">
    <style>
        body {
            background: #020202;
            border-radius: 10px;
        }

    </style>
       {!! NoCaptcha::renderJs() !!}
</head>

<body>
    <div class='login'>
        <div class='login_title'>
            <span>Login to your account {{ $nama }}</span>
        </div>

        <form id="formLogin">
            @csrf
            <div class='login_fields'>
                <div class='login_fields__user'>
                    <div class='icon'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/user_icon_copy.png'>
                    </div>
                    <input placeholder='Username' type='text' id="username" name="username" required>
                    <div class='validation'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png'>
                    </div>
                </div>
                <div class='login_fields__password'>
                    <div class='icon'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/lock_icon_copy.png'>
                    </div>
                    <input placeholder='Password' type='password' id="password" name="password" required>
                    <div class='validation'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png'>
                    </div>
                </div>
                <br><br>
                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        {!! app('captcha')->display() !!}
                    </div>
                </div>

                <div class='login_fields__submit'>
                    <input type='submit' value='Log In' id="button_login">

                </div>
            </div>
        </form>
    </div>
    <div class='authent'>
        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/puff.svg'>
        <p>Authenticating...</p>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

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

            function input() {

                $('#username, #password').focus(function () {
                    $(this).prev().animate({
                        'opacity': '1'
                    }, 200)
                });
                $('#username, #password').blur(function () {
                    $(this).prev().animate({
                        'opacity': '.5'
                    }, 200)
                });

                $('#username, #password').keyup(function () {
                    if (!$(this).val() == '') {
                        $(this).next().animate({
                            'opacity': '1',
                            'right': '30'
                        }, 200)
                    } else {
                        $(this).next().animate({
                            'opacity': '0',
                            'right': '20'
                        }, 200)
                    }
                });

                var open = 0;
                $('.tab').click(function () {
                    $(this).fadeOut(200, function () {
                        $(this).parent().animate({
                            'left': '0'
                        })
                    });
                });
            }
            $("#formLogin").on('submit', function (e) {
                e.preventDefault();
                input();
                let form = $("#formLogin").serialize();
                $.ajax({
                    type: "post",
                    url: `{{ url('postLogin') }}`,
                    data: form,
                    dataType: "json",
                    beforeSend: function () {
                        $('.login').addClass('test')
                        setTimeout(function () {
                            $('.login').addClass('testtwo')
                        }, 300);
                        setTimeout(function () {
                            $(".authent").show().animate({
                                right: -320
                            }, {
                                easing: 'easeOutQuint',
                                duration: 600,
                                queue: false
                            });
                            $(".authent").animate({
                                opacity: 1
                            }, {
                                duration: 200,
                                queue: false
                            }).addClass('visible');
                        }, 500);
                        setTimeout(function () {
                            $(".authent").show().animate({
                                right: 90
                            }, {
                                easing: 'easeOutQuint',
                                duration: 600,
                                queue: false
                            });
                            $(".authent").animate({
                                opacity: 0
                            }, {
                                duration: 200,
                                queue: false
                            }).addClass('visible');
                            $('.login').removeClass('testtwo')
                        }, 2500);
                        setTimeout(function () {
                            $('.login').removeClass('test')
                            $('.login div').fadeIn();
                        }, 2800);
                        $('#button_login').html("Memproses....");
                        $('#button_login').attr('disabled', true);
                    },
                    success: function (response) {
                        $('#button_login').html("Log In");
                        $('#button_login').removeAttr('disabled');
                        if (response.message == 1) {
                            window.location.href = `{{url('management/dashboard')}}`;
                        } else if (response.message == 2) {
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
                        } else {
                            Toast.fire({
                                icon: 'warning',
                                title: 'Harap Isi Captcha Terlebih Dahulu !'
                            })
                        }
                    },
                    complete: function () {
                        input();
                        $('#button_login').removeAttr('disabled');
                    }
                });
            });
        });

    </script>
</body>

</html>
