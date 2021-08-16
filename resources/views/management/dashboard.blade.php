@extends('layouts.master')

@push('title')
DASHBOARD | ARWICS
@endpush


@push('css')

<!-- DataTables -->
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet"
    type="text/css" />

<link href="{{ asset('assets/libs/select2/css/select2.min.css" rel="stylesheet') }}" type="text/css" />
<link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="row" >
    <div class="col-xl-6 p-1" style="height: 852px;">
        <div class="w-100 h-100" style="background-color: #222222;border-radius: 5px;">
            <br>
            <div style="width: 100%;display: flex;justify-content: center;align-items: center;margin: 0;font-size: 20px;">
                <p style="width:222px; height: 26px; top: 319px; left: 1134px; color: #fff;">Spaj Submitted</p>
            </div>
            <br>
            <div style="width:100%; display: flex; justify-content: center; align-items: center; margin:0;">
                <div class="row" style="width: 70%;display:flex;justify-content: center;align-items: center;">
                    <div class="col-lg-3 ">
                        <div class="card text-white "
                            style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #EA6ACC 0%, #020202 178.11%);">
                            <div class="card-body">
                               <center>
                                <p>Daily</p>
                                <h1>{{ $spajSubmittedCountDaily }}</h1>
                                <button type="button" data-bs-toggle="modal" id="detailSpajSubmittedDaily"
                                    data-bs-target=".detailSpajSubmittedDaily" class="btn btn-outline-light waves-effect"
                                    style="color:#fff; border-color:#fff;">Detail</button>
                                <i class="ion ion-md-download" style="width:35px; height:35px;"></i></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-white bg-warning"
                            style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #F6AE99 0.59%, #020202 178.11%);">
                            <div class="card-body">
                                <center>
                                    <p>Weekly</p>
                                    <h1>{{ $spajSubmittedCountWeekly }}</h1>
                                    <button type="button" data-bs-toggle="modal" id="detailSpajSubmittedWeekly"
                                        data-bs-target=".detailSpajSubmittedWeekly" class="btn btn-outline-light waves-effect"
                                        style="color:#fff; border-color:#fff;">Detail</button>
                                    <i class="ion ion-md-download"></i>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-white bg-danger"
                            style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #448695 1.4%, #020202 178.11%);">
                            <div class="card-body">
                                <center>
                                    <p>Monthly</p>
                                    <h1>{{ $spajSubmittedCountMonthly }}</h1>
                                    <button type="button" data-bs-toggle="modal" id="detailSpajSubmittedMonthly"
                                        data-bs-target=".detailSpajSubmittedMonthly" class="btn btn-outline-light waves-effect"
                                        style="color:#fff; border-color:#fff;">Detail</button>
                                    <i class="ion ion-md-download"></i>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-white bg-warning"
                            style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #FDE584 -0.07%, #020202 178.11%);">
                            <div class="card-body">
                                <center>
                                    <p>Yearly</p>
                                    <h1>{{ $spajSubmittedCountYearly }}</h1>
                                    <button type="button" data-bs-toggle="modal" id="detailSpajSubmittedYearly"
                                        data-bs-target=".detailSpajSubmittedYearly" class="btn btn-outline-light waves-effect"
                                        style="color:#fff; border-color:#fff;">Detail</button>
                                    <i class="ion ion-md-download"></i>
                                </center>
                            </div>
                        </div>
                    </div>
                    <fieldset>
                </div>
            </div>
            <hr style="left: 51px; top: 695.34px; border-radius: 20px; border: 4px solid #ffffff; color: #ffffff;">
            <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
                <div style="width: 100%;height: 100%; text-align: center;">
                     <div class="row">
                        <div class="col-lg-6">
                            <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
                                <div style="width: 50%;height: 100%; text-align: center;">
                                    <div>
                                        Spaj Submitted Chart
                                    </div>
                                    <div style="display: flex;margin-top: 5px;">
                                        <select class="form-control" id="select_top10_1"
                                            style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 3px; border: 2px solid #ffffff;">
                                            <option value="">Select</option>
                                            <option value="harian">Harian</option>
                                            <option value="mingguan">Mingguan</option>
                                            <option value="tahunan">Tahunan</option>
                                        </select>
                                        &nbsp;
                                        <div>
                                            <div class="input-group">
                                                <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                            </div>
                                            <!-- input-group -->
                                        </div>
                                    </div>
                                </div>
                                <a href="#" data-bs-toggle="modal" id="detailTotalPremiumChart"
                                data-bs-target=".detailTotalPremiumChart"
                                    style="width: 120px;height: 44px;border-radius: 7px; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;cursor: pointer;">
                                    <div>
                                        Detail
                                    </div>
                                </a>
                            </div>
                            <div id="spajSubmittedChart" style="height:420px; max-width: 100%;"></div>
                        </div>
                        <div class="col-lg-6">
                            <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
                                <div style="width: 50%;height: 100%; text-align: center;">
                                    <div>
                                        Premium Submitted Chart
                                    </div>
                                    <div style="display: flex;margin-top: 5px;">
                                        <select class="form-control" id="filterData" onchange="loadFilter();"
                                            style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 3px; border: 2px solid #ffffff;">
                                            <option value="select">Select</option>
                                            <option value="harian">Harian</option>
                                            <option value="mingguan">Mingguan</option>
                                            <option value="bulanan">Bulanan</option>
                                            <option value="tahunan">Tahunan</option>
                                        </select>
                                        &nbsp;
                                        <div id="date">
                                            <div class="input-group">
                                                <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                            </div>
                                            <!-- input-group -->
                                        </div>
                                        <div id="rangeDate">
                                            <div class="input-daterange input-group" data-date-format="dd M, yyyy"  data-date-autoclose="true"  data-provide="datepicker">
                                                <input type="text" class="form-control" name="start" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;"/>
                                                <input type="text" class="form-control" name="end" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;"/>
                                            </div>
                                            <!-- input-group -->
                                        </div>

                                        <div id="bulanDate">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="bulan_awal" id="bulanAwal" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 3px; border: 2px solid #ffffff;">
                                                        <option value="">Bulan 1</option>
                                                        @foreach($bulan as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-lg-6">
                                                    <select class="form-control" name="bulan_akhir" id="bulanAkhir" onchange="filterMonth();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 3px; border: 2px solid #ffffff;">
                                                        <option value="">Bulan 2</option>
                                                        @foreach($bulan as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- input-group -->
                                        </div>

                                        <div id="tahunDate">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="tahun_awal" id="tahunAwal" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 3px; border: 2px solid #ffffff;">
                                                        <option value="">Tahun 1</option>
                                                        @for($year=2010; $year<=date('Y'); $year++)
                                                        <option value="{{ $year }}"> {{ $year }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="col-lg-6">
                                                    <select class="form-control" name="tahun_akhir" id="tahunAkhir" onchange="filterYear();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 3px; border: 2px solid #ffffff;">
                                                        <option value="">Tahun 2</option>
                                                        @for($year=2010; $year<=date('Y'); $year++)
                                                        <option value="{{ $year }}"> {{ $year }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- input-group -->
                                        </div>


                                    </div>
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" data-bs-toggle="modal" id="detailTotalPremiumChart"
                                data-bs-target=".detailTotalPremiumChart"
                                    style="width: 120px;height: 44px;border-radius: 7px; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;cursor: pointer;">
                                    <div>
                                        Detail
                                    </div>
                                </a>
                            </div>
                            <div id="premiumSubmittedChart" style="height:420px; max-width: 100%;" dir="ltr"></div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 p-1" style="height: 852px;">
        <div class="w-100 h-100" style="background-color: #222222;border-radius: 5px;">
            <br>
            <div style="width: 100%;display: flex;justify-content: center;align-items: center;margin: 0;font-size: 20px;">
                <p style="width:222px; height: 26px; top: 319px; left: 1134px; color: #fff;">Police Approved</p>
            </div>
            <br>
            <div style="width:100%; display: flex; justify-content: center; align-items: center; margin:0;">
                <div class="row" style="width: 70%;display:flex;justify-content: center;align-items: center;">
                    <div class="col-lg-3 ">
                        <div class="card text-white "
                            style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #EA6ACC 0%, #020202 178.11%);">
                            <div class="card-body">
                               <center>
                                <p>Daily</p>
                                <h1>{{ $policeApprovedCountDaily  }}</h1>
                                <button type="button" data-bs-toggle="modal" id="detailPoliceApprovedDaily"
                                    data-bs-target=".detailPoliceApprovedDaily" class="btn btn-outline-light waves-effect"
                                    style="color:#fff; border-color:#fff;">Detail</button>
                                <i class="ion ion-md-download" style="width:35px; height:35px;"></i></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-white bg-warning"
                            style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #F6AE99 0.59%, #020202 178.11%);">
                            <div class="card-body">
                                <center>
                                    <p>Weekly</p>
                                    <h1>{{ $policeApprovedCountWeekly  }}</h1>
                                    <button type="button" data-bs-toggle="modal" id="detailPoliceApprovedWeekly"
                                        data-bs-target=".detailPoliceApprovedWeekly" class="btn btn-outline-light waves-effect"
                                        style="color:#fff; border-color:#fff;">Detail</button>
                                    <i class="ion ion-md-download"></i>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-white bg-danger"
                            style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #448695 1.4%, #020202 178.11%);">
                            <div class="card-body">
                                <center>
                                    <p>Monthly</p>
                                    <h1>{{ $policeApprovedCountMonthly  }}</h1>
                                    <button type="button" data-bs-toggle="modal" id="detailPoliceApprovedMonthly"
                                        data-bs-target=".detailPoliceApprovedMonthly" class="btn btn-outline-light waves-effect"
                                        style="color:#fff; border-color:#fff;">Detail</button>
                                    <i class="ion ion-md-download"></i>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-white bg-warning"
                            style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #FDE584 -0.07%, #020202 178.11%);">
                            <div class="card-body">
                                <center>
                                    <p>Yearly</p>
                                    <h1>{{ $policeApprovedCountYearly  }}</h1>
                                    <button type="button" data-bs-toggle="modal" id="detailPoliceApprovedYearly"
                                        data-bs-target=".detailPoliceApprovedYearly" class="btn btn-outline-light waves-effect"
                                        style="color:#fff; border-color:#fff;">Detail</button>
                                    <i class="ion ion-md-download"></i>
                                </center>
                            </div>
                        </div>
                    </div>
                    <fieldset>
                </div>
            </div>
            <hr style="left: 51px; top: 695.34px; border-radius: 20px; border: 4px solid #ffffff; color: #ffffff;">
            <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
                <div style="width: 100%;height: 100%; text-align: center;">
                     <div class="row">
                        <div class="col-lg-6">
                            <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
                                <div style="width: 50%;height: 100%; text-align: center;">
                                    <div>
                                        Police Approved Chart
                                    </div>
                                    <div style="display: flex;margin-top: 5px;">
                                        <select class="form-control" id="select_top10_1"
                                            style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 3px; border: 2px solid #ffffff;">
                                            <option value="">Select</option>
                                            <option value="harian">Harian</option>
                                            <option value="mingguan">Mingguan</option>
                                            <option value="tahunan">Tahunan</option>
                                        </select>
                                        &nbsp;
                                        <div>
                                            <div class="input-group">
                                                <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                            </div>
                                            <!-- input-group -->
                                        </div>
                                    </div>
                                </div>
                                <a href="#" data-bs-toggle="modal" id="detailPoliceApprovedChart"
                                    data-bs-target=".detailPoliceApprovedChart" style="width: 127.66px;height: 44.29px;border-radius: 7px; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;">
                                    <div>
                                        Detail
                                    </div>
                                </a>
                            </div>
                            <div id="policeApprovedChart" style="height:420px; max-width: 100%;"></div>
                        </div>
                        <div class="col-lg-6">
                            <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
                                <div style="width: 50%;height: 100%; text-align: center;">
                                    <div>
                                        Total Premium Chart
                                    </div>
                                    <div style="display: flex;margin-top: 5px;">
                                        <select class="form-control" id="select_top10_1"
                                            style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 3px; border: 2px solid #ffffff;">
                                            <option value="">Select</option>
                                            <option value="harian">Harian</option>
                                            <option value="mingguan">Mingguan</option>
                                            <option value="tahunan">Tahunan</option>
                                        </select>
                                        &nbsp;
                                        <div>
                                            <div class="input-group">
                                                <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                            </div>
                                            <!-- input-group -->
                                        </div>
                                    </div>
                                </div>
                                <a href="#" data-bs-toggle="modal" id="detailTotalPremiumChart"
                                data-bs-target=".detailTotalPremiumChart"
                                    style="width: 120px;height: 44px;border-radius: 7px; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;cursor: pointer;">
                                    <div>
                                        Detail
                                    </div>
                                </a>
                            </div>
                            <div id="totalPremiumChart" style="height:420px; max-width: 100%;" dir="ltr"></div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br>

<div class="row">
    <div class="col-xl-4 p-1" style="height:100%">
        <div class="h-100" style="width: 100%;background-color: #222222;">
            <div class="row">
                <div class="col-lg-6">
                    <br>
                    <div style="width: 100%;height: 10%;display: flex;justify-content: center;align-items: center;">
                        <select class="form-control" id="select_top10_1"
                        style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 3px; border: 2px solid #ffffff;">
                        <option value="">Select</option>
                        <option value="harian">Harian</option>
                        <option value="mingguan">Mingguan</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                    &nbsp;
                    <div>
                        <div class="input-group">
                            <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                        </div>
                        <!-- input-group -->
                    </div>
                    </div>
                    <br><br><br>
                    <div
                    style="width: 100%;height: 15%;display: flex;justify-content: center;align-items: center;flex-direction: column;font-size:12px;">
                    <div>closing</div>
                    <div style="font-weight: bold; height:23px; width:67px; ">{{ $getTeleReward['count'] }} Closing</div>
                    </div>
                    <br>
                    <div
                        style="width: 100%;height: 14%;display: flex;justify-content: center;align-items: center;flex-direction: column;font-size:12px;">
                        <div>Premi</div>
                        <div style="font-weight: bold;">{{ $getTeleReward['count'] }} Premi</div>
                    </div>
                    <br>
                    <div
                        style="width: 100%;height: 12%;display: flex;justify-content: center;align-items: center;flex-direction: column;font-size:12px;">
                        <div>Pendapatan Polis</div>
                        <div style="font-weight: bold;">
                            {{ "Rp " . number_format($getTeleReward['total_pendapatan'],0,',','.') }}</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <br>
                    <div style="width: 100%;height: 10%;display: flex;justify-content: center;align-items: center;">Hello !</div>
                    <br><br><br>
                    <div
                        style="width: 100%;height: 25%;display: flex;justify-content: center;align-items: center;flex-direction: column;padding: 5px;">
                        <div
                            style="width: 60px;height: 60px;border-radius: 50%;display:flex;justify-content:center;align-items:center;object-fit:contain;">
                            @if ( $getTeleReward['foto_tele'] == null || $getTeleReward['foto_tele'] == '-' )
                            <img src="https://i.pravatar.cc/60" alt="image" style="border-radius: 50%; width:150px; height:150px; left:0%; right:0%; top:0%; bottom:0%;"/>
                            @else
                            <img src="{{ asset('property', $getTeleReward['foto_tele']) }}" alt="image" style="border-radius: 50%; width:200px; height:200px; left:0%; right:0%; top:0%; bottom:0%;"/>
                            @endif
                        </div>
                    </div>
                    <br><br><br>
                    <div
                        style="width: 100%;height: 12%;display: flex;justify-content: center;align-items: center;flex-direction: column;font-size:12px;">
                        <div>Congrats Atas Pencapaianya</div>
                        <div style="font-weight: bold;"><h2>{{ $getTeleReward['nama'] }}</h2></div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="w-100 h-100 p-1 telemarketing">
            <div class="row">
                <div style="height:20%;width: 100%;display: flex;justify-content: center;align-items: center;">
                    <div>
                        Telemarketing
                    </div>
                </div>

                <div class="col-lg-6">
                    <div style="width: 100%;height: 85%;overflow: auto;">
                        <ul>
                            @foreach ($getHistoryTele as $historyTele)
                            @if($historyTele->id_tele > 0 && $historyTele->id_tele <= 5)
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
                                <li style="background-color: #000000">
                                    <div
                                        style="height: 60%;width: 100%;display: flex;align-items: center;padding: 5px;font-weight: bold;flex-direction: row;">
                                        {{ $historyTele->nama }}

                                    </div>
                                    <div style="width: 100%;height:40%;padding-left: 5px;">
                                        {{'Aktif'. ' '. \Carbon\Carbon::parse($historyTele->last_login_at)->diffForHumans() }}
                                    </div>
                                </li>
                                @endif
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div style="width: 100%;height: 85%;overflow: auto;">
                        <ul>
                            @foreach ($getHistoryTele as $historyTele)
                            @if($historyTele->id_tele >= 6 && $historyTele->id_tele <= 10)
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
                                <li style="background-color: #000000">
                                    <div
                                        style="height: 60%;width: 100%;display: flex;align-items: center;padding: 5px;font-weight: bold;flex-direction: row;">
                                        {{ $historyTele->nama }}

                                    </div>
                                    <div style="width: 100%;height:40%;padding-left: 5px;">
                                        {{'Aktif'. ' '. \Carbon\Carbon::parse($historyTele->last_login_at)->diffForHumans() }}
                                    </div>
                                </li>
                                @endif
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <center>
                    {{ $getHistoryTele->links() }}</center>
                    <br>
            </div>
        </div>
    </div>
    <div class="col-xl-8 p-1" style="height:100%;">
        <div class="w-100 h-100" style="background-color: #222222;border-radius: 5px;">
            <div class="card-body">
                <center>
                    <h4 class="card-title mb-4">PREMIUM TOTAL</h4>
                </center>

                <center>
                    <div class="row" style="display: flex;justify-content: center;align-items: center;">
                        <div class="row " style="width: 60%;display:flex;justify-content: center;align-items: center;">
                            <div class="col-lg-3 ">
                                <div class="card text-white "
                                    style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #EA6ACC 0%, #020202 178.11%);">
                                    <div class="card-body">
                                       <center>
                                        <p>Daily</p>
                                        <h1>{{ $premiumTotalCountDaily }}</h1>
                                        <button type="button" data-bs-toggle="modal" id="detailPremiumTotalDaily"
                                            data-bs-target=".detailPremiumTotalDaily" class="btn btn-outline-light waves-effect"
                                            style="color:#fff; border-color:#fff;">Detail</button>
                                        <i class="ion ion-md-download" style="width:35px; height:35px;"></i></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card text-white bg-warning"
                                    style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #F6AE99 0.59%, #020202 178.11%);">
                                    <div class="card-body">
                                        <center>
                                            <p>Weekly</p>
                                            <h1>{{ $premiumTotalCountWeekly }}</h1>
                                            <button type="button" data-bs-toggle="modal" id="detailPremiumTotalWeekly"
                                                data-bs-target=".detailPremiumTotalWeekly" class="btn btn-outline-light waves-effect"
                                                style="color:#fff; border-color:#fff;">Detail</button>
                                            <i class="ion ion-md-download"></i>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card text-white bg-danger"
                                    style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #448695 1.4%, #020202 178.11%);">
                                    <div class="card-body">
                                        <center>
                                            <p>Monthly</p>
                                            <h1>{{ $premiumTotalCountMonthly }}</h1>
                                            <button type="button" data-bs-toggle="modal" id="detailPremiumTotalMonthly"
                                                data-bs-target=".detailPremiumTotalMonthly" class="btn btn-outline-light waves-effect"
                                                style="color:#fff; border-color:#fff;">Detail</button>
                                            <i class="ion ion-md-download"></i>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card text-white bg-warning"
                                    style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #FDE584 -0.07%, #020202 178.11%);">
                                    <div class="card-body">
                                        <center>
                                            <p>Yearly</p>
                                            <h1>{{ $premiumTotalCountYearly }}</h1>
                                            <button type="button" data-bs-toggle="modal" id="detailPremiumTotalYearly"
                                                data-bs-target=".detailPremiumTotalYearly" class="btn btn-outline-light waves-effect"
                                                style="color:#fff; border-color:#fff;">Detail</button>
                                            <i class="ion ion-md-download"></i>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <fieldset>
                        </div>
                    </div>
                </center>
                <hr style="left: 51px; top: 695.34px; border-radius: 20px; border: 4px solid #ffffff; color: #ffffff;">

                <!-- end row -->
                <div class="row">
                    <div class="col-4" style="display: flex;justify-content: center;align-items: center;height: 10vh">
                        <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
                            <div style="width: 100%;height: 100%; text-align: center;">
                                <div class="row">
                                    <div>
                                        Premium Tahun 1 Chart
                                    </div>
                                    <br>
                                    <div class="col-lg-6">
                                        <div style="display: flex;margin-top: 5px;">
                                            <select class="form-control" id="select_top10_1"
                                                style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 3px; border: 2px solid #ffffff;">
                                                <option value="">Select</option>
                                                <option value="harian">Harian</option>
                                                <option value="mingguan">Mingguan</option>
                                                <option value="tahunan">Tahunan</option>
                                            </select>
                                            &nbsp;
                                            <div>
                                                <div class="input-group">
                                                    <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                                </div>
                                                <!-- input-group -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">

                                        <a href="#" data-bs-toggle="modal" id="detailPremiumTahun1Chart"
                                        data-bs-target=".detailPremiumTahun1Chart" style="width: 100px;height: 44.29px;border-radius: 7px; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;">
                                        <div>
                                            Detail
                                        </div>
                                    </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4" style="display: flex;justify-content: center;align-items: center;height: 10vh">
                        <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
                            <div style="width: 100%;height: 100%; text-align: center;">
                                <div class="row">
                                    <div>
                                        Premium PLTP Chart
                                    </div>
                                    <br>
                                    <div class="col-lg-6">
                                        <div style="display: flex;margin-top: 5px;">
                                            <select class="form-control" id="select_top10_1"
                                                style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 3px; border: 2px solid #ffffff;">
                                                <option value="">Select</option>
                                                <option value="harian">Harian</option>
                                                <option value="mingguan">Mingguan</option>
                                                <option value="tahunan">Tahunan</option>
                                            </select>
                                            &nbsp;
                                            <div>
                                                <div class="input-group">
                                                    <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                                </div>
                                                <!-- input-group -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">

                                        <a href="#" data-bs-toggle="modal" id="detailPremiumPltpChart"
                                        data-bs-target=".detailPremiumPltpChart" style="width: 100px;height: 44.29px;border-radius: 7px; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;">
                                        <div>
                                            Detail
                                        </div>
                                    </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4" style="display: flex;justify-content: center;align-items: center;height: 10vh;">
                        <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
                            <div style="width: 100%;height: 100%; text-align: center;">
                                <div class="row">
                                    <div>
                                        Premium Total Chart
                                    </div>
                                    <br>
                                    <div class="col-lg-6">
                                        <div style="display: flex;margin-top: 5px;">
                                            <select class="form-control" id="select_top10_1"
                                                style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 3px; border: 2px solid #ffffff;">
                                                <option value="">Select</option>
                                                <option value="harian">Harian</option>
                                                <option value="mingguan">Mingguan</option>
                                                <option value="tahunan">Tahunan</option>
                                            </select>
                                            &nbsp;
                                            <div>
                                                <div class="input-group">
                                                    <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                                </div>
                                                <!-- input-group -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">

                                        <a href="#" data-bs-toggle="modal" id="detailPremiumTotalChart"
                                        data-bs-target=".detailPremiumTotalChart" style="width: 100px;height: 40px;border-radius: 7px; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;">
                                        <div>
                                            Detail
                                        </div>
                                    </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-4 ">
                        <div id="premiumTahun1Chart" dir="ltr" style="height:100%;"></div>
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
        <br>
        <div class="w-100 h-100" style="background-color: #222222;border-radius: 5px;">
            <div class="card-body">
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
    </div>
</div>
{{--
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
                <div
                    style="width: 60px;height: 60px;border-radius: 50%;background-color: orange;display:flex;justify-content:center;align-items:center;object-fit:contain;">
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

</div> --}}
<!-- end row -->


<div class="modal fade detailSpajSubmittedDaily" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Spaj Submitted Daily</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailSpajSubmittedWeekly" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Spaj Submitted Weekly</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="exampleWeekly" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailSpajSubmittedMonthly" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Spaj Submitted Monthly</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="exampleMonthly" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailSpajSubmittedYearly" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Spaj Submitted Yearly</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="exampleYearly" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade detailPremiumTotalDaily" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail PremiumTotal Daily</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="tablePremiumTotalDaily" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Produk</th>
                                            <th>Premi Total</th>
                                            <th>Telesales</th>
                                            <th>Tahun Ke</th>
                                            <th>Tanggal Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Produk</th>
                                            <th>Premi Total</th>
                                            <th>Telesales</th>
                                            <th>Tahun Ke</th>
                                            <th>Tanggal Pembayaran</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailPremiumTotalWeekly" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Premium Total Weekly</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="tablePremiumTotalWeekly" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Produk</th>
                                            <th>Premi Total</th>
                                            <th>Telesales</th>
                                            <th>Tahun Ke</th>
                                            <th>Tanggal Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Produk</th>
                                            <th>Premi Total</th>
                                            <th>Telesales</th>
                                            <th>Tahun Ke</th>
                                            <th>Tanggal Pembayaran</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailPremiumTotalMonthly" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Premium Total Monthly</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="tablePremiumTotalMonthly" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Produk</th>
                                            <th>Premi Total</th>
                                            <th>Telesales</th>
                                            <th>Tahun Ke</th>
                                            <th>Tanggal Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Produk</th>
                                            <th>Premi Total</th>
                                            <th>Telesales</th>
                                            <th>Tahun Ke</th>
                                            <th>Tanggal Pembayaran</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailPremiumTotalYearly" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Premium Total Yearly</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="tablePremiumTotalYearly" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Produk</th>
                                            <th>Premi Total</th>
                                            <th>Telesales</th>
                                            <th>Tahun Ke</th>
                                            <th>Tanggal Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Produk</th>
                                            <th>Premi Total</th>
                                            <th>Telesales</th>
                                            <th>Tahun Ke</th>
                                            <th>Tanggal Pembayaran</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


{{-- Detail Chart  --}}

<div class="modal fade detailPremiumSubmitted" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Premium Submitted Chart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="examplePremiumSubmitted" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Total Premi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Total Premi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailSpajSubmittedChart" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Spaj Submitted Chart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="exampleSpajSubmittedChart" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Jumlah Spaj</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Jumlah Spaj</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- End Detail Sppj Chart --}}

<div class="modal fade detailPoliceApprovedChart" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Premium Submitted Chart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="examplePoliceApprovedChart" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Total Premi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Total Premi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailTotalPremiumChart" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Total Premium Chart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="exampleTotalPremiumChart" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Jumlah Spaj</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Jumlah Spaj</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- End Detail Police Approved Chart --}}

{{-- Start Detail Premium Total Chart --}}
<div class="modal fade detailPremiumTahun1Chart" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Premium Tahun 1 Chart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="tablePremiumTahun1Chart" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Total Premi</th>
                                            <th>Premi Tahun Ke</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Total Premi</th>
                                            <th>Premi Tahun Ke</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailPremiumPltpChart" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Premium Total Chart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="tablePremiumPltpChart" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Total Premi</th>
                                            <th>Premi Tahun Ke</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Total Premi</th>
                                            <th>Premi Tahun Ke</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailPremiumTotalChart" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Premium Total Chart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="tablePremiumTotalChart" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Total Premi</th>
                                            <th>Premi Tahun Ke</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Total Premi</th>
                                            <th>Premi Tahun Ke</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

{{-- End Detail Premium Total Chart --}}

<div class="modal fade detailPoliceApprovedDaily" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Police Approved Daily</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="examplePoliceApprovedDaily" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailPoliceApprovedWeekly" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Police Approved Weekly</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="examplePoliceApprovedWeekly" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailPoliceApprovedMonthly" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Police Approved Monthly</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="examplePoliceApprovedMonthly" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade detailPoliceApprovedYearly" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="height:20%;max-width: 100%;background-color:#222222;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #222222;">
                <h5 class="modal-title mt-0">Detail Police Approved Yearly</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" style="background-color: #222222;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="examplePoliceApprovedYearly" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%; background-color:#222222; color:#fff;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Proposal</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Nama Produk</th>
                                            <th>Premi</th>
                                            <th>Telesales</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection


@push('js')
{{-- Charts --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>


<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ asset('assets/js/datatable.js') }}"></script>

<script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
<script type="text/javascript">
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = tanggal.getHours() + ' : ' + tanggal.getMinutes() + ' : ' + tanggal
            .getSeconds();
    }

    google.charts.load('current', {
        'packages': ['corechart', 'bar']
    });
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
                echo "['".\Carbon\ Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                "', '".(int)$spaj->count.
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
            responsive: true,
            backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.8
            },
            colors: '#FB6EAA',
            bar: {
                groupWidth: "75%"
            },
            bars: 'vertical',
            width: '100%',
            height: '75%',
            isStacked: true,
        }
        var chart = new google.charts.Bar(document.getElementById('spajSubmittedChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function premiumChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', 'Premi'],
            @php
            foreach($premiumSubmitted as $spaj) {
                echo "['".\Carbon\ Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                "', '".
                "Rp".number_format((int)$spaj->sum_nominal, 0, ',', '.').
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
            responsive: true,
            backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.8
            },
            colors: '#FB6EAA',
            bar: {
                groupWidth: "75%"
            },
            bars: 'vertical',
            width: '100%',
            height: '75%',
            isStacked: true,
        }
        var chart = new google.charts.Bar(document.getElementById('premiumSubmittedChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function policeApprovedChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', ''],
            @php
            foreach($policeApprovedChart as $spaj) {
                echo "['".\Carbon\ Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                "', '".(int) $spaj->count.
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
            responsive: true,
            backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.8
            },
            colors: '#FB6EAA',
            bar: {
                groupWidth: "75%"
            },
            bars: 'vertical',
            width: '100%',
            height: '75%',
            isStacked: true,
        }

        var chart = new google.charts.Bar(document.getElementById('policeApprovedChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));

    }

    function totalPremiumChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', ''],
            @php
            foreach($totalPremiumChart as $spaj) {
                echo "['".\Carbon\ Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                "', '".
                "Rp".number_format($spaj->sum_nominal, 0, ',', '.').
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
            responsive: true,
            backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.8
            },
            colors: '#FB6EAA',
            bar: {
                groupWidth: "75%"
            },
            bars: 'vertical',
            width: '100%',
            height: '75%',
            isStacked: true,
        }

        var chart = new google.charts.Bar(document.getElementById('totalPremiumChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function premiumTahun1Chart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', ''],
            @php
            foreach($premiumTahun1Chart as $premiumTotal) {
                echo "['".\Carbon\ Carbon::parse($premiumTotal->month_name)->isoFormat('MMMM').
                "', '".
                "Rp".number_format($premiumTotal->sum_nominal, 0, ',', '.').
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
            responsive: true,
            backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.8
            },
            colors: '#7BC2EC',
            bar: {
                groupWidth: "75%"
            },
            bars: 'vertical',
            width: '100%',
            height: '75%',
            isStacked: true,
        }

        var chart = new google.charts.Bar(document.getElementById('premiumTahun1Chart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function premiumPltpChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', ''],
            @php
            foreach($premiumPltpChart as $premiumTotal) {
                echo "['".\Carbon\ Carbon::parse($premiumTotal->month_name)->isoFormat('MMMM').
                "', '".
                "Rp".number_format($premiumTotal->sum_nominal, 0, ',', '.').
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
            responsive: true,
            backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.8
            },
            colors: '#7BC2EC',
            bar: {
                groupWidth: "75%"
            },
            bars: 'vertical',
            width: '100%',
            height: '75%',
            isStacked: true,
        }

        var chart = new google.charts.Bar(document.getElementById('premiumPltpChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function premiumTotalChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', ''],
            @php
            foreach($premiumTotalChart as $premiumTotal) {
                echo "['".\Carbon\ Carbon::parse($premiumTotal->month_name)->isoFormat('MMMM').
                "', '".
                "Rp".number_format($premiumTotal->sum_nominal, 0, ',', '.').
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
            responsive: true,
            backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.8
            },
            colors: '#7BC2EC',
            bar: {
                groupWidth: "75%"
            },
            bars: 'vertical',
            width: '100%',
            height: '75%',
            isStacked: true,
        }

        var chart = new google.charts.Bar(document.getElementById('premiumTotalChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

</script>

<script type="text/javascript">
    $("#date").hide();
    $("#rangeDate").hide();
    $("#bulanDate").hide();
    $("#tahunDate").hide();

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

        function reset()
        {
            $('input').val('');
            $('#bulanAwal').val('');
            $('#bulanAkhir').val('');
            $('#tahunAwal').val('');
            $('#tahunAkhir').val('');

        }
        function loadFilter()
        {
            var eID = document.getElementById("filterData");
            var dayVal = eID.options[eID.selectedIndex].value;
            var daytxt = eID.options[eID.selectedIndex].text;

            if (dayVal == 'mingguan') {
                var data = {"filterData":$('#filterData').val()};
                console.log($('#filterData').val());

                $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/spaj/filterMingguPremiumSubmitted') }}",
                data: JSON.stringify(data),
                dataType:"json",
                processData:false,
                contentType:"application/json",
                cache:false,
                success:function(response){
                        google.charts.load('current', {
                            'packages': ['corechart', 'bar']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                        var data = google.visualization.arrayToDataTable(response.data);

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
                            responsive: true,
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.8
                            },
                            colors: '#FB6EAA',
                            bar: {
                                groupWidth: "75%"
                            },
                            bars: 'vertical',
                            width: '100%',
                            height: '75%',
                            isStacked: true,
                            }
                    var chart = new google.charts.Bar(document.getElementById('premiumSubmittedChart'));
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                    }

                },
                error:function(error){
                    console.log(error);
                }
                });
                $("#date").hide();
                $("#rangeDate").hide();
                $("#tahunDate").hide();
            } else if(dayVal == 'select') {
                $("#date").hide();
                $("#rangeDate").hide();
                $("#bulanDate").hide();
                $("#tahunDate").hide();
                reset();
                google.charts.load('current', {
                    'packages': ['corechart', 'bar']
                });
                google.charts.setOnLoadCallback(premiumChart);


            function premiumChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Bulan', 'Premi'],
                    @php
                    foreach($premiumSubmitted as $spaj) {
                        echo "['".\Carbon\ Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                        "', '".
                        "Rp".number_format((int)$spaj->sum_nominal, 0, ',', '.').
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
                        responsive: true,
                        backgroundColor: {
                            fill: '#222222',
                            fillOpacity: 0.8
                        },
                        colors: '#FB6EAA',
                        bar: {
                            groupWidth: "75%"
                        },
                        bars: 'vertical',
                        width: '100%',
                        height: '75%',
                        isStacked: true,
                    }
                    var chart = new google.charts.Bar(document.getElementById('premiumSubmittedChart'));
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }

            } else if(dayVal == 'harian') {
                var data = {"filterData":$('#filterData').val()};
                console.log($('#filterData').val());

                $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/spaj/filterHarianPremiumSubmitted') }}",
                data: JSON.stringify(data),
                dataType:"json",
                processData:false,
                contentType:"application/json",
                cache:false,
                success:function(response){
                        google.charts.load('current', {
                            'packages': ['corechart', 'bar']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                        var data = google.visualization.arrayToDataTable(response.data);

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
                        responsive: true,
                        backgroundColor: {
                            fill: '#222222',
                            fillOpacity: 0.8
                        },
                        colors: '#FB6EAA',
                        bar: {
                            groupWidth: "350px"
                        },
                        bars: 'vertical',
                        width: '350px',
                        height: '75%',
                        isStacked: true,
                        }
                        var chart = new google.charts.Bar(document.getElementById('premiumSubmittedChart'));
                        chart.draw(data, google.charts.Bar.convertOptions(options));
                        }

                },
                error:function(error){
                    console.log(error);
                }
            });
                $("#date").hide();
                $("#rangeDate").hide();
                $("#tahunDate").hide();
                reset();
            } else if(dayVal == 'bulanan') {
                $("#date").hide();
                $("#rangeDate").hide();
                $("#bulanDate").show();
                $("#tahunDate").hide();
                reset();
            } else if(dayVal == 'tahunan') {
                $("#date").hide();
                $("#rangeDate").hide();
                $("#bulanDate").hide();
                $("#tahunDate").show();
                reset();
            }

        }

        function filterMonth()
        {
            var data = {"bulan_awal":$('#bulanAwal').val(), "bulan_akhir":$('#bulanAkhir').val()};
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/spaj/filterBulanPremiumSubmitted') }}",
                data: JSON.stringify(data),
                dataType:"json",
                processData:false,
                contentType:"application/json",
                cache:false,
                success:function(response){
                        google.charts.load('current', {
                            'packages': ['corechart', 'bar']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                        var data = google.visualization.arrayToDataTable(response.data);

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
                            responsive: true,
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.8
                            },
                            colors: '#FB6EAA',
                            bar: {
                                groupWidth: "75%"
                            },
                            bars: 'vertical',
                            width: '100%',
                            height: '75%',
                            isStacked: true,
                            }
                            var chart = new google.charts.Bar(document.getElementById('premiumSubmittedChart'));
                            chart.draw(data, google.charts.Bar.convertOptions(options));
                         }

                },
                error:function(error){
                    console.log(error);
                }
            });
        }

        function filterYear()
        {
            var data = {"tahun_awal":$('#tahunAwal').val(), "tahun_akhir":$('#tahunAkhir').val()};
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/spaj/filterTahunPremiumSubmitted') }}",
                data: JSON.stringify(data),
                dataType:"json",
                processData:false,
                contentType:"application/json",
                cache:false,
                success:function(response){
                        google.charts.load('current', {
                            'packages': ['corechart', 'bar']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                        var data = google.visualization.arrayToDataTable(response.data);

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
                            responsive: true,
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.8
                            },
                            colors: '#FB6EAA',
                            bar: {
                                groupWidth: "75%"
                            },
                            bars: 'vertical',
                            width: '100%',
                            height: '75%',
                            isStacked: true,
                            }
                            var chart = new google.charts.Bar(document.getElementById('premiumSubmittedChart'));
                            chart.draw(data, google.charts.Bar.convertOptions(options));
                         }

                },
                error:function(error){
                    console.log(error);
                }
            });
        }



</script>
@endpush
