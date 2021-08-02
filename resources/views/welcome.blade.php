<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DASHBOARD</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/css3-mediaqueries-js@1.0.0/css3-mediaqueries.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body {
            position: fixed;
            background: #000000;
            border-radius: 10px;

        }

        .image {
            position: absolute;
            top: 75px;
        }


        .welcome {
            position: absolute;
            width: 612px;
            height: 331px;
            left: 1020px;
            top: 248px;
        }
        .top_bar{
            width: 100vw;
            height: 12vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        @media screen and (max-width: 600px) {
  .row.col-left {
display: none;
  }
}

    </style>
</head>

<body>
    @if (Session::has('message'))
        <div class="alert alert-danger">
        Sesi Login Anda Telah Habis, Silahkan Untuk Login Kembali !
    </div>
    @endif

    <div class="top_bar">
        <div>
            <img src="{{ asset('assets/images/logo.png') }}" style="width:150px;height:90px;object-fit: contain;"/>
        </div>

    </div>
    <div class="row">
        <div class="col-7 col-sm-12 col-lg-7 col-left" style="height:88vh;justify-content:start;align-items:flex-start;display: flex;">
            <img src="assets/images/18438811 [Converted]2-01 1.png" style="object-fit:cover;width: 90%;height: 90%;"/>
        </div>
        <div class=" col-sm-12 col-lg-5  p-0" style="height:88vh;display: flex;align-items: center;justify-content: flex-end;">
                <div style="width: 90%;height: 50%;border-radius: 20px;background-color: #222222;">
                    <div style="width: 100%;height: 50%;padding-right: 0px;text-align: right;padding-right: 30px;">
                        <div style="font-size: 45px;font-weight:bold;color: white;">WELCOME</div>
                        <div style="font-size: 55px;font-weight:bold;color: white;">DASHBOARD</div>

                            </div>
                            <div style="width: 100%;height: 50%;display: flex;justify-content: space-around;align-items: center;">
                               <a href="{{ url('/loginManagement') }}" style="width: 40%;height: 30%;border-radius: 7px;border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white; text-decoration: none;">
                                    Login Management
                                </a>
                               <a href="{{ url('/loginPartner') }}" style="width: 40%;height: 30%;border-radius: 7px;border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white; text-decoration: none;">
                                    Login Partner
                                </a>

                            </div>
                        <div>
                </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>

</html>
