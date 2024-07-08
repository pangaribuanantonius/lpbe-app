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
                    @foreach($berkas as $bks)
                    <div class="mt-3">
                        <p>{{ $bks->nama }} {{ $nama_instansi }}</p>
                        <p><a href="{{ route('menu.detail_berkas', $bks->id) }}" class="text-primary">Lihat Berkas</a></p>
                        <hr>    
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection