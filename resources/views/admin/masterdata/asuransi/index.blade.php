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
<div class="panel panel-default" id="card">
    <div class="panel-body">
        <div class="clearfix">
            <div class="pull-right m-w-150 m-l-5">
                <button type="button" id="tambahAsuransi" class="btn btn-block btn-success btn-sm">Tambah <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
            </div>
        </div>

        <div id="formAsuransi">
            <form id="data-asuransi">
                @csrf
                <div class="form-group">
                    <label>Nama Asuransi</label>
                    <input type="text" class="form-control" placeholder="Nama Asuransi"
                    oninvalid="this.setCustomValidity('Mohon Masukan Nama Asuransi')"
                    onkeypress="return harusHuruf(event)" required/>
                </div>
                <div class="form-group">
                    <label>Logo Asuransi</label>

                    <input type="file" name="logo" accept="image/*" id="logo" onchange="loadPreview(this);"
                    class="form-control">

                    <label for="profile_image"></label>
                    <img id="preview_img"
                        src="https://www.w3adda.com/wp-content/uploads/2019/09/No_Image-128.png"
                        class="" width="200" height="150" />
                </div>

            </form>
        </div>
    </div>
</div>
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
<script type="text/javascript">
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    function harusHuruf(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32)
            return false;
        return true;
    }


    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#formAsuransi").hide();

        $(this).on('click', '#tambahAsuransi', function (e) {
            e.preventDefault();
            $("#formAsuransi").show();
            var animation = "bounceInLeft";
            $("#formAsuransi").animateCss(animation);
        });
    });
</script>
<script src="{{ asset('admin/assets/js/datatable.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/ui/animations.js') }}"></script>

@endpush
