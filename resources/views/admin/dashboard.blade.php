@extends('admin.layouts.master')

@push('mytitle')
DASHBOARD
@endpush

@push('mycss')

@endpush

@push('myheading')
 <!-- Dashboard Heading -->
 <div class="dashboard-heading">
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box infobox-type-5 hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">supervisor_account</i>
                </div>
                <div class="content">
                    <div class="text">TELEMARKETING</div>
                    <div class="number">{{ $teleCount }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box infobox-type-5 hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">equalizer</i>
                </div>
                <div class="content">
                    <div class="text">ASURANSI</div>
                    <div class="number">{{ $asuransiCount }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box infobox-type-5 hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">shopping_cart</i>
                </div>
                <div class="content">
                    <div class="text">TRANSAKSI SPAJ & POLICE APPROVED</div>
                    <div class="number">{{ $spajCount }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box infobox-type-5 hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="content">
                    <div class="text">PREMIUM TOTAL</div>
                    <div class="number">{{ $premiumCount }}</div>
                </div>
            </div>
        </div>
    </div>

    <div style="display:flex;margin-top: 5px; justify-content: center;align-items: center;">
        <h3 style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">ADMIN DASHBOARD MONITORING</h3>
    </div>
</div>
<!-- #END# Dashboard Heading -->


@endpush

@section('content')
<!-- Main Graph -->
<div class="main-graph">
    <div class="row clearfix">
        <div class="card" style="padding-top:10%; padding-bottom:10%;">
            <div class="body text-center">
                <img src="https://arwics.com/favicon.png" alt="logopeduli" height="325" width="290">
            </div>
        </div>
    </div>
</div>

@endsection

@push('myjs')

@endpush
