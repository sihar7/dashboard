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
    height:100%;
    -webkit-transform: rotate(-90deg) scale(.68,.68);
    -moz-transform:rotate(-90deg) scale(.58,.58) }    }
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
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card text-white bg-info" style="width:185px; height:178.34px; background: linear-gradient(45deg, #FF00C7, #020202);">
                            <div class="card-body">
                                <p>Daily</p>
                                <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
                                <i class="ion ion-md-download" style="width:35px; height:35px;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card text-white bg-warning" style="width:185px; height:178.34px; background: linear-gradient(45deg, #0049FF, #020202);">
                            <div class="card-body">
                                <p>Weekly</p>
                                <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
                                <i class="ion ion-md-download"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card text-white bg-danger"  style="width:185px; height:178.34px; background: linear-gradient(45deg, #FF0037, #020202);">
                            <div class="card-body">
                                <p>Monthly</p>
                                <button type="button" class="btn btn-outline-light waves-effect" style="color:#fff; border-color:#fff;">Detail</button>
                                <i class="ion ion-md-download"></i>
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
                    <div class="col-6">
                        <div id="morris-area-example" class="morris-charts morris-charts-height"></div>
                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            <div id="morris-donut-example" class="morris-charts morris-charts-height"></div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">

    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Inbox</h4>
                <div class="inbox-wid">
                    <a href="#" class="text-dark">
                        <div class="inbox-item">
                            <div class="inbox-item-img float-start me-3"><img src="{{ asset('assets/images/users/user-1.jpg') }}" class="avatar-sm rounded-circle" alt=""></div>
                            <h6 class="inbox-item-author mt-0 mb-1 font-size-16">Misty</h6>
                            <p class="inbox-item-text text-muted mb-0">Hey! there I'm available...</p>
                            <p class="inbox-item-date text-muted">13:40 PM</p>
                        </div>
                    </a>
                    <a href="#" class="text-dark">
                        <div class="inbox-item">
                            <div class="inbox-item-img float-start me-3"><img src="{{ asset('assets/images/users/user-2.jpg') }}" class="avatar-sm rounded-circle" alt=""></div>
                            <h6 class="inbox-item-author mt-0 mb-1 font-size-16">Melissa</h6>
                            <p class="inbox-item-text text-muted mb-0">I've finished it! See you so...</p>
                            <p class="inbox-item-date text-muted">13:34 PM</p>
                        </div>
                    </a>
                    <a href="#" class="text-dark">
                        <div class="inbox-item">
                            <div class="inbox-item-img float-start me-3"><img src="{{ asset('assets/images/users/user-3.jpg') }}" class="avatar-sm rounded-circle" alt=""></div>
                            <h6 class="inbox-item-author mt-0 mb-1 font-size-16">Dwayne</h6>
                            <p class="inbox-item-text text-muted mb-0">This theme is awesome!</p>
                            <p class="inbox-item-date text-muted">13:17 PM</p>
                        </div>
                    </a>
                    <a href="#" class="text-dark">
                        <div class="inbox-item">
                            <div class="inbox-item-img float-start me-3"><img src="{{ asset('assets/images/users/user-4.jpg') }}" class="avatar-sm rounded-circle" alt=""></div>
                            <h6 class="inbox-item-author mt-0 mb-1 font-size-16">Martin</h6>
                            <p class="inbox-item-text text-muted mb-0">Nice to meet you</p>
                            <p class="inbox-item-date text-muted">12:20 PM</p>
                        </div>
                    </a>
                    <a href="#" class="text-dark">
                        <div class="inbox-item">
                            <div class="inbox-item-img float-start me-3"><img src="{{ asset('assets/images/users/user-5.jpg') }}" class="avatar-sm rounded-circle" alt=""></div>
                            <h6 class="inbox-item-author mt-0 mb-1 font-size-16">Vincent</h6>
                            <p class="inbox-item-text text-muted mb-0">Hey! there I'm available...</p>
                            <p class="inbox-item-date text-muted">11:47 AM</p>
                        </div>
                    </a>

                    <a href="#" class="text-dark">
                        <div class="inbox-item">
                            <div class="inbox-item-img float-start me-3"><img src="{{ asset('assets/images/users/user-6.jpg') }}" class="avatar-sm rounded-circle" alt=""></div>
                            <h6 class="inbox-item-author mt-0 mb-1 font-size-16">Robert Chappa</h6>
                            <p class="inbox-item-text text-muted mb-0">Hey! there I'm available...</p>
                            <p class="inbox-item-date text-muted">10:12 AM</p>
                        </div>
                    </a>

                </div>
            </div>
        </div>

    </div>
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Recent Activity Feed</h4>

                <ol class="activity-feed mb-0">
                    <li class="feed-item">
                        <div class="feed-item-list">
                            <span class="date">Jun 25</span>
                            <span class="activity-text">Responded to need “Volunteer Activities”</span>
                        </div>
                    </li>
                    <li class="feed-item">
                        <div class="feed-item-list">
                            <span class="date">Jun 24</span>
                            <span class="activity-text">Added an interest “Volunteer Activities”</span>
                        </div>
                    </li>
                    <li class="feed-item">
                        <div class="feed-item-list">
                            <span class="date">Jun 23</span>
                            <span class="activity-text">Joined the group “Boardsmanship Forum”</span>
                        </div>
                    </li>
                    <li class="feed-item">
                        <div class="feed-item-list">
                            <span class="date">Jun 21</span>
                            <span class="activity-text">Responded to need “In-Kind Opportunity”</span>
                        </div>
                    </li>
                </ol>

                <div class="text-center">
                    <a href="#" class="btn btn-sm btn-primary">Load More</a>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xl-4">
        <div class="card widget-user">
            <div class="widget-user-desc p-4 text-center bg-primary position-relative">
                <i class="fas fa-quote-left h2 text-white-50"></i>
                <p class="text-white mb-0">The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe the same vocabulary. The languages only in their grammar.</p>
            </div>
            <div class="p-4">
                <div class="float-start mt-2 me-3">
                    <img src="{{ asset('assets/images/users/user-2.jpg') }}" alt="" class="rounded-circle avatar-sm">
                </div>
                <h6 class="mb-1 font-size-16 mt-2">Marie Minnick</h6>
                <p class="text-muted mb-0">Marketing Manager</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Yearly Sales</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div>
                            <h3>52,345</h3>
                            <p class="text-muted">The languages only differ grammar</p>
                            <a href="#" class="text-primary">Learn more <i class="mdi mdi-chevron-double-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-8 text-end">
                        <div id="sparkline"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Latest Transactions</h4>

                <div class="table-responsive">
                    <table class="table align-middle table-centered table-vertical table-nowrap">

                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ asset('assets/images/users/user-2.jpg') }}" alt="user-image" class="avatar-xs rounded-circle me-2" /> Herbert C. Patton
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                <td>
                                    $14,584
                                    <p class="m-0 text-muted font-14">Amount</p>
                                </td>
                                <td>
                                    5/12/2016
                                    <p class="m-0 text-muted font-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="{{ asset('assets/images/users/user-3.jpg') }}" alt="user-image" class="avatar-xs rounded-circle me-2" /> Mathias N. Klausen
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Waiting payment</td>
                                <td>
                                    $8,541
                                    <p class="m-0 text-muted font-14">Amount</p>
                                </td>
                                <td>
                                    10/11/2016
                                    <p class="m-0 text-muted font-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="user-image" class="avatar-xs rounded-circle me-2" /> Nikolaj S. Henriksen
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                <td>
                                    $954
                                    <p class="m-0 text-muted font-14">Amount</p>
                                </td>
                                <td>
                                    8/11/2016
                                    <p class="m-0 text-muted font-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="user-image" class="avatar-xs rounded-circle me-2" /> Lasse C. Overgaard
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Payment expired</td>
                                <td>
                                    $44,584
                                    <p class="m-0 text-muted font-14">Amount</p>
                                </td>
                                <td>
                                    7/11/2016
                                    <p class="m-0 text-muted font-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="{{ asset('assets/images/users/user-6.jpg') }}" alt="user-image" class="avatar-xs rounded-circle me-2" /> Kasper S. Jessen
                                </td>
                                <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                <td>
                                    $8,844
                                    <p class="m-0 text-muted font-14">Amount</p>
                                </td>
                                <td>
                                    1/11/2016
                                    <p class="m-0 text-muted font-14">Date</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Latest Orders</h4>

                <div class="table-responsive">
                    <table class="table align-middle table-centered table-vertical table-nowrap mb-1">

                        <tbody>
                            <tr>
                                <td>#12354781</td>
                                <td>
                                    <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-image" class="avatar-xs me-2 rounded-circle" /> Riverston Glass Chair
                                </td>
                                <td><span class="badge rounded-pill bg-success">Delivered</span></td>
                                <td>
                                    $185
                                </td>
                                <td>
                                    5/12/2016
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>#52140300</td>
                                <td>
                                    <img src="{{ asset('assets/images/users/user-2.jpg') }}" alt="user-image" class="avatar-xs me-2 rounded-circle" /> Shine Company Catalina
                                </td>
                                <td><span class="badge rounded-pill bg-success">Delivered</span></td>
                                <td>
                                    $1,024
                                </td>
                                <td>
                                    5/12/2016
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>#96254137</td>
                                <td>
                                    <img src="{{ asset('assets/images/users/user-3.jpg') }}" alt="user-image" class="avatar-xs me-2 rounded-circle" /> Trex Outdoor Furniture Cape
                                </td>
                                <td><span class="badge rounded-pill bg-danger">Cancel</span></td>
                                <td>
                                    $657
                                </td>
                                <td>
                                    5/12/2016
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>#12365474</td>
                                <td>
                                    <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="user-image" class="avatar-xs me-2 rounded-circle" /> Oasis Bathroom Teak Corner
                                </td>
                                <td><span class="badge rounded-pill bg-warning">Shipped</span></td>
                                <td>
                                    $8451
                                </td>
                                <td>
                                    5/12/2016
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                </td>
                            </tr>

                            <tr>
                                <td>#85214796</td>
                                <td>
                                    <img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="user-image" class="avatar-xs me-2 rounded-circle" /> BeoPlay Speaker
                                </td>
                                <td><span class="badge rounded-pill bg-success">Delivered</span></td>
                                <td>
                                    $584
                                </td>
                                <td>
                                    5/12/2016
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>#12354781</td>
                                <td>
                                    <img src="{{ asset('assets/images/users/user-6.jpg') }}" alt="user-image" class="avatar-xs me-2 rounded-circle" /> Riverston Glass Chair
                                </td>
                                <td><span class="badge rounded-pill bg-success">Delivered</span></td>
                                <td>
                                    $185
                                </td>
                                <td>
                                    5/12/2016
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection


@push('js')

@endpush
