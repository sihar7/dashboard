<header id="page-topbar">
    <div
        style="width: 100%;height: 12vh;display: flex;justify-content: center;align-items: center;background-color: black;">
        <div
            style="clip-path: polygon(0 0, 100% 0, 88% 100%, 11% 100%);width:50%;height:12vh;background-color:#222222;display: flex;justify-content: center;align-items: center; ">
            <div style="width: 70%;height: 12vh;">
                <div class="row">
                    <div class="col col-lg-4"
                        style="margin: 0px;display: flex;justify-content: center;align-items: center;height: 100px;text-align: center;">
                        <img src="{{ asset('property/arwics.png') }}"
                            style="width: 100px;height: 100px;object-fit: contain;" alt="">
                    </div>
                    <div class="col col-lg-4"
                        style="margin: 0px;display: flex;justify-content: center;align-items: center;flex-direction: column;">
                        <div class="row">

                            @php
                            $tanggal = mktime(date('m'), date("d"), date('Y'));
                            @endphp
                            <h6> {{ \Carbon\Carbon::parse($tanggal)->isoFormat('dddd, D MMMM Y') }}</h6>
                        </div>
                        <div class="row">
                            <h3 id="jam"></h3>
                        </div>
                    </div>
                    @if(session('logo_asuransi'))
                    <div class="col col-lg-4 "
                        style="margin: 0px;display: flex;justify-content: center;align-items: center;">
                        <img src="{{ asset('property/', session()->get('logo_asuransi')) }}"
                            style="width: 100px;height: 100px;object-fit: contain;" alt="">
                    </div>
                    @else
                    <div class="col col-lg-4 "
                        style="margin: 0px;display: flex;justify-content: center;align-items: center;">
                        <img src="{{ asset('property/car.png') }}"
                            style="width: 100px;height: 100px;object-fit: contain;" alt="">
                    </div>
                    @endif
                </div>

            </div>
        </div>


        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen font-size-24"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="ti-bell"></i>
                    <span class="badge bg-danger rounded-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0"> Notifications (258) </h5>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title border-success rounded-circle ">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your order is placed</h6>
                                    <div class="text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title border-warning rounded-circle ">
                                        <i class="mdi mdi-message"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">New Message received</h6>
                                    <div class="text-muted">
                                        <p class="mb-1">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title border-info rounded-circle ">
                                        <i class="mdi mdi-glass-cocktail"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                    <div class="text-muted">
                                        <p class="mb-1">It is a long established fact that a reader will</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title border-primary rounded-circle ">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Your order is placed</h6>
                                    <div class="text-muted">
                                        <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title border-warning rounded-circle ">
                                        <i class="mdi mdi-message"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">New Message received</h6>
                                    <div class="text-muted">
                                        <p class="mb-1">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)">
                            View all
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block">
               <form action="{{ url('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn header-item noti-icon waves-effect">
                        <i class="mdi mdi-logout font-size-24"></i>
                    </button>
                </form>
            </div>

        </div>


    </div>



</header>
