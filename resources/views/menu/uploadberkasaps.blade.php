@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<div class="pagetitle">
    <h1><i class="bi bi-cpu"></i> Monev Aplikasi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="active ms-1">Pendataan Aplikasi</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if($aplikasi || $call_center)
                    <div>test</div>
                    @elseif($aplikasi_final && $call_center_final)
                    <div class="form-gorup mt-3">
                        <label>Test</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="form-gorup mt-3">
                        <label>Test</label>
                        <input type="text" name="" class="form-control">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection