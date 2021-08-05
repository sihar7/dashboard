@extends('layouts.master')

@push('title')
DASHBOARD | ARWICS
@endpush


@push('css')
<link href="{{ URL::to('assets/libs/chartist/chartist.min.css') }}" rel="stylesheet">
<style>
    .telemarketing::-webkit-scrollbar {


        display: none;
        /* Safari and Chrome */

    }

    .telemarketing {
        -ms-overflow-style: none;
        /* Internet Explorer 10+ */
        scrollbar-width: none;
        overflow: auto;
        list-style: none;
        /* Firefox */
        background-color: #222222;
        border-radius: 5px;
    }

    .telemarketing ul {
        list-style: none;
        padding: 0;
        padding-bottom: 10%;
    }


    .telemarketing ul li {
        background-color: #00C637;
        height: 50px;
        margin-top: 4px;
        border-radius: 5px;
    }

    .list_table {
        padding: 2px;

    }

    .list_table ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: inline-flex;

    }

    .list_table ul li {

        width: 100px;
        height: 90%;
        margin-left: 1px;

    }

</style>
@endpush

@section('content')

<div class="row " style="height:43vh">
    <div class="col-xl-2   p-1" style="height: 43vh;">
        <div class="w-100 h-100 p-1 telemarketing">
            <div style="height:20%;width: 100%;display: flex;justify-content: center;align-items: center;">
                <div>
                    Telemarketing
                </div>
            </div>
            <div style="width: 100%;height: 65%;overflow: auto;">
                <ul>
                    @foreach ($getHistoryTele as $historyTele)
                    @if($historyTele->islogin == '1')
                    <li>
                        <div
                            style="height: 60%;width: 100%;display: flex;align-items: center;padding: 5px;font-weight: bold;flex-direction: row;">
                            {{ $historyTele->nama }}

                        </div>
                        <div style="width: 100%;height:40%;padding-left: 5px;">
                            online
                        </div>
                    </li>
                    @else
                    <li style="background-color: #DE0000">
                        <div
                            style="height: 60%;width: 100%;display: flex;align-items: center;padding: 5px;font-weight: bold;flex-direction: row;">
                            {{ $historyTele->nama }}

                        </div>
                        <div style="width: 100%;height:40%;padding-left: 5px;">
                            {{'Aktif'. ' '. \Carbon\Carbon::parse($historyTele->last_login_at)->diffForHumans() }}
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div style="width: 95%;height: 15%;display: flex;justify-content: center;align-items: center;">
                <div style="width: 80%;height: 100%;display: flex;">
                    <div style="width: 40%;height: 100%;display: flex;justify-content: center;align-items: center;">
                        Pages

                    </div>
                    <div style="width: 30%;height: 100%; display: flex;justify-content: center;align-items: center;">
                        <button style="background-color:transparent;border: 1px solid white;color: white;"> - </button>
                    </div>


                    <div style="width: 60%;display: flex;justify-content: center;align-items: center;">
                        <div
                            style="width:80%;height: 70%;background-color: transparent;border: 1px solid white;border-radius: 3px;display: flex;justify-content: center;align-items: center;">
                            1
                        </div>


                    </div>
                    <div style="width: 30%;height: 100; display: flex;justify-content: center;align-items: center;">
                        <button style="background-color:transparent;border: 1px solid white;color: white;"> + </button>
                    </div>



                </div>
            </div>
        </div>
    </div>



    <div class="col-xl-8 p-1" style="height: 43vh;">
        <div class="w-100 h-100 " style="background-color: #222222;border-radius: 5px;">
            <div style="height: 15%;width: 100%;display: flex;justify-content: center;align-items: center;">
                <div style="width: 30%;height: 100%;display: flex;">
                    <div
                        style="width: 33%;height: 98%;margin: 1px;display: flex;justify-content: center;align-items: center;">
                        TOP 10 </div>
                    <div
                        style="width: 33%;height: 98%;margin: 1px;display: flex;justify-content: center;align-items: center;">
                        <select class="form-control" id="select_top10_1"
                            style="width:140px; height:30px;background-color:#222222;">
                            <option value="">Select</option>
                            <option value="harian">Harian</option>
                            <option value="mingguan">Mingguan</option>
                            <option value="tahunan">Tahunan</option>
                        </select>
                    </div>
                    <div
                        style="width: 33%;height: 98%;margin: 1px;display: flex;justify-content: center;align-items: center;">

                        <select class="form-control" id="select_top10_2"
                            style="width:140px; height:30px;background-color:#222222;">
                            <option>Select</option>
                            <option value="all">Semua</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="list_table text-center" style="width: 100%;">
                <ul>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($topTsr10 as $item)
                    <li>
                        <div style="height:35vh;">
                            <div
                                style="height: 10%;width: 100%;display: flex;justify-content: center;align-items: center;">
                                Top {{ $no++ }}
                            </div>
                            <div style="width: 100%;height: 90%;padding: 3px;">
                                <div style="width: 100%;height: 100%;border:1px solid white;border-radius: 5px;">
                                    <div
                                        style="width: 100%;height: 40%;display: flex;justify-content: center;align-items: center;padding: 5px;">
                                        <div
                                            style="width: 80px;height:80px;background-color: darkcyan;border-radius: 50%;">
                                        </div>
                                    </div>
                                    <div
                                        style="width: 100%;height: 15%;display: flex;justify-content: center;align-items: center;font-weight: bold;border-bottom: 1px solid white;">
                                        {{ $item->nama_tele }}
                                    </div>
                                    <div
                                        style="width: 100%;height: 15%;display: flex;justify-content: center;align-items: center;border-bottom: 1px solid white;">
                                        {{ $item->spaj_count }} Closing
                                    </div>
                                    <div
                                        style="width: 100%;height: 15%;display: flex;justify-content: center;align-items: center;border-bottom: 1px solid white;">
                                        {{ $item->spaj_count }} Premi
                                    </div>
                                    <div
                                        style="width: 100%;height: 15%;display: flex;justify-content: center;align-items: center;border-bottom: 1px solid white;">
                                        {{ "Rp " . number_format($item->total_max,0,',','.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <ul>

        </div>
    </div>
    <div class="col-xl-2  p-1" style="height: 43vh;;">
        <div class="h-100  " style="width: 90%;background-color: #222222;">
            <div style="width: 100%;height: 10%;display: flex;justify-content: center;align-items: center;">Hello</div>
            <div style="width: 100%;height: 10%;display: flex;justify-content: center;align-items: center;">
                <select class="form-control" id="select_top10_1"
                    style="width:175px; height:30px;background-color:#222222;">
                    <option value="">Select</option>
                    <option value="harian">Harian</option>
                    <option value="mingguan">Mingguan</option>
                    <option value="tahunan">Tahunan</option>
                </select>
            </div>
            <div
                style="width: 100%;height: 25%;display: flex;justify-content: center;align-items: center;flex-direction: column;padding: 5px;">
                <div style="width: 70px;height: 70px;border-radius: 50%;background-color: orange;">

                </div>
            </div>
            <div
                style="width: 100%;height: 12%;display: flex;justify-content: center;align-items: center;flex-direction: column;">
                <div>Congrats Atas Pencapaianya</div>
                <div style="font-weight: bold;">{{ $getTeleReward['nama'] }}</div>
            </div>
            <div
                style="width: 100%;height: 15%;display: flex;justify-content: center;align-items: center;flex-direction: column;">
                <div>closing</div>
                <div style="font-weight: bold;">{{ $getTeleReward['count'] }} Closing</div>

            </div>
            <div
                style="width: 100%;height: 14%;display: flex;justify-content: center;align-items: center;flex-direction: column;">
                <div>Premi</div>
                <div style="font-weight: bold;">{{ $getTeleReward['count'] }} Premi</div>
            </div>

            <div
                style="width: 100%;height: 12%;display: flex;justify-content: center;align-items: center;flex-direction: column;">
                <div>Pendapatan Polis</div>
                <div style="font-weight: bold;">
                    {{ "Rp " . number_format($getTeleReward['total_pendapatan'],0,',','.') }}</div>
            </div>
        </div>

    </div>

</div>
<!-- end row -->

<div class="row" style="background-color: #222222;">
    <div class="col-xl-12">
        <div class="card" style="background-color:#222222;">
            <div
                style="width: 100%;display: flex;justify-content: center;align-items: center;margin: 0;font-size: 20px;">
                SPAJ Submited
            </div>
            <div style="display: flex;justify-content: center;align-items: center;">
                <div class="row " style="width: 80%;display:flex;justify-content: center;align-items: center;">
                    <div class="col-lg-2 ">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row" style="height:40vh;background-color: #222222;">
    <div class="col-1"
        style="height: 40vh;display: flex;justify-content: center;align-items: center;flex-direction: column;">
        <div style="width: 95px;height: 95px;background: linear-gradient(45deg, #FF00C7, #020202);;margin: 2px;">
            <div style="width: 100%;height: 20%;text-align: center;">
                Daily
            </div>
            <div
                style="width: 100%;height: 40%;display: flex;justify-content: center;align-items: center;font-size: 40px;font-weight: bold;">
                15
            </div>
            <div style="display: flex;justify-content: center;align-items: center;width: 100%;">
                <div
                    style="width: 60px;height: 30px; border: 1px solid white;border-radius: 5px;display: flex;align-items: center;justify-content: center;margin: 3px;">
                    detail</div><i class="ion ion-md-download"></i>
            </div>
        </div>

        <div style="width: 95px;height: 95px;background: linear-gradient(45deg, #0049FF, #020202);;margin: 2px;">
            <div style="width: 100%;height: 20%;text-align: center;">
                Daily
            </div>
            <div
                style="width: 100%;height: 40%;display: flex;justify-content: center;align-items: center;font-size: 40px;font-weight: bold;">
                15
            </div>
            <div style="display: flex;justify-content: center;align-items: center;width: 100%;">
                <div
                    style="width: 60px;height: 30px; border: 1px solid white;border-radius: 5px;display: flex;align-items: center;justify-content: center;margin: 3px;">
                    detail</div><i class="ion ion-md-download"></i>
            </div>
        </div>

        <div style="width: 95px;height: 95px; background: linear-gradient(45deg, yellow, #020202);">
            <div style="width: 100%;height: 20%;text-align: center;">
                Daily
            </div>
            <div
                style="width: 100%;height: 40%;display: flex;justify-content: center;align-items: center;font-size: 40px;font-weight: bold;">
                15
            </div>
            <div style="display: flex;justify-content: center;align-items: center;width: 100%;">
                <div
                    style="width: 60px;height: 30px; border: 1px solid white;border-radius: 5px;display: flex;align-items: center;justify-content: center;margin: 3px;">
                    detail</div><i class="ion ion-md-download"></i>
            </div>
        </div>
    </div>
    <div class="col-5" style="height: 40vh;">
        <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
            <div style="width: 50%;height: 100%; text-align: center;">
                <div>
                    SPAJ Submited Chart
                </div>
                <div style="display: flex;margin-top: 5px;">
                    <select class="form-control" id="select_top10_1"
                        style="width:50%; height:34px;background-color:#222222;">
                        <option value="">Select</option>
                        <option value="harian">Harian</option>
                        <option value="mingguan">Mingguan</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                    <select class="form-control" id="select_top10_1"
                        style="width:50%; height:34px;background-color:#222222;">
                        <option value="">Select</option>
                        <option value="harian">Harian</option>
                        <option value="mingguan">Mingguan</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                </div>
            </div>

        </div>
        <div id="morris-area-example" class="morris-charts morris-charts-height" style="height: 80%;"></div>
    </div>
    <div class="col-6" style="height: 40vh;">
        <div style="width: 100%;height: 22%;display: flex;justify-content: center;align-items: center;">
            <div style="width: 50%;height: 100%; text-align: center;">
                <div>
                    Premium Submitted Chart
                </div>
                <div style="display: flex;margin-top: 5px;">
                    <select class="form-control" id="select_top10_1"
                        style="width:50%; height:34px;background-color:#222222;">
                        <option value="">Select</option>
                        <option value="harian">Harian</option>
                        <option value="mingguan">Mingguan</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                    <select class="form-control" id="select_top10_1"
                        style="width:50%; height:34px;background-color:#222222;">
                        <option value="">Select</option>
                        <option value="harian">Harian</option>
                        <option value="mingguan">Mingguan</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="overlapping-bars" class="ct-chart ct-golden-section" style="height:80%;" dir="ltr"></div>
    </div>
</div>




<!-- end row -->
<div class="row mt-5">
    <div class="col-xl-12">
        <div class="card" style="background-color:#222222;">
            <div class="card-body">
                <center>
                    <h4 class="card-title mb-4">PREMIUM TOTAL</h4>
                </center>

                <center>
                    <div class="row" style="display: flex;justify-content: center;align-items: center;">
                        <div class="row " style="width: 60%;display:flex;justify-content: center;align-items: center;">
                            <div class="col-lg-3  ">
                                <div class="card text-white "
                                    style="width:155px; height:158.34px; background: linear-gradient(45deg, #FF00C7, #020202);">
                                    <div class="card-body">
                                        <p>Daily</p>
                                        <h1>14</h1>
                                        <button type="button" class="btn btn-outline-light waves-effect"
                                            style="color:#fff; border-color:#fff;">Detail</button>
                                        <i class="ion ion-md-download" style="width:35px; height:35px;"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="card text-white bg-warning"
                                    style="width:155px; height:158.34px; background: linear-gradient(45deg, #0049FF, #020202);">
                                    <div class="card-body">
                                        <p>Weekly</p>
                                        <h1>14</h1>
                                        <button type="button" class="btn btn-outline-light waves-effect"
                                            style="color:#fff; border-color:#fff;">Detail</button>
                                        <i class="ion ion-md-download"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="card text-white bg-danger"
                                    style="width:155px; height:158.34px; background: linear-gradient(45deg, #FF0037, #020202);">
                                    <div class="card-body">
                                        <p>Monthly</p>
                                        <h1>14</h1>
                                        <button type="button" class="btn btn-outline-light waves-effect"
                                            style="color:#fff; border-color:#fff;">Detail</button>
                                        <i class="ion ion-md-download"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card text-white bg-warning"
                                    style="width:155px; height:158.34px; background: linear-gradient(45deg, yellow, #020202);">
                                    <div class="card-body">
                                        <p>Yearly</p>
                                        <h1>14</h1>
                                        <button type="button" class="btn btn-outline-light waves-effect"
                                            style="color:#fff; border-color:#fff;">Detail</button>
                                        <i class="ion ion-md-download"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                <!-- end row -->
                <div class="row text-center mt-4">
                    <div class="col-4" style="display: flex;justify-content: center;align-items: center;height: 10vh">
                        <select class="form-control" id="select_top10_1"
                            style="width:175px; height:30px;background-color:#222222;">
                            <option value="">Select</option>
                            <option value="harian">Harian</option>
                            <option value="mingguan">Mingguan</option>
                            <option value="tahunan">Tahunan</ option>
                        </select>
                        <select class="form-control" id="select_top10_1"
                            style="width:175px; height:30px;background-color:#222222;">
                            <option value="">Select</option>
                            <option value="harian">Harian</option>
                            <option value="mingguan">Mingguan</option>
                            <option value="tahunan">Tahunan</option>
                        </select>
                    </div>
                    <div class="col-4" style="display: flex;justify-content: center;align-items: center;height: 10vh">
                        <select class="form-control" id="select_top10_1"
                            style="width:175px; height:30px;background-color:#222222;">
                            <option value="">Select</option>
                            <option value="harian">Harian</option>
                            <option value="mingguan">Mingguan</option>
                            <option value="tahunan">Tahunan</option>
                        </select>
                        <select class="form-control" id="select_top10_1"
                            style="width:175px; height:30px;background-color:#222222;">
                            <option value="">Select</option>
                            <option value="harian">Harian</option>
                            <option value="mingguan">Mingguan</option>
                            <option value="tahunan">Tahunan</option>
                        </select>
                    </div>
                    <div class="col-4" style="display: flex;justify-content: center;align-items: center;height: 10vh;">

                        <select class="form-control" id="select_top10_1"
                            style="width:175px; height:30px;background-color:#222222;">
                            <option value="">Select</option>
                            <option value="harian">Harian</option>
                            <option value="mingguan">Mingguan</option>
                            <option value="tahunan">Tahunan</option>
                        </select>
                        <select class="form-control" id="select_top10_1"
                            style="width:175px; height:30px;background-color:#222222;">
                            <option value="">Select</option>
                            <option value="harian">Harian</option>
                            <option value="mingguan">Mingguan</option>
                            <option value="tahunan">Tahunan</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 ">
                        <div id="simple-line-chart" class="ct-chart ct-golden-section" dir="ltr"></div>
                    </div>
                    <div class="col-4">
                        <div id="morris-donut-example" class="morris-charts morris-charts-height"></div>
                    </div>
                    <div class="col-4 ">
                        <div id="chart-with-area" class="ct-chart ct-golden-section" dir="ltr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-12">
        <div class="card" style="background-color:#222222;">
            <div class="card-body">
                <center>
                    <h4 class="card-title mb-4">Police Approved</h4>
                </center>
                <center>
                    <div class="row" style="display: flex;justify-content: center;align-items: center;">
                        <div class="row " style="width: 60%;display:flex;justify-content: center;align-items: center;">
                            <div class="col-lg-3  ">
                                <div class="card text-white "
                                    style="width:155px; height:158.34px; background: linear-gradient(45deg, #FF00C7, #020202);">
                                    <div class="card-body">
                                        <p>Daily</p>
                                        <h1>14</h1>
                                        <button type="button" class="btn btn-outline-light waves-effect"
                                            style="color:#fff; border-color:#fff;">Detail</button>
                                        <i class="ion ion-md-download" style="width:35px; height:35px;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card text-white bg-warning"
                                    style="width:155px; height:158.34px; background: linear-gradient(45deg, #0049FF, #020202);">
                                    <div class="card-body">
                                        <p>Weekly</p>
                                        <h1>14</h1>
                                        <button type="button" class="btn btn-outline-light waves-effect"
                                            style="color:#fff; border-color:#fff;">Detail</button>
                                        <i class="ion ion-md-download"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="card text-white bg-danger"
                                    style="width:155px; height:158.34px; background: linear-gradient(45deg, #FF0037, #020202);">
                                    <div class="card-body">
                                        <p>Monthly</p>
                                        <h1>14</h1>
                                        <button type="button" class="btn btn-outline-light waves-effect"
                                            style="color:#fff; border-color:#fff;">Detail</button>
                                        <i class="ion ion-md-download"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card text-white bg-warning"
                                    style="width:155px; height:158.34px; background: linear-gradient(45deg, yellow, #020202);">
                                    <div class="card-body">
                                        <p>Yearly</p>
                                        <h1>14</h1>
                                        <button type="button" class="btn btn-outline-light waves-effect"
                                            style="color:#fff; border-color:#fff;">Detail</button>
                                        <i class="ion ion-md-download"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                <!-- end row -->
                <div class="row text-center mt-4">
                    <div class="col-4">
                        <h5 class="font-size-20">$ 89425</h5>
                        <p class="text-muted">Marketplace</p>
                    </div>
                    <div class="col-4">
                        <h5 class="font-size-20">$ 56210</h5>
                        <p class="text-muted">Total Income</p>
                    </div>
                    <div class="col-4">
                        <h5 class="font-size-20">$ 8974</h5>
                        <p class="text-muted">Last Month</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 bg-info">
                        <div id="smil-animations" class="ct-chart ct-golden-section" dir="ltr"></div>
                    </div>
                    <div class="col-4 bg-warning">
                        <div id="animating-donut" class="ct-chart ct-golden-section" dir="ltr"></div>
                    </div>
                    <div class="col-4 bg-danger">
                        <div id="stacked-bar-chart" class="ct-chart ct-golden-section" dir="ltr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('js')

<script src="{{ URL::to('assets/libs/chartist/chartist.min.js') }}"></script>
<script src="{{ URL::to('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ URL::to('assets/js/pages/chartist.init.js') }}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script type="text/javascript">
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = tanggal.getHours() + ' : ' + tanggal.getMinutes() + ' : ' + tanggal
            .getSeconds();
    }

    google.charts.load('current', { 'packages': ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', 'Jumlah Spaj'],

            @php
            foreach($spajSubmitted as $spaj) {
                echo "['".\Carbon\ Carbon::parse($spaj -> month_name) -> isoFormat('MMMM').
                "', ".$spaj -> count.
                "],";
            }
            @endphp
        ]);

        var options = {
            legend: {
                position: 'none'
            },
            axes: {
                x: {
                    0: { side: 'top', label: 'Percentage'}
                }
            },
            chartArea: {
                backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.1
                },
            },
            // Colors the entire chart area, simple version
            // backgroundColor: '#FF0000',
            // Colors the entire chart area, with opacity
            backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.8
            },
            bar: { groupWidth: "90%" },
            bars: 'vertical'
        }

        var chart = new google.charts.Bar(document.getElementById('morris-area-example'));
        chart.draw(data, google.charts.Bar.convertOptions(options));

    }

</script>
@endpush
