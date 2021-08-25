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
                                </center>
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
                                        <select class="form-control" id="filterDataSubmittedChart" onchange="loadFilterSpajSubmittedChart();"
                                            style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                            <option value="select">Select <i class="fas fa-arrow-down" style="color:#fff;"></i></option>
                                            <option value="harian">Harian</option>
                                            <option value="mingguan">Mingguan</option>
                                            <option value="bulanan">Bulanan</option>
                                            <option value="tahunan">Tahunan</option>
                                        </select>
                                        &nbsp;
                                        <div id="dateSubmittedChart">
                                            <div class="input-group">
                                                <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                            </div>
                                            <!-- input-group -->
                                        </div>
                                        <div id="rangeDateSubmittedChart">
                                            <div class="input-daterange input-group" data-date-format="dd M, yyyy"  data-date-autoclose="true"  data-provide="datepicker">
                                                <input type="text" class="form-control" name="start" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                                <input type="text" class="form-control" name="end" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                            </div>
                                            <!-- input-group -->
                                        </div>

                                        <div id="bulanDateSubmittedChart">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="bulan_awal" id="bulanAwal" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                        <option value="">Bulan 1</option>
                                                        @foreach($bulan as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-lg-6">
                                                    <select class="form-control" name="bulan_akhir" id="bulanAkhir" onchange="filterMonthSpajSubmittedChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                        <option value="">Bulan 2</option>
                                                        @foreach($bulan as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- input-group -->
                                        </div>

                                        <div id="tahunDateSubmittedChart">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="tahun_awal" id="tahunAwal" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                        <option value="">Tahun 1</option>
                                                        @for($year=2010; $year<=date('Y'); $year++)
                                                        <option value="{{ $year }}"> {{ $year }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="col-lg-6">
                                                    <select class="form-control" name="tahun_akhir" id="tahunAkhir" onchange="filterYearSpajSubmittedChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
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
                                <a href="#" data-bs-toggle="modal" id="detailSpajSubmittedChart"
                                data-bs-target=".detailSpajSubmittedChart"
                                    style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;cursor: pointer;">
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
                                            style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
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
                                                <input type="text" class="form-control" name="start" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                                <input type="text" class="form-control" name="end" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                            </div>
                                            <!-- input-group -->
                                        </div>

                                        <div id="bulanDate">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="bulan_awal" id="bulanAwalPremiumSubmittedChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                        <option value="">Bulan 1</option>
                                                        @foreach($bulan as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-lg-6">
                                                    <select class="form-control" name="bulan_akhir" id="bulanAkhirPremiumSubmittedChart" onchange="filterMonth();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
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
                                                    <select class="form-control" name="tahun_awal" id="tahunAwalPremiumSubmittedChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                        <option value="">Tahun 1</option>
                                                        @for($year=2010; $year<=date('Y'); $year++)
                                                        <option value="{{ $year }}"> {{ $year }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="col-lg-6">
                                                    <select class="form-control" name="tahun_akhir" id="tahunAkhirPremiumSubmittedChart" onchange="filterYear();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
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
                                <a href="#" data-bs-toggle="modal" id="detailPremiumSubmitted"
                                data-bs-target=".detailPremiumSubmitted"
                                style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;cursor: pointer;">
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
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-white bg-warning"
                            style="width:155px; height:158.34px; background: linear-gradient(223.77deg, #F6AE99 0.59%, #020202 178.11%);">
                            <div class="card-body">
                                <center>
                                    <p>Weekly</p>
                                    <h1>{{ $policeApprovedCountWeekly->count() }}</h1>
                                    <button type="button" data-bs-toggle="modal" id="detailPoliceApprovedWeekly"
                                        data-bs-target=".detailPoliceApprovedWeekly" class="btn btn-outline-light waves-effect"
                                        style="color:#fff; border-color:#fff;">Detail</button>

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
                                        <select class="form-control" id="filterDataPoliceApprovedChart" onchange="loadFilterPoliceApprovedChart();"
                                            style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                            <option value="select">Select</option>
                                            <option value="harian">Harian</option>
                                            <option value="mingguan">Mingguan</option>
                                            <option value="bulanan">Bulanan</option>
                                            <option value="tahunan">Tahunan</option>
                                        </select>
                                        &nbsp;
                                        <div id="datePoliceApprovedChart">
                                            <div class="input-group">
                                                <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                            </div>
                                            <!-- input-group -->
                                        </div>
                                        <div id="rangeDatePoliceApprovedChart">
                                            <div class="input-daterange input-group" data-date-format="dd M, yyyy"  data-date-autoclose="true"  data-provide="datepicker">
                                                <input type="text" class="form-control" name="start" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                                <input type="text" class="form-control" name="end" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                            </div>
                                            <!-- input-group -->
                                        </div>

                                        <div id="bulanDatePoliceApprovedChart">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="bulan_awal" id="bulanAwalPoliceApprovedChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                        <option value="">Bulan 1</option>
                                                        @foreach($bulan as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-lg-6">
                                                    <select class="form-control" name="bulan_akhir" id="bulanAkhirPoliceApprovedChart" onchange="filterMonthPoliceApprovedChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                        <option value="">Bulan 2</option>
                                                        @foreach($bulan as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- input-group -->
                                        </div>

                                        <div id="tahunDatePoliceApprovedChart">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="tahun_awal" id="tahunAwalPoliceApprovedChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                        <option value="">Tahun 1</option>
                                                        @for($year=2010; $year<=date('Y'); $year++)
                                                        <option value="{{ $year }}"> {{ $year }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="col-lg-6">
                                                    <select class="form-control" name="tahun_akhir" id="tahunAkhirPoliceApprovedChart" onchange="filterYearPoliceApprovedChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
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
                                <a href="#" data-bs-toggle="modal" id="detailPoliceApprovedChart"
                                data-bs-target=".detailPoliceApprovedChart"
                                style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;cursor: pointer;">
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
                                        <select class="form-control" id="filterDataTotalPremiumChart" onchange="loadFilterTotalPremiumChart();"
                                            style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                            <option value="select">Select</option>
                                            <option value="harian">Harian</option>
                                            <option value="mingguan">Mingguan</option>
                                            <option value="bulanan">Bulanan</option>
                                            <option value="tahunan">Tahunan</option>
                                        </select>
                                        &nbsp;
                                        <div id="dateTotalPremiumChart">
                                            <div class="input-group">
                                                <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                            </div>
                                            <!-- input-group -->
                                        </div>
                                        <div id="rangeDateTotalPremiumChart">
                                            <div class="input-daterange input-group" data-date-format="dd M, yyyy"  data-date-autoclose="true"  data-provide="datepicker">
                                                <input type="text" class="form-control" name="start" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                                <input type="text" class="form-control" name="end" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                            </div>
                                            <!-- input-group -->
                                        </div>

                                        <div id="bulanDateTotalPremiumChart">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="bulan_awal" id="bulanAwalTotalPremiumChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                        <option value="">Bulan 1</option>
                                                        @foreach($bulan as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-lg-6">
                                                    <select class="form-control" name="bulan_akhir" id="bulanAkhirTotalPremiumChart" onchange="filterMonthTotalPremiumChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                        <option value="">Bulan 2</option>
                                                        @foreach($bulan as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- input-group -->
                                        </div>

                                        <div id="tahunDateTotalPremiumChart">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <select class="form-control" name="tahun_awal" id="tahunAwalTotalPremiumChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                        <option value="">Tahun 1</option>
                                                        @for($year=2010; $year<=date('Y'); $year++)
                                                        <option value="{{ $year }}"> {{ $year }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="col-lg-6">
                                                    <select class="form-control" name="tahun_akhir" id="tahunAkhirTotalPremiumChart" onchange="filterYearTotalPremiumChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
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
                                style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;cursor: pointer;">
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
    <div class="col-xl-4 p-1" style="height:59.5vh;">
        <div class="h-100" style="width: 100%;background-color: #222222; border-radius:5px;">
            <div class="row">
                <div class="col-lg-6">
                    <br><br><br>
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
                    <br><br><br>
                    <div style="width: 100%;height: 10%;display: flex;justify-content: center;align-items: center;">Hello !</div>
                    <br><br><br><br>
                    <div
                        style="width: 100%;height: 25%;display: flex;justify-content: center;align-items: center;flex-direction: column;padding: 5px;">
                        <div
                            style="width: 60px;height: 60px;border-radius: 50%;display:flex;justify-content:center;align-items:center;object-fit:contain;">
                            @if ( $getTeleReward['foto_tele'] == null || $getTeleReward['foto_tele'] == '-' )
                            <img src="https://i.pravatar.cc/60" alt="image" style="border-radius: 50%; width:300px; height:250px; left:0%; right:0%; top:0%; bottom:0%;"/>
                            @else
                            <img src="{{ asset('property', $getTeleReward['foto_tele']) }}" alt="image" style="border-radius: 50%; width:300px; height:150px; left:0%; right:0%; top:0%; bottom:0%;"/>
                            @endif
                        </div>
                    </div>
                    <br><br><br><br><br>
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
            <br>
            <div class="row">
                <div style="height:20%;width: 100%;display: flex;justify-content: center;align-items: center;">
                    <div>
                        Telemarketing
                    </div>
                </div>
                <br><br>
                <div class="col-lg-6" style="height:73vh;">
                    <div style="width: 100%;height: 100%;overflow: auto;">
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
                                        </center>
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

                                        </center>
                                    </div>
                                </div>
                            </div>
                            <fieldset>
                        </div>
                    </div>
                </center>
                <hr style="left: 51px; top: 695.34px; border-radius: 20px; border: 4px solid #ffffff; color: #ffffff;">
                <div style="width: 100%;height: 100%; text-align: center;">
                    <div class="row">
                       <div class="col-lg-4">
                           <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
                               <div style="width: 50%;height: 100%; text-align: center;">
                                   <div>
                                       Premium Tahun 1 Chart
                                   </div>
                                   <div style="display: flex;margin-top: 5px;">
                                    <select class="form-control" id="filterDataPremiumTotalTahun1Chart" onchange="loadFilterPremiumTotalTahun1Chart();"
                                        style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                        <option value="select">Select</option>
                                        <option value="harian">Harian</option>
                                        <option value="mingguan">Mingguan</option>
                                        <option value="bulanan">Bulanan</option>
                                        <option value="tahunan">Tahunan</option>
                                    </select>
                                    &nbsp;
                                    <div id="datePremiumTotalTahun1Chart">
                                        <div class="input-group">
                                            <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                        </div>
                                        <!-- input-group -->
                                    </div>
                                    <div id="rangedatePremiumTotalTahun1Chart">
                                        <div class="input-daterange input-group" data-date-format="dd M, yyyy"  data-date-autoclose="true"  data-provide="datepicker">
                                            <input type="text" class="form-control" name="start" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                            <input type="text" class="form-control" name="end" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                        </div>
                                        <!-- input-group -->
                                    </div>

                                    <div id="bulandatePremiumTotalTahun1Chart">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <select class="form-control" name="bulan_awal" id="bulanAwalPremiumTotalTahun1Chart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                    <option value="">Bulan 1</option>
                                                    @foreach($bulan as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <select class="form-control" name="bulan_akhir" id="bulanAkhirPremiumTotalTahun1Chart" onchange="filterMonthPremiumTotalTahun1Chart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                    <option value="">Bulan 2</option>
                                                    @foreach($bulan as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- input-group -->
                                    </div>

                                    <div id="tahundatePremiumTotalTahun1Chart">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <select class="form-control" name="tahun_awal" id="tahunAwalPremiumTotalTahun1Chart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                    <option value="">Tahun 1</option>
                                                    @for($year=2010; $year<=date('Y'); $year++)
                                                    <option value="{{ $year }}"> {{ $year }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <select class="form-control" name="tahun_akhir" id="tahunAkhirPremiumTotalTahun1Chart" onchange="filterYearPremiumTotalTahun1Chart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
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
                               <a href="#" data-bs-toggle="modal" id="detailPremiumTahun1Chart"
                               data-bs-target=".detailPremiumTahun1Chart" style="width: 80px;height: 44.29px;border-radius: 7px; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;">
                               <div>
                                   Detail
                               </div>
                           </a>
                           </div>
                           <div id="premiumTahun1Chart" style="height:420px; max-width: 100%;"></div>
                       </div>
                       <div class="col-lg-4">
                           <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
                               <div style="width: 50%;height: 100%; text-align: center;">
                                   <div>
                                    Premium PLTP Chart
                                   </div>
                                   <div style="display: flex;margin-top: 5px;">
                                    <select class="form-control" id="filterDataPremiumPltpChart" onchange="loadFilterPremiumPltpChart();"
                                        style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                        <option value="select">Select</option>
                                        <option value="harian">Harian</option>
                                        <option value="mingguan">Mingguan</option>
                                        <option value="bulanan">Bulanan</option>
                                        <option value="tahunan">Tahunan</option>
                                    </select>
                                    &nbsp;
                                    <div id="datePremiumPltpChart">
                                        <div class="input-group">
                                            <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                        </div>
                                        <!-- input-group -->
                                    </div>
                                    <div id="rangedatePremiumPltpChart">
                                        <div class="input-daterange input-group" data-date-format="dd M, yyyy"  data-date-autoclose="true"  data-provide="datepicker">
                                            <input type="text" class="form-control" name="start" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                            <input type="text" class="form-control" name="end" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                        </div>
                                        <!-- input-group -->
                                    </div>

                                    <div id="bulandatePremiumPltpChart">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <select class="form-control" name="bulan_awal" id="bulanAwalPremiumPltpChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                    <option value="">Bulan 1</option>
                                                    @foreach($bulan as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <select class="form-control" name="bulan_akhir" id="bulanAkhirPremiumPltpChart" onchange="filterMonthPremiumPltpChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                    <option value="">Bulan 2</option>
                                                    @foreach($bulan as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- input-group -->
                                    </div>

                                    <div id="tahundatePremiumPltpChart">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <select class="form-control" name="tahun_awal" id="tahunAwalPremiumPltpChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                    <option value="">Tahun 1</option>
                                                    @for($year=2010; $year<=date('Y'); $year++)
                                                    <option value="{{ $year }}"> {{ $year }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <select class="form-control" name="tahun_akhir" id="tahunAkhirPremiumPltpChart" onchange="filterYearPremiumPltpChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
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
                               <a href="#" data-bs-toggle="modal" id="detailPremiumPltpChart"
                               data-bs-target=".detailPremiumPltpChart" style="width: 100px;height: 44.29px;border-radius: 7px; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;">
                               <div>
                                   Detail
                               </div>
                           </a>
                           </div>
                           <div id="premiumPltpChart" style="height:420px; max-width: 100%;" dir="ltr"></div>
                       </div>
                       <div class="col-lg-4">
                           <div style="width: 100%;height: 20%;display: flex;justify-content: center;align-items: center;">
                               <div style="width: 50%;height: 100%; text-align: center;">
                                   <div>
                                       Premium Total Chart
                                   </div>
                                   <div style="display: flex;margin-top: 5px;">
                                    <select class="form-control" id="filterDataPremiumTotalChart" onchange="loadFilterPremiumTotalChart();"
                                        style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                        <option value="select">Select</option>
                                        <option value="harian">Harian</option>
                                        <option value="mingguan">Mingguan</option>
                                        <option value="bulanan">Bulanan</option>
                                        <option value="tahunan">Tahunan</option>
                                    </select>
                                    &nbsp;
                                    <div id="datePremiumTotalChart">
                                        <div class="input-group">
                                            <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                        </div>
                                        <!-- input-group -->
                                    </div>
                                    <div id="rangedatePremiumTotalChart">
                                        <div class="input-daterange input-group" data-date-format="dd M, yyyy"  data-date-autoclose="true"  data-provide="datepicker">
                                            <input type="text" class="form-control" name="start" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                            <input type="text" class="form-control" name="end" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                        </div>
                                        <!-- input-group -->
                                    </div>

                                    <div id="bulandatePremiumTotalChart">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <select class="form-control" name="bulan_awal" id="bulanAwalPremiumTotalChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                    <option value="">Bulan 1</option>
                                                    @foreach($bulan as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <select class="form-control" name="bulan_akhir" id="bulanAkhirPremiumTotalChart" onchange="filterMonthPremiumTotalChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                    <option value="">Bulan 2</option>
                                                    @foreach($bulan as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- input-group -->
                                    </div>

                                    <div id="tahundatePremiumTotalChart">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <select class="form-control" name="tahun_awal" id="tahunAwalPremiumTotalChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                    <option value="">Tahun 1</option>
                                                    @for($year=2010; $year<=date('Y'); $year++)
                                                    <option value="{{ $year }}"> {{ $year }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <select class="form-control" name="tahun_akhir" id="tahunAkhirPremiumTotalChart" onchange="filterYearPremiumTotalChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
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
                               <a href="#" data-bs-toggle="modal" id="detailPremiumTotalChart"
                               data-bs-target=".detailPremiumTotalChart" style="width: 100px;height: 40px;border-radius: 7px; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;">
                               <div>
                                   Detail
                               </div>
                           </a>
                           </div>
                           <div id="premiumTotalChart" style="height:420px; max-width: 100%;" dir="ltr"></div>
                       </div>

                    </div>
               </div>

                {{--
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
                                            <select class="form-control" id="filterDataPremiumTotalTahun1Chart" onchange="loadFilterPremiumTotalTahun1Chart();"
                                                style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                <option value="select">Select</option>
                                                <option value="harian">Harian</option>
                                                <option value="mingguan">Mingguan</option>
                                                <option value="bulanan">Bulanan</option>
                                                <option value="tahunan">Tahunan</option>
                                            </select>
                                            &nbsp;
                                            <div id="datePremiumTotalTahun1Chart">
                                                <div class="input-group">
                                                    <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                                </div>
                                                <!-- input-group -->
                                            </div>
                                            <div id="rangedatePremiumTotalTahun1Chart">
                                                <div class="input-daterange input-group" data-date-format="dd M, yyyy"  data-date-autoclose="true"  data-provide="datepicker">
                                                    <input type="text" class="form-control" name="start" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                                    <input type="text" class="form-control" name="end" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                                </div>
                                                <!-- input-group -->
                                            </div>

                                            <div id="bulandatePremiumTotalTahun1Chart">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="bulan_awal" id="bulanAwalPremiumTotalTahun1Chart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                            <option value="">Bulan 1</option>
                                                            @foreach($bulan as $item)
                                                            <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="bulan_akhir" id="bulanAkhirPremiumTotalTahun1Chart" onchange="filterMonthPremiumTotalTahun1Chart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                            <option value="">Bulan 2</option>
                                                            @foreach($bulan as $item)
                                                            <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- input-group -->
                                            </div>

                                            <div id="tahundatePremiumTotalTahun1Chart">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="tahun_awal" id="tahunAwalPremiumTotalTahun1Chart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                            <option value="">Tahun 1</option>
                                                            @for($year=2010; $year<=date('Y'); $year++)
                                                            <option value="{{ $year }}"> {{ $year }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="tahun_akhir" id="tahunAkhirPremiumTotalTahun1Chart" onchange="filterYearPremiumTotalTahun1Chart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
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

                                    <div class="col-lg-6">

                                        <a href="#" data-bs-toggle="modal" id="detailPremiumTahun1Chart"
                                        data-bs-target=".detailPremiumTahun1Chart" style="width: 80px;height: 44.29px;border-radius: 7px; text-decoration:none; letter-spacing: 3px; border: 2px white solid;display: flex;justify-content: center;align-items: center;font-size: 80%;color: white;">
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
                                    <div class="col-lg-6">
                                        <div style="display: flex;margin-top: 5px;">
                                            <select class="form-control" id="filterDataPremiumPltpChart" onchange="loadFilterPremiumPltpChart();"
                                                style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                <option value="select">Select</option>
                                                <option value="harian">Harian</option>
                                                <option value="mingguan">Mingguan</option>
                                                <option value="bulanan">Bulanan</option>
                                                <option value="tahunan">Tahunan</option>
                                            </select>
                                            &nbsp;
                                            <div id="datePremiumPltpChart">
                                                <div class="input-group">
                                                    <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                                </div>
                                                <!-- input-group -->
                                            </div>
                                            <div id="rangedatePremiumPltpChart">
                                                <div class="input-daterange input-group" data-date-format="dd M, yyyy"  data-date-autoclose="true"  data-provide="datepicker">
                                                    <input type="text" class="form-control" name="start" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                                    <input type="text" class="form-control" name="end" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                                </div>
                                                <!-- input-group -->
                                            </div>

                                            <div id="bulandatePremiumPltpChart">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="bulan_awal" id="bulanAwalPremiumPltpChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                            <option value="">Bulan 1</option>
                                                            @foreach($bulan as $item)
                                                            <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="bulan_akhir" id="bulanAkhirPremiumPltpChart" onchange="filterMonthPremiumPltpChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                            <option value="">Bulan 2</option>
                                                            @foreach($bulan as $item)
                                                            <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- input-group -->
                                            </div>

                                            <div id="tahundatePremiumPltpChart">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="tahun_awal" id="tahunAwalPremiumPltpChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                            <option value="">Tahun 1</option>
                                                            @for($year=2010; $year<=date('Y'); $year++)
                                                            <option value="{{ $year }}"> {{ $year }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="tahun_akhir" id="tahunAkhirPremiumPltpChart" onchange="filterYearPremiumPltpChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
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

                                    <div class="col-lg-6">

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
                                            <select class="form-control" id="filterDataPremiumTotalChart" onchange="loadFilterPremiumTotalChart();"
                                                style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                <option value="select">Select</option>
                                                <option value="harian">Harian</option>
                                                <option value="mingguan">Mingguan</option>
                                                <option value="bulanan">Bulanan</option>
                                                <option value="tahunan">Tahunan</option>
                                            </select>
                                            &nbsp;
                                            <div id="datePremiumTotalChart">
                                                <div class="input-group">
                                                    <input type="text" placeholder="date" class="form-control"  data-date-format="dd mm, yyyy" data-provide="datepicker" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff;">
                                                </div>
                                                <!-- input-group -->
                                            </div>
                                            <div id="rangedatePremiumTotalChart">
                                                <div class="input-daterange input-group" data-date-format="dd M, yyyy"  data-date-autoclose="true"  data-provide="datepicker">
                                                    <input type="text" class="form-control" name="start" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                                    <input type="text" class="form-control" name="end" style="width: 80px; height: 44px; border: 2px solid #ffffff; background-color: #222222; color:#ffffff; border-radius:7px;"/>
                                                </div>
                                                <!-- input-group -->
                                            </div>

                                            <div id="bulandatePremiumTotalChart">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="bulan_awal" id="bulanAwalPremiumTotalChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                            <option value="">Bulan 1</option>
                                                            @foreach($bulan as $item)
                                                            <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="bulan_akhir" id="bulanAkhirPremiumTotalChart" onchange="filterMonthPremiumTotalChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                            <option value="">Bulan 2</option>
                                                            @foreach($bulan as $item)
                                                            <option value="{{ $item->id }}"> {{ $item->bulan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- input-group -->
                                            </div>

                                            <div id="tahundatePremiumTotalChart">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="tahun_awal" id="tahunAwalPremiumTotalChart" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
                                                            <option value="">Tahun 1</option>
                                                            @for($year=2010; $year<=date('Y'); $year++)
                                                            <option value="{{ $year }}"> {{ $year }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="tahun_akhir" id="tahunAkhirPremiumTotalChart" onchange="filterYearPremiumTotalChart();" style="width: 80px;height: 44.29px;background-color:#222222; top: 777px; left: 456px; border-radius: 7px; border: 2px solid #ffffff;">
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
                </div> --}}
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
            ['Bulan', ' '],

            @php
            foreach($spajSubmitted as $spaj) {
                echo "['".\Carbon\Carbon::parse($spaj->month_name)->isoFormat('MMMM')."', ".$spaj->count."],";
            }
            @endphp
        ]);

        var options = {
            chartArea: {
                backgroundColor: {
                    fill: '#222222',
                    fillOpacity: 0.1
                },
            },
            backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.8
            },
            colors: '#FB6EAA',
            bars: 'vertical',
        }

        var chart = new google.charts.Bar(document.getElementById('spajSubmittedChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function premiumChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', ' '],
            @php
            foreach($premiumSubmitted as $spaj) {
                // echo "['".\Carbon\Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                // "', '".
                // "Rp".number_format((int)$spaj->sum_nominal, 0, ',', '.').
                // "'],";

                echo "['".\Carbon\Carbon::parse($spaj->month_name)->isoFormat('MMMM')."', ".$spaj->sum_nominal."],";

            }
            @endphp
        ]);


        var options = {
            chartArea: {
                backgroundColor: {
                    fill: '#222222',
                    fillOpacity: 0.1
                },
            },
            backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.8
            },
            colors: '#FB6EAA',
            bars: 'vertical',
        }
        var chart = new google.charts.Bar(document.getElementById('premiumSubmittedChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function policeApprovedChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', ''],
            @php
            foreach($policeApprovedChart as $spaj) {
                echo "['".\Carbon\Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                "', ".$spaj->count."],";
            }
            @endphp
        ]);

        var options = {
            chartArea: {
                backgroundColor: {
                    fill: '#222222',
                    fillOpacity: 0.1
                },
            },
            backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.8
            },
            colors: '#FB6EAA',
            bar: {
                groupWidth: "75%"
            },
            bars: 'vertical',
        }

        var chart = new google.charts.Bar(document.getElementById('policeApprovedChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));

    }

    function totalPremiumChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', ''],
            @php
            foreach($totalPremiumChart as $spaj) {
                // echo "['".\Carbon\ Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                // "', '".
                // "Rp".number_format($spaj->sum_nominal, 0, ',', '.').
                // "'],";

                echo "['".\Carbon\Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                "', ".$spaj->sum_nominal."],";
            }
            @endphp
        ]);


        var options = {
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
        }

        var chart = new google.charts.Bar(document.getElementById('totalPremiumChart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function premiumTahun1Chart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', ''],
            @php
            foreach($premiumTahun1Chart as $premiumTotal) {
                // echo "['".\Carbon\ Carbon::parse($premiumTotal->month_name)->isoFormat('MMMM').
                // "', '".
                // "Rp".number_format($premiumTotal->sum_nominal, 0, ',', '.').
                // "'],";
                echo "['".\Carbon\Carbon::parse($premiumTotal->month_name)->isoFormat('MMMM').
                "', ".(string)$premiumTotal->sum_nominal."],";
            }
            @endphp
        ]);

        var options = {
            chartArea: {
                backgroundColor: {
                    fill: '#222222',
                    fillOpacity: 0.1
                },
            },
            backgroundColor: {
                fill: '#222222',
                fillOpacity: 0.8
            },
            colors: '#7BC2EC',
            bar: {
                groupWidth: "75%"
            },
            bars: 'vertical',
        }

        var chart = new google.charts.Bar(document.getElementById('premiumTahun1Chart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    function premiumPltpChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', ''],
            @php
            foreach($premiumPltpChart as $premiumTotal) {
                // echo "['".\Carbon\Carbon::parse($premiumTotal->month_name)->isoFormat('MMMM').
                // "', '".
                // "Rp".number_format($premiumTotal->sum_nominal, 0, ',', '.').
                // "'],";
                echo "['".\Carbon\Carbon::parse($premiumTotal->month_name)->isoFormat('MMMM').
                "', ".(string)$premiumTotal->sum_nominal."],";
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
                // echo "['".\Carbon\ Carbon::parse($premiumTotal->month_name)->isoFormat('MMMM').
                // "', '".
                // "Rp".number_format($premiumTotal->sum_nominal, 0, ',', '.').
                // "'],";
                echo "['".\Carbon\ Carbon::parse($premiumTotal->month_name)->isoFormat('MMMM').
                "', ".(string)$premiumTotal->sum_nominal."],";

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

    $("#dateSubmittedChart").hide();
    $("#rangeDateSubmittedChart").hide();
    $("#bulanDateSubmittedChart").hide();
    $("#tahunDateSubmittedChart").hide();

    $("#datePoliceApprovedChart").hide();
    $("#rangeDatePoliceApprovedChart").hide();
    $("#bulanDatePoliceApprovedChart").hide();
    $("#tahunDatePoliceApprovedChart").hide();

    $("#dateTotalPremiumChart").hide();
    $("#rangeDateTotalPremiumChart").hide();
    $("#bulanDateTotalPremiumChart").hide();
    $("#tahunDateTotalPremiumChart").hide();

    $("#datePremiumTotalTahun1Chart").hide();
    $("#rangedatePremiumTotalTahun1Chart").hide();
    $("#bulandatePremiumTotalTahun1Chart").hide();
    $("#tahundatePremiumTotalTahun1Chart").hide();

    $("#datePremiumPltpChart").hide();
    $("#rangedatePremiumPltpChart").hide();
    $("#bulandatePremiumPltpChart").hide();
    $("#tahundatePremiumPltpChart").hide();

    $("#datePremiumTotalChart").hide();
    $("#rangedatePremiumTotalChart").hide();
    $("#bulandatePremiumTotalChart").hide();
    $("#tahundatePremiumTotalChart").hide();


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

            $('#bulanAwalPremiumSubmittedChart').val('');
            $('#bulanAkhirPremiumSubmittedChart').val('');
            $('#tahunAwalPremiumSubmittedChart').val('');
            $('#tahunAkhirPremiumSubmittedChart').val('');

        }

        function loadFilter()
        {
            var eID = document.getElementById("filterData");
            var dayVal = eID.options[eID.selectedIndex].value;
            var daytxt = eID.options[eID.selectedIndex].text;

            if (dayVal == 'mingguan') {
                $("#date").hide();
                $("#rangeDate").hide();
                $("#bulanDate").hide();
                $("#tahunDate").hide();

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
                            chartArea: {
                                backgroundColor: {
                                    fill: '#222222',
                                    fillOpacity: 0.1
                                },
                            },
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.8
                            },
                            colors: '#FB6EAA',
                            bars: 'vertical',
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
                    ['Bulan', ' '],
                    @php
                    foreach($premiumSubmitted as $spaj) {
                        // echo "['".\Carbon\ Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                        // "', '".
                        // "Rp".number_format((int)$spaj->sum_nominal, 0, ',', '.').
                        // "'],";
                        echo "['".\Carbon\ Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                        "', ".$spaj->count."],";
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
                        chartArea: {
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.1
                            },
                        },
                        backgroundColor: {
                            fill: '#222222',
                            fillOpacity: 0.8
                        },
                        colors: '#FB6EAA',
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
            var data = {"bulan_awal":$('#bulanAwalPremiumSubmittedChart').val(), "bulan_akhir":$('#bulanAkhirPremiumSubmittedChart').val()};
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
                            bars: 'vertical',
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
            var data = {"tahun_awal":$('#tahunAwalPremiumSubmittedChart').val(), "tahun_akhir":$('#tahunAkhirPremiumSubmittedChart').val()};
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
                            chartArea: {
                                backgroundColor: {
                                    fill: '#222222',
                                    fillOpacity: 0.1
                                },
                            },
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.8
                            },
                            colors: '#FB6EAA',
                            bars: 'vertical',
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

        function loadFilterSpajSubmittedChart()
        {
            var eID = document.getElementById("filterDataSubmittedChart");
            var dayVal = eID.options[eID.selectedIndex].value;
            var daytxt = eID.options[eID.selectedIndex].text;

            if (dayVal == 'mingguan') {
                $("#dateSubmittedChart").hide();
                $("#rangeDateSubmittedChart").hide();
                $("#bulanDateSubmittedChart").hide();
                $("#tahunDateSubmittedChart").hide();
                var data = {"filterDataSubmittedChart":$('#filterDataSubmittedChart').val()};
                console.log($('#filterDataSubmittedChart').val());

                $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/spaj/filterMingguSpajSubmitted') }}",
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
                            chartArea: {
                                backgroundColor: {
                                    fill: '#222222',
                                    fillOpacity: 0.1
                                },
                            },
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.8
                            },
                            colors: '#FB6EAA',
                            bars: 'vertical',
                            isStacked: true,
                            }
                    var chart = new google.charts.Bar(document.getElementById('spajSubmittedChart'));
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                    }

                },
                error:function(error){
                    console.log(error);
                }
                });
                $("#dateSubmittedChart").hide();
                $("#rangeDateSubmittedChart").hide();
                $("#tahunDateSubmittedChart").hide();
            } else if(dayVal == 'select') {
                $("#dateSubmittedChart").hide();
                $("#rangeDateSubmittedChart").hide();
                $("#bulanDateSubmittedChart").hide();
                $("#tahunDateSubmittedChart").hide();
                reset();
                google.charts.load('current', {
                    'packages': ['corechart', 'bar']
                });
                google.charts.setOnLoadCallback(submittedChart);

                function submittedChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Bulan', ' '],

                        @php
                        foreach($spajSubmitted as $spaj) {
                            // echo "['".\Carbon\ Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                            // "', '".(int)$spaj->count.
                            // "'],";
                            echo "['".\Carbon\Carbon::parse($spaj->month_name)->isoFormat('MMMM')."', ".$spaj->count."],";
                        }
                        @endphp
                    ]);

                    var options = {

                        chartArea: {
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.1
                            },
                        },
                        backgroundColor: {
                            fill: '#222222',
                            fillOpacity: 0.8
                        },
                        colors: '#FB6EAA',
                        bars: 'vertical',
                    }
                    var chart = new google.charts.Bar(document.getElementById('spajSubmittedChart'));
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                    }

            } else if(dayVal == 'harian') {
                var data = {"filterDataSubmittedChart":$('#filterDataSubmittedChart').val()};
                console.log($('#filterDataSubmittedChart').val());

                $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/spaj/filterHarianSpajSubmitted') }}",
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
                        chartArea: {
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.1
                            },
                        },
                        backgroundColor: {
                            fill: '#222222',
                            fillOpacity: 0.8
                        },
                        colors: '#FB6EAA',
                        bar: {
                            groupWidth: "350px"
                        },
                        bars: 'vertical',
                        isStacked: true,
                        }
                        var chart = new google.charts.Bar(document.getElementById('spajSubmittedChart'));
                        chart.draw(data, google.charts.Bar.convertOptions(options));
                        }

                },
                error:function(error){
                    console.log(error);
                }
            });
                $("#dateSubmittedChart").hide();
                $("#rangeDateSubmittedChart").hide();
                $("#tahunDateSubmittedChart").hide();
                reset();
            } else if(dayVal == 'bulanan') {
                $("#dateSubmittedChart").hide();
                $("#rangeDateSubmittedChart").hide();
                $("#bulanDateSubmittedChart").show();
                $("#tahunDateSubmittedChart").hide();
                reset();
            } else if(dayVal == 'tahunan') {
                $("#dateSubmittedChart").hide();
                $("#rangeDateSubmittedChart").hide();
                $("#bulanDateSubmittedChart").hide();
                $("#tahunDateSubmittedChart").show();
                reset();
            }

        }

        function filterMonthSpajSubmittedChart()
        {
            var data = {"bulan_awal":$('#bulanAwal').val(), "bulan_akhir":$('#bulanAkhir').val()};
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/spaj/filterBulanSpajSubmitted') }}",
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
                            chartArea: {
                                backgroundColor: {
                                    fill: '#222222',
                                    fillOpacity: 0.1
                                },
                            },
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.8
                            },
                            colors: '#FB6EAA',
                            bars: 'vertical',
                            isStacked: true,
                            }
                            var chart = new google.charts.Bar(document.getElementById('spajSubmittedChart'));
                            chart.draw(data, google.charts.Bar.convertOptions(options));
                         }

                },
                error:function(error){
                    console.log(error);
                }
            });
        }

        function filterYearSpajSubmittedChart()
        {
            var data = {"tahun_awal":$('#tahunAwal').val(), "tahun_akhir":$('#tahunAkhir').val()};
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/spaj/filterTahunSpajSubmitted') }}",
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
                            chartArea: {
                                backgroundColor: {
                                    fill: '#222222',
                                    fillOpacity: 0.1
                                },
                            },
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.8
                            },
                            colors: '#FB6EAA',
                            bars: 'vertical',
                            isStacked: true,
                            }
                            var chart = new google.charts.Bar(document.getElementById('spajSubmittedChart'));
                            chart.draw(data, google.charts.Bar.convertOptions(options));
                         }

                },
                error:function(error){
                    console.log(error);
                }
            });
        }

        // Police Approved Module

        function loadFilterPoliceApprovedChart()
        {
            var eID = document.getElementById("filterDataPoliceApprovedChart");
            var dayVal = eID.options[eID.selectedIndex].value;
            var daytxt = eID.options[eID.selectedIndex].text;

            if (dayVal == 'mingguan') {

                $("#datePoliceApprovedChart").hide();
                $("#rangeDatePoliceApprovedChart").hide();
                $("#bulanDatePoliceApprovedChart").hide();
                $("#tahunDatePoliceApprovedChart").hide();
                var data = {"filterDataPoliceApprovedChart":$('#filterDataPoliceApprovedChart').val()};
                console.log($('#filterDataPoliceApprovedChart').val());

                $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/spaj/filterMingguSpajSubmitted') }}",
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
                            chartArea: {
                                backgroundColor: {
                                    fill: '#222222',
                                    fillOpacity: 0.1
                                },
                            },
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.8
                            },
                            colors: '#FB6EAA',
                            bars: 'vertical',
                            bars: 'vertical',
                            isStacked: true,
                            }
                    var chart = new google.charts.Bar(document.getElementById('policeApprovedChart'));
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                    }

                },
                error:function(error){
                    console.log(error);
                }
                });
            } else if(dayVal == 'select') {
                $("#datePoliceApprovedChart").hide();
                $("#rangeDatePoliceApprovedChart").hide();
                $("#bulanDatePoliceApprovedChart").hide();
                $("#tahunDatePoliceApprovedChart").hide();
                reset();
                google.charts.load('current', {
                    'packages': ['corechart', 'bar']
                });
                google.charts.setOnLoadCallback(policeApprovedChart);


            function policeApprovedChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Bulan', 'Jumlah Spaj'],
                    @php
                    foreach($policeApprovedChart as $spaj) {
                        echo "['".\Carbon\ Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                        "', ".$spaj->count."],";

                    }
                    @endphp
                ]);
                    var options = {
                        chartArea: {
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.1
                            },
                        },
                        backgroundColor: {
                            fill: '#222222',
                            fillOpacity: 0.8
                        },
                        colors: '#FB6EAA',
                        bar: {
                            groupWidth: "75%"
                        },
                        bars: 'vertical',
                        isStacked: true,
                    }
                    var chart = new google.charts.Bar(document.getElementById('policeApprovedChart'));
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }

            } else if(dayVal == 'harian') {
                var data = {"filterDataPoliceApprovedChart":$('#filterDataPoliceApprovedChart').val()};
                console.log($('#filterDataPoliceApprovedChart').val());

                $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/policeApproved/filterHarianPoliceApproved') }}",
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
                        chartArea: {
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.1
                            },
                        },
                        backgroundColor: {
                            fill: '#222222',
                            fillOpacity: 0.8
                        },
                        colors: '#FB6EAA',
                        bars: 'vertical',
                        isStacked: true,
                        }
                        var chart = new google.charts.Bar(document.getElementById('policeApprovedChart'));
                        chart.draw(data, google.charts.Bar.convertOptions(options));
                        }

                },
                error:function(error){
                    console.log(error);
                }
            });
                $("#datePoliceApprovedChart").hide();
                $("#rangeDatePoliceApprovedChart").hide();
                $("#tahunDatePoliceApprovedChart").hide();
                reset();
            } else if(dayVal == 'bulanan') {
                $("#datePoliceApprovedChart").hide();
                $("#rangeDatePoliceApprovedChart").hide();
                $("#bulanDatePoliceApprovedChart").show();
                $("#tahunDatePoliceApprovedChart").hide();
                reset();
            } else if(dayVal == 'tahunan') {
                $("#datePoliceApprovedChart").hide();
                $("#rangeDatePoliceApprovedChart").hide();
                $("#bulanDatePoliceApprovedChart").hide();
                $("#tahunDatePoliceApprovedChart").show();
                reset();
            }

        }

        function filterMonthPoliceApprovedChart()
        {
            var data = {"bulan_awal":$('#bulanAwalPoliceApprovedChart').val(), "bulan_akhir":$('#bulanAkhirPoliceApprovedChart').val()};
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/policeApproved/filterBulanPoliceApproved') }}",
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
                            chartArea: {
                                backgroundColor: {
                                    fill: '#222222',
                                    fillOpacity: 0.1
                                },
                            },
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.8
                            },
                            colors: '#FB6EAA',
                            bars: 'vertical',
                            isStacked: true,
                            }
                            var chart = new google.charts.Bar(document.getElementById('policeApprovedChart'));
                            chart.draw(data, google.charts.Bar.convertOptions(options));
                         }

                },
                error:function(error){
                    console.log(error);
                }
            });
        }

        function filterYearPoliceApprovedChart()
        {
            var data = {"tahun_awal":$('#tahunAwalPoliceApprovedChart').val(), "tahun_akhir":$('#tahunAkhirPoliceApprovedChart').val()};
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/policeApproved/filterTahunPoliceApproved') }}",
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
                            chartArea: {
                                backgroundColor: {
                                    fill: '#222222',
                                    fillOpacity: 0.1
                                },
                            },
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.8
                            },
                            colors: '#FB6EAA',
                            bars: 'vertical',
                             isStacked: true,
                            }
                            var chart = new google.charts.Bar(document.getElementById('policeApprovedChart'));
                            chart.draw(data, google.charts.Bar.convertOptions(options));
                         }

                },
                error:function(error){
                    console.log(error);
                }
            });
        }

        // Total Premium
        function loadFilterTotalPremiumChart()
        {
            var eID = document.getElementById("filterDataTotalPremiumChart");
            var dayVal = eID.options[eID.selectedIndex].value;
            var daytxt = eID.options[eID.selectedIndex].text;

            if (dayVal == 'mingguan') {
                $("#dateTotalPremiumChart").hide();
                $("#rangeDateTotalPremiumChart").hide();
                $("#bulanDateTotalPremiumChart").hide();
                $("#tahunDateTotalPremiumChart").hide();
                var data = {"filterDataTotalPremiumChart":$('#filterDataTotalPremiumChart').val()};
                console.log($('#filterDataPoliceApprovedChart').val());

                $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/policeApproved/filterMingguTotalPremium') }}",
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
                    var chart = new google.charts.Bar(document.getElementById('totalPremiumChart'));
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                    }

                },
                error:function(error){
                    console.log(error);
                }
                });
            } else if(dayVal == 'select') {
                $("#dateTotalPremiumChart").hide();
                $("#rangeDateTotalPremiumChart").hide();
                $("#bulanDateTotalPremiumChart").hide();
                $("#tahunDateTotalPremiumChart").hide();
                reset();
                google.charts.load('current', {
                    'packages': ['corechart', 'bar']
                });
                google.charts.setOnLoadCallback(totalPremiumChart);


            function totalPremiumChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Bulan', 'Jumlah Spaj'],
                    @php
                    foreach($totalPremiumChart as $spaj) {
                        echo "['".\Carbon\ Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                        "', '".(int)$spaj->count."'],";

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

            } else if(dayVal == 'harian') {
                var data = {"filterDataTotalPremiumChart":$('#filterDataTotalPremiumChart').val()};
                console.log($('#filterDataTotalPremiumChart').val());

                $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/policeApproved/filterHarianTotalPremium') }}",
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
                        var chart = new google.charts.Bar(document.getElementById('totalPremiumChart'));
                        chart.draw(data, google.charts.Bar.convertOptions(options));
                        }

                },
                error:function(error){
                    console.log(error);
                }
            });
                $("#dateTotalPremiumChart").hide();
                $("#rangeDateTotalPremiumChart").hide();
                $("#tahunDateTotalPremiumChart").hide();
                reset();
            } else if(dayVal == 'bulanan') {
                $("#dateTotalPremiumChart").hide();
                $("#rangeDateTotalPremiumChart").hide();
                $("#bulanDateTotalPremiumChart").show();
                $("#tahunDateTotalPremiumChart").hide();
                reset();
            } else if(dayVal == 'tahunan') {
                $("#dateTotalPremiumChart").hide();
                $("#rangeDateTotalPremiumChart").hide();
                $("#bulanDateTotalPremiumChart").hide();
                $("#tahunDateTotalPremiumChart").show();
                reset();
            }

        }

        function filterMonthTotalPremiumChart()
        {
            var data = {"bulan_awal":$('#bulanAwalTotalPremiumChart').val(), "bulan_akhir":$('#bulanAkhirTotalPremiumChart').val()};
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/policeApproved/filterBulanTotalPremium') }}",
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
                            var chart = new google.charts.Bar(document.getElementById('totalPremiumChart'));
                            chart.draw(data, google.charts.Bar.convertOptions(options));
                         }

                },
                error:function(error){
                    console.log(error);
                }
            });
        }

        function filterYearTotalPremiumChart()
        {
            var data = {"tahun_awal":$('#tahunAwalTotalPremiumChart').val(), "tahun_akhir":$('#tahunAkhirTotalPremiumChart').val()};
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/policeApproved/filterTahunTotalPremium') }}",
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
                            var chart = new google.charts.Bar(document.getElementById('totalPremiumChart'));
                            chart.draw(data, google.charts.Bar.convertOptions(options));
                         }

                },
                error:function(error){
                    console.log(error);
                }
            });
        }

        // Premium Total

        function loadFilterPremiumTotalTahun1Chart()
        {
            var eID = document.getElementById("filterDataPremiumTotalTahun1Chart");
            var dayVal = eID.options[eID.selectedIndex].value;
            var daytxt = eID.options[eID.selectedIndex].text;

            if (dayVal == 'mingguan') {
                $("#datePremiumTotalTahun1Chart").hide();
                $("#rangeDatePremiumTotalTahun1Chart").hide();
                $("#bulanDatePremiumTotalTahun1Chart").hide();
                $("#tahunDatePremiumTotalTahun1Chart").hide();
                var data = {"filterDataPremiumTotalTahun1Chart":$('#filterDataPremiumTotalTahun1Chart').val()};

                $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/premiumTotal/filterMingguPremiumTahun1') }}",
                data: JSON.stringify(data),
                dataType:"json",
                processData:false,
                contentType:"application/json",
                cache:false,
                success:function(response){
                        google.charts.load('current', {
                            'packages': ['corechart', 'bar']
                        });
                        google.charts.setOnLoadCallback(premiumTahun1Chart);

                        function premiumTahun1Chart() {
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
                    var chart = new google.charts.Bar(document.getElementById('premiumTahun1Chart'));
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                    }

                },
                error:function(error){
                    console.log(error);
                }
                });
            } else if(dayVal == 'select') {
                $("#dateTotalPremiumChart").hide();
                $("#rangeDateTotalPremiumChart").hide();
                $("#bulanDateTotalPremiumChart").hide();
                $("#tahunDateTotalPremiumChart").hide();
                reset();
                google.charts.load('current', {
                    'packages': ['corechart', 'bar']
                });
                google.charts.setOnLoadCallback(premiumTotalTahun1);


            function premiumTotalTahun1() {

                var data = google.visualization.arrayToDataTable([
                    ['Bulan', 'Jumlah Spaj'],
                    @php
                    foreach($premiumTahun1Chart as $spaj) {
                        echo "['".\Carbon\ Carbon::parse($spaj->month_name)->isoFormat('MMMM').
                        "', '".(int)$spaj->count."'],";

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
                    var chart = new google.charts.Bar(document.getElementById('premiumTahun1Chart'));
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }

            } else if(dayVal == 'harian') {
                var data = {"filterDataPremiumTotalTahun1Chart":$('#filterDataPremiumTotalTahun1Chart').val()};

                $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/premiumTotal/filterHarianPremiumTahun1') }}",
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
                        var chart = new google.charts.Bar(document.getElementById('premiumTahun1Chart'));
                        chart.draw(data, google.charts.Bar.convertOptions(options));
                        }

                },
                error:function(error){
                    console.log(error);
                }
            });
                $("#datePremiumTotalTahun1Chart").hide();
                $("#rangeDatePremiumTotalTahun1Chart").hide();
                $("#tahunDatePremiumTotalTahun1Chart").hide();
                reset();
            } else if(dayVal == 'bulanan') {
                $("#datePremiumTotalTahun1Chart").hide();
                $("#rangeDatePremiumTotalTahun1Chart").hide();
                $("#bulanDatePremiumTotalTahun1Chart").show();
                $("#tahunDatePremiumTotalTahun1Chart").hide();
                reset();
            } else if(dayVal == 'tahunan') {
                $("#datePremiumTotalTahun1Chart").hide();
                $("#rangeDatePremiumTotalTahun1Chart").hide();
                $("#bulanDatePremiumTotalTahun1Chart").hide();
                $("#tahunDatePremiumTotalTahun1Chart").show();
                reset();
            }

        }

        function filterMonthPremiumTotalTahun1Chart()
        {
            var data = {"bulan_awal":$('#bulanAwalTotalPremiumChart').val(), "bulan_akhir":$('#bulanAkhirTotalPremiumChart').val()};
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/premiumTotal/filterBulanPremiumTahun1') }}",
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
                            chartArea: {
                                backgroundColor: {
                                    fill: '#222222',
                                    fillOpacity: 0.1
                                },
                            },
                            backgroundColor: {
                                fill: '#222222',
                                fillOpacity: 0.8
                            },
                            colors: '#FB6EAA',
                            bars: 'vertical',
                            isStacked: true,
                            }
                            var chart = new google.charts.Bar(document.getElementById('totalPremiumChart'));
                            chart.draw(data, google.charts.Bar.convertOptions(options));
                         }

                },
                error:function(error){
                    console.log(error);
                }
            });
        }

        function filterYearPremiumTotalTahun1Chart()
        {
            var data = {"tahun_awal":$('#tahunAwalPremiumTotalTahun1Chart').val(), "tahun_akhir":$('#tahunAkhirPremiumTotalTahun1Chart').val()};
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                url : "{{ url('management/premiumTotal/filterTahunPremiumTahun1') }}",
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
                            var chart = new google.charts.Bar(document.getElementById('totalPremiumChart'));
                            chart.draw(data, google.charts.Bar.convertOptions(options));
                         }

                },
                error:function(error){
                    console.log(error);
                }
            });
        }

        function loadFilterPremiumPltpChart()
        {

        }

        function filterMonthPremiumPltpChart()
        {

        }

        function filterYearPremiumPltpChart()
        {

        }


        function loadFilterPremiumTotalChart(){

        }

        function filterMonthPremiumTotalChart()
        {

        }

        function filterYearPremiumTotalChart()
        {

        }

</script>
@endpush
