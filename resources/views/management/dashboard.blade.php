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
                    @php
                        date_default_timezone_set('Asia/Jakarta');
                        $bulan = date('Y-m-d');
                    @endphp
                    <div
                        style="width: 33%;height: 98%;margin: 1px;display: flex;justify-content: center;align-items: center;">
                        TOP 10 Bulan {{ \Carbon\Carbon::parse($bulan)->isoFormat('MMMM') }}</div>
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
                                       @if ( $item->foto_tele == null || $item->foto_tele == '-' )
                                       <div
                                            style="width:50px;height:50px;background-color: darkcyan;border-radius: 50%;display:flex;justify-content:center;align-items:center;object-fit:contain;">
                                            <img src="https://i.pravatar.cc/50" alt="image" />
                                        </div>
                                        @else
                                        <div
                                            style="width:50px;height:50px;background-color: darkcyan;border-radius: 50%;display:flex;justify-content:center;align-items:center;object-fit:contain;">
                                            <img src="{{ asset('property', $item->foto_tele) }}" alt="image" />
                                        </div>
                                       @endif
                                    </div>
                                    <div
                                        style="width: 100%;height: 15%;display: flex;justify-content: center;align-items: center;font-weight: bold;border-bottom: 1px solid white;font-size:10px;">
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
                <div style="width: 60px;height: 60px;border-radius: 50%;background-color: orange;display:flex;justify-content:center;align-items:center;object-fit:contain;">
                    @if ( $getTeleReward['foto_tele'] == null || $getTeleReward['foto_tele'] == '-' )
                    <img src="https://i.pravatar.cc/60" alt="image" />
                    @else
                    <img src="{{ asset('property', $getTeleReward['foto_tele']) }}" alt="image" />
                    @endif
                </div>
            </div>
            <div
                style="width: 100%;height: 12%;display: flex;justify-content: center;align-items: center;flex-direction: column;font-size:12px;">
                <div>Congrats Atas Pencapaianya</div>
                <div style="font-weight: bold;">{{ $getTeleReward['nama'] }}</div>
            </div>
            <div
                style="width: 100%;height: 15%;display: flex;justify-content: center;align-items: center;flex-direction: column;font-size:12px;">
                <div>closing</div>
                <div style="font-weight: bold;">{{ $getTeleReward['count'] }} Closing</div>

            </div>
            <div
                style="width: 100%;height: 14%;display: flex;justify-content: center;align-items: center;flex-direction: column;font-size:12px;">
                <div>Premi</div>
                <div style="font-weight: bold;">{{ $getTeleReward['count'] }} Premi</div>
            </div>

            <div
                style="width: 100%;height: 12%;display: flex;justify-content: center;align-items: center;flex-direction: column;font-size:12px;">
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
        <div id="spajSubmittedChart" style="height: 80%;"></div>
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
        <div id="premiumSubmittedChart" style="height:80%;" dir="ltr"></div>
    </div>
</div>

<br><br>

<div class="row" style="background-color: #222222;">
    <div class="col-xl-12">
        <div class="card" style="background-color:#222222;">
            <div
                style="width: 100%;display: flex;justify-content: center;align-items: center;margin: 0;font-size: 20px;">
                Police Approved
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
<div class="row" style="height:auto;background-color: #222222;">
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
    <div class="col-6" style="height: 40vh;">
        <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
            <div style="width: 50%;height: 100%; text-align: center;">
                <div>
                    Police Approve Chart
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
        <div id="policeApprovedChart" style="height: 80%;"></div>
    </div>
    <div class="col-6" style="height: 40vh;">
        <div style="width: 100%;height: 22%;display: flex;justify-content: center;align-items: center;">
            <div style="width: 50%;height: 100%; text-align: center;">
                <div>
                    Total Premium Chart
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
        <div id="totalPremiumChart" style="height:80%;" dir="ltr"></div>
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
                        <div id="premiumTahun1Chart" dir="ltr"></div>
                    </div>
                    <div class="col-4">
                        <div id="premiumPltpChart"></div>
                    </div>
                    <div class="col-4 ">
                        <div id="premiumTotalChart" dir="ltr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->


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
    google.charts.setOnLoadCallback(premiumChart);
    google.charts.setOnLoadCallback(policeApprovedChart);
    google.charts.setOnLoadCallback(totalPremiumChart);
    google.charts.setOnLoadCallback(premiumTahun1Chart);
    google.charts.setOnLoadCallback(premiumPltpChart);
    google.charts.setOnLoadCallback(premiumTotalChart);


    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', 'Jumlah Spaj'],

            @php
            foreach($spajSubmitted as $spaj) {
                echo "['".\Carbon\ Carbon::parse($spaj -> month_name) -> isoFormat('MMMM').
                "', '".(int) $spaj -> count."'],";
            }
            @endphp
        ]);

        var options = {
            legend: {
                position: 'top',
                maxLines: 3
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
            colors: '#114EE7',
            bar: { groupWidth: "90.39px" },
            bars: 'vertical',
            isStacked: true
        }

        var chart = new google.charts.Bar(document.getElementById('spajSubmittedChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));

    }

    function premiumChart()
    {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', 'Total Premi'],
            @php
            foreach($premiumSubmitted as $spaj) {
                echo "['".\Carbon\ Carbon::parse($spaj -> month_name) -> isoFormat('MMMM').
                "', '". "Rp" . number_format($spaj -> sum_nominal, 0, ',','.').
                "'],";
            }
            @endphp
        ]);

        var options = {
            legend: {
                position: 'top',
                maxLines: 3
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
            colors: '#E91140',
            bar: { groupWidth: "90.39px" },
            bars: 'vertical',
            isStacked: true
        }

        var chart = new google.charts.Bar(document.getElementById('premiumSubmittedChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function policeApprovedChart()
    {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', 'Jumlah Spaj'],

            @php
            foreach($policeApprovedChart as $spaj) {
                echo "['".\Carbon\Carbon::parse($spaj -> month_name) -> isoFormat('MMMM').
                "', '".(int) $spaj -> count."'],";
            }
            @endphp
        ]);

        var options = {
            legend: {
                position: 'top',
                maxLines: 3
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
            colors: '#114EE7',
            bar: { groupWidth: "90.39px" },
            bars: 'vertical',
            isStacked: true
        }

        var chart = new google.charts.Bar(document.getElementById('policeApprovedChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));

    }

    function totalPremiumChart()
    {

        var data = google.visualization.arrayToDataTable([
            ['Bulan', 'Total Premi'],
            @php
            foreach($totalPremiumChart as $spaj) {
                echo "['".\Carbon\ Carbon::parse($spaj -> month_name) -> isoFormat('MMMM').
                "', '". "Rp" . number_format($spaj -> sum_nominal, 0, ',','.').
                "'],";
            }
            @endphp
        ]);

        var options = {
            legend: {
                position: 'top',
                maxLines: 3
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
            colors: '#E91140',
            bar: { groupWidth: "90.39px" },
            bars: 'vertical',
            isStacked: true
        }

        var chart = new google.charts.Bar(document.getElementById('totalPremiumChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function premiumTahun1Chart()
    {
        var data = google.visualization.arrayToDataTable([
           ['Bulan', 'Jumlah Spaj'],
           ['Januari', '2'],
           ['Februari', '3'],
           ['Maret', '4']
        ]);

        var options = {
            legend: {
                position: 'top',
                maxLines: 3
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
            colors: '#114EE7',
            bar: { groupWidth: "90.39px" },
            bars: 'vertical',
            isStacked: true
        }

        var chart = new google.charts.Bar(document.getElementById('premiumTahun1Chart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function premiumPltpChart()
    {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', 'Total Premi'],
            ['Januari', 'Rp. 100.000'],
            ['Februari', 'Rp. 150.000'],
            ['Maret', 'Rp. 200.000']
         ]);

         var options = {
             legend: {
                 position: 'top',
                 maxLines: 3
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
             colors: '#E91140',
             bar: { groupWidth: "90.39px" },
             bars: 'vertical',
             isStacked: true
         }

         var chart = new google.charts.Bar(document.getElementById('premiumPltpChart'));
         chart.draw(data, google.charts.Bar.convertOptions(options));
    }

     function premiumTotalChart()
    {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', 'Total Premi'],
            ['Januari', 'Rp. 100.000'],
            ['Februari', 'Rp. 150.000'],
            ['Maret', 'Rp. 200.000']
         ]);

         var options = {
             legend: {
                 position: 'top',
                 maxLines: 3
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
             colors: '#ECD11E',
             bar: { groupWidth: "90.39px" },
             bars: 'vertical',
             isStacked: true
         }

         var chart = new google.charts.Bar(document.getElementById('premiumTotalChart'));
         chart.draw(data, google.charts.Bar.convertOptions(options));
    }


</script>
@endpush
