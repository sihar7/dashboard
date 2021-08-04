@extends('layouts.master')

@push('title')
 DASHBOARD | ARWICS
@endpush


@push('css')

<link href="{{ asset('assets/libs/chartist/chartist.min.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card" style="height:852px;" style="background-color:#222222;">
            <div class="card-body">
                <center><h4 class="card-title">Telemarketing</h4></center>
                <br><br>
                <div class="">
                    @foreach ($getHistoryTele as $item)
                        @if($item->islogin == 1)
                        <div class="alert alert-success bg-success text-white" role="alert" style="height:79px;">
                            <h4>{{ $item->nama }}</h4>
                            <p>Online</p>
                        </div>
                        @else
                        <div class="alert alert-success bg-danger text-white" role="alert" style="height:79px;">
                            <h4>{{ $item->nama }}</h4>
                            <p>{{'Aktif'. ' '. \Carbon\Carbon::parse($item->last_login_at)->diffForHumans() }}</p>
                        </div>
                        @endif
                    @endforeach
                </div>
                {{ $getHistoryTele->links() }}
            </div>
        </div>
    </div>

    <!-- end col -->
    <div class="col-xl-6 col-sm-6">
        <div class="card" style="height:852px;">
            <div class="card-body">
                <center><h2 class="card-title">TOP 10</h2></center>
                <center>
                    <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <select class="form-control" id="select_top10_1" style="width:175px; height:44px;background-color:#222222;">
                                    <option value="">Select</option>
                                    <option value="harian">Harian</option>
                                    <option value="mingguan">Mingguan</option>
                                    <option value="tahunan">Tahunan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <select class="form-control" id="select_top10_2" style="width:175px; height:44px;background-color:#222222;">
                                    <option>Select</option>
                                    <option value="all">Semua</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </center>

                <br>
                <br>
                <br>
                <br>
                <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="card">
                                <center><img class="rounded-circle mt-4 mt-sm-0" alt="200x200" width="100" height="100" src="{{ asset('assets/images/users/user-4.jpg') }}" data-holder-rendered="true"></center>
                                <div class="card-body">
                                    <center><h4 class="card-title">Bryan  1</h4></center>
                               </div>
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item"></li>
                                    <li class="list-group-item"><center>3 Closing</center></li>
                                    <li class="list-group-item"><center>3 Premi</center></li>
                                    <li class="list-group-item"><center>Rp 3.000.000</center></li>
                                    <li class="list-group-item"><center> - </center></li>
                                    <li class="list-group-item"><center> - </center></li>

                                </ul>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <center><img class="rounded-circle mt-4 mt-sm-0" alt="200x200" width="100" height="100" src="{{ asset('assets/images/users/user-4.jpg') }}" data-holder-rendered="true"></center>
                                <div class="card-body">
                                    <center><h4 class="card-title">Bryan  1</h4></center>
                               </div>
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item"></li>
                                    <li class="list-group-item"><center>3 Closing</center></li>
                                    <li class="list-group-item"><center>3 Premi</center></li>
                                    <li class="list-group-item"><center>Rp 3.000.000</center></li>
                                    <li class="list-group-item"><center> - </center></li>
                                    <li class="list-group-item"><center> - </center></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card" style="height:852px;">
            <br>
            <center>
                <h4 class="card-title">Hello !</h4></center>
                <br>
                <center><img class="rounded-circle mt-4 mt-sm-0" alt="200x200" width="260" height="260" src="{{ asset('assets/images/users/user-4.jpg') }}" data-holder-rendered="true"></center>
               <div class="card-body">
                <br><br>
                <center>
                <p class="card-text">Congrats Atas Pencapaiannya !</p>
                <h2 class="card-text">BRYAN ARDYAWAN</h2>
                <br>
                <br>
                <br><br><br><br>
                <h4 class="card-text">Pendapatan Polis</h4>
                <h2 class="card-text">RP 1,432.000</h2>
                </center>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-12">

        <div class="card" style="background-color:#222222;">
            <div class="card-body">
                <center><h4 class="card-title mb-4">SPAJ SUBMITTED</h4></center>

                <center>
                <div class="row" style="display: flex;justify-content: center;align-items: center;">
                    <div class="row " style="width: 80%;display:flex;justify-content: center;align-items: center;">
                    <div class="col-lg-3 " >
                        <div class="card text-white " style="width:155px; height:158.34px; background: linear-gradient(45deg, #FF00C7, #020202);">
                            <div class="card-body">
                                <p>Daily</p>
                                <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;" data-bs-toggle="modal" data-bs-target=".daily-spaj">Detail</button>
                                <i class="ion ion-md-download" style="width:35px; height:35px;"></i>
                            </div>
                            <div class="modal fade daily-spaj" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0">Center modal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                            <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card text-white bg-warning" style="width:155px; height:158.34px; background: linear-gradient(45deg, #0049FF, #020202);">
                            <div class="card-body">
                                <p>Weekly</p>
                                <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
                                <i class="ion ion-md-download"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card text-white bg-danger"  style="width:155px; height:158.34px; background: linear-gradient(45deg, #FF0037, #020202);">
                            <div class="card-body">
                                <p>Monthly</p>
                                <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
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
                    <div class="col-6 ">
                        <div id="morris-area-example" class="morris-charts morris-charts-height"></div>
                    </div>
                    <div class="col-6">

                        <div id="overlapping-bars" class="ct-chart ct-golden-section" dir="ltr"></div>
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
                <center><h4 class="card-title mb-4">SPAJ SUBMITTED</h4></center>

                <center>
                <div class="row" style="display: flex;justify-content: center;align-items: center;">
                    <div class="row " style="width: 60%;display:flex;justify-content: center;align-items: center;">
                    <div class="col-lg-3  " >
                        <div class="card text-white " style="width:155px; height:158.34px; background: linear-gradient(45deg, #FF00C7, #020202);">
                            <div class="card-body">
                                <p>Daily</p>
                                <h1>14</h1>
                                <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
                                <i class="ion ion-md-download" style="width:35px; height:35px;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card text-white bg-warning" style="width:155px; height:158.34px; background: linear-gradient(45deg, #0049FF, #020202);">
                            <div class="card-body">
                                <p>Weekly</p>
                                <h1>14</h1>
                                <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
                                <i class="ion ion-md-download"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card text-white bg-danger"  style="width:155px; height:158.34px; background: linear-gradient(45deg, #FF0037, #020202);">
                            <div class="card-body">
                                <p>Monthly</p>
                                <h1>14</h1>
                                <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
                                <i class="ion ion-md-download"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-white bg-warning"  style="width:155px; height:158.34px; background: linear-gradient(45deg, yellow, #020202);">
                            <div class="card-body">
                                <p>Yearly</p>
                                <h1>14</h1>
                                <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
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
                        <div id="simple-line-chart" class="ct-chart ct-golden-section" dir="ltr"></div>
                    </div>
                    <div class="col-4 bg-warning">
                            <div id="morris-donut-example" class="morris-charts morris-charts-height"></div>
                    </div>
                    <div class="col-4 bg-danger">
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
                <center><h4 class="card-title mb-4">SPAJ SUBMITTED</h4></center>

                <center>
                    <div class="row" style="display: flex;justify-content: center;align-items: center;">
                        <div class="row " style="width: 60%;display:flex;justify-content: center;align-items: center;">
                        <div class="col-lg-3  " >
                            <div class="card text-white " style="width:155px; height:158.34px; background: linear-gradient(45deg, #FF00C7, #020202);">
                                <div class="card-body">
                                    <p>Daily</p>
                                    <h1>14</h1>
                                    <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
                                    <i class="ion ion-md-download" style="width:35px; height:35px;"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card text-white bg-warning" style="width:155px; height:158.34px; background: linear-gradient(45deg, #0049FF, #020202);">
                                <div class="card-body">
                                    <p>Weekly</p>
                                    <h1>14</h1>
                                    <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
                                    <i class="ion ion-md-download"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card text-white bg-danger"  style="width:155px; height:158.34px; background: linear-gradient(45deg, #FF0037, #020202);">
                                <div class="card-body">
                                    <p>Monthly</p>
                                    <h1>14</h1>
                                    <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
                                    <i class="ion ion-md-download"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card text-white bg-warning"  style="width:155px; height:158.34px; background: linear-gradient(45deg, yellow, #020202);">
                                <div class="card-body">
                                    <p>Yearly</p>
                                    <h1>14</h1>
                                    <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
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

<script src="{{ asset('assets/libs/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js') }}"></script>

<script src="{{ asset('assets/js/pages/chartist.init.js') }}"></script>
<script type="text/javascript">
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = tanggal.getHours() + ' : ' + tanggal.getMinutes() + ' : ' + tanggal.getSeconds();
    }

</script>
@endpush
