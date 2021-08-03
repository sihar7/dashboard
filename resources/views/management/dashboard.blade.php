@extends('layouts.master')

@push('title')
 DASHBOARD | ARWICS
@endpush


@push('css')
<style>
@media print {

    @page {size: A4 landscape;max-height:100%; max-width:100%}

    /* use width if in portrait (use the smaller size to try
       and prevent image from overflowing page... */
    img { height: 90%; margin: 0; padding: 0; }

body{width:100%;
    background-color:black;
    height:100%;
    -webkit-transform: rotate(-90deg) scale(.68,.68);
    -moz-transform:rotate(-90deg) scale(.58,.58) }    }

    .card::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.card {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>
@endpush

@section('content')




<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card" style="height:852px;">
            <div class="card-body">
                <center><h4 class="card-title">Telemarketing</h4></center>
                <br><br>
                <div class="">
                    <div class="alert alert-success bg-success text-white" role="alert" style="height:79px;">
                        <h4>Bryan 1</h4>
                        <p>Online</p>
                    </div>
                    <div class="alert alert-success bg-success text-white" role="alert" style="height:79px;">
                        <h4>Bryan 2</h4>
                        <p>Online</p>
                    </div>
                    <div class="alert alert-success bg-success text-white" role="alert" style="height:79px;">
                        <h4>Bryan 3</h4>
                        <p>Online</p>
                    </div>

                    <div class="alert alert-success bg-danger text-white" role="alert" style="height:79px;">
                        <h4>Bryan 4</h4>
                        <p>Active 2 Days Ago</p>
                    </div>
                    <div class="alert alert-success bg-danger text-white" role="alert" style="height:79px;">
                        <h4>Bryan 5</h4>
                        <p>Active 2 Days Ago</p>
                    </div>
                    <div class="alert alert-success bg-danger text-white" role="alert" style="height:79px;">
                        <h4>Bryan 6</h4>
                        <p>Active 2 Days Ago</p>
                    </div>
                     <div class="alert alert-success bg-danger text-white" role="alert" style="height:79px;">
                        <h4>Bryan 7</h4>
                        <p>Active 2 Days Ago</p>
                    </div>

                </div>
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
                                <select class="form-control" style="width:175px; height:44px;">
                                    <option>Select</option>
                                    <option>Monthly</option>
                                    <option>Yearly</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <select class="form-control" style="width:175px; height:44px;">
                                    <option>Select</option>
                                    <option>All</option>
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

        <div class="card">
            <div class="card-body">
                <center><h4 class="card-title mb-4">SPAJ SUBMITTED</h4></center>

                <center>
                <div class="row" style="display: flex;justify-content: center;align-items: center;">
                    <div class="row " style="width: 80%;display:flex;justify-content: center;align-items: center;">
                    <div class="col-lg-3 " >
                        <div class="card text-white " style="width:155px; height:158.34px; background: linear-gradient(45deg, #FF00C7, #020202);">
                            <div class="card-body">
                                <p>Daily</p>
                                <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
                                <i class="ion ion-md-download" style="width:35px; height:35px;"></i>
                            </div>
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
                            <div id="morris-donut-example" class="morris-charts morris-charts-height"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-xl-12">

        <div class="card">
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
                    <div class="col-4 ">
                        <canvas id="lineChart" height="300"></canvas>
                    </div>
                    <div class="col-4 ">
                            <div id="morris-donut-example" class="morris-charts morris-charts-height"></div>
                    </div>
                    <div class="col-4 ">
                        <div id="morris-donut-example" class="morris-charts morris-charts-height"></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->





<div class="row">
    <div class="col-xl-12">

        <div class="card">
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
                                    <b
                                    \utton type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
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
                        <div id="morris-area-example" class="morris-charts morris-charts-height"></div>
                    </div>
                    <div class="col-4 bg-warning">
                            <div id="morris-donut-example" class="morris-charts morris-charts-height"></div>
                    </div>
                    <div class="col-4 bg-danger">
                        <div id="morris-donut-example" class="morris-charts morris-charts-height"></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('js')

<script type="text/javascript">
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById(".jam").innerHTML = tanggal.getHours() + ':' + tanggal.getMinutes() + ':' + tanggal.getSeconds();
    }

</script>
@endpush
