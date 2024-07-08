@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<!-- Page Title -->
<div class="pagetitle">
    <h1><i class="bi bi-files"></i> Berkas</h1>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   
                    <div class="mt-3 text-center">
                        <p>
                            <h1 class="text-center">{{ $berkas->nama }}</h1>
                            {{ $nama_instansi }}
                        </p>
                        <p class="text-center"><a class="btn d-block btn-primary" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_aps_publik }}" target="_blank" class="text-primary"><small>File Aps Layanan Publik</small></a></p>
                        <p class="text-center"><a class="btn d-block btn-primary" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_aps_pemerintah }}" target="_blank" class="text-primary"><small>File Aps Layanan Administrasi Pemerintahan</small></a></p>
                        <p class="text-center"><a class="btn d-block btn-primary" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_call_center }}" target="_blank" class="text-primary"><small>File Layanan Call Center</small></a></p>
                        <p class="text-center"><a class="btn d-block btn-danger" href="#" class="text-primary"><small>Hapus</small></a></p>
                    </div>
            
                </div>
            </div>
        </div>
    </div>
</section>

@endsection