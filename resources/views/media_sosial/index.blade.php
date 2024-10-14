@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<!-- Page Title -->
<div class="pagetitle">
    <h1><i class="bi bi-controller"></i> Media Sosial</h1>
    <ol class="breadcrumb">
        <li class="active ms-1">Data</li>
    </ol>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    @if($hitung_media_sosial == 0)
    <div class="alert alert-info" role="alert">
        Tidak Ada Data
    </div>
    <a class="btn btn-outline-success" href="{{ route('media_sosial.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
    @else
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="form-group mt-3">
                    <label><h5>Facebook</h5></label>
                    <div>
                        sdfkjkh
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label><h5>Instagram</h5></label>
                    <div>
                        sdfkjkh
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label><h5>Twitter</h5></label>
                    <div>
                        sdfkjkh
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label><h5>Youtube</h5></label>
                    <div>
                        sdfkjkh
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label><h5>Tiktok</h5></label>
                    <div>
                        sdfkjkh
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label><h5>Thread</h5></label>
                    <div>
                        sdfkjkh
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i> Ubah Data</button>
    @endif
</section>

@endsection