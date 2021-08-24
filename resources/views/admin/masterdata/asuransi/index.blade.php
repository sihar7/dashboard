@extends('admin.layouts.master')

@push('mytitle')
ADMIN | DASHBOARD
@endpush

@push('mycss')

@endpush

@push('myheading')
<div class="page-heading">
    <h1>ASURANSI</h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard') }}">Home</a></li>
        <li class="active">Asuransi</li>
    </ol>
</div>
@endpush

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">TABEL ASURANSI</div>
    <div class="panel-body">
        <table class="table table-striped table-hover mr-auto" id="table-asuransi">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Asuransi</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('myjs')
<script src="{{ asset('admin/assets/js/datatable.js') }}"></script>

@endpush
