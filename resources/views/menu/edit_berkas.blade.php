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
                <div class="card-header">
                    Upload berkas anda disini
                </div>
                <div class="card-body">
                    <form action="{{ route('menu.edit_berkas', ['berkas' => $berkas]) }}" method="post" enctype="multipart/form-data">
                        @csrf 
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $berkas->id }}">
                        <div class="form-group mt-2">
                            <label>File Aplikasi Layanan Publik</label>
                            <input type="file" name="file_aps_publik" class="form-control">
                            <div class="d-none">{{ url('/')}}/konten/berkas/{{ $berkas->file_aps_publik }}</div>
                        </div>
                        <div class="form-group mt-2">
                            <label>File Aplikasi Administrasi Pemerintahan</label>
                            <input type="file" name="file_aps_pemerintah" class="form-control">
                            <div class="d-none">{{ url('/')}}/konten/berkas/{{ $berkas->file_aps_pemerintah }}</div>
                        </div>
                        <div class="form-group mt-2">
                            <label>File Layanan Call Center</label>
                            <input type="file" name="file_call_center" class="form-control">
                            <div class="d-none">{{ url('/')}}/konten/berkas/{{ $berkas->file_call_center }}</div>
                        </div>
                        <div class="form-gorup mt-3">
                            <button class="btn btn-outline-success" type="submit"><i class="bi bi-check-circle"></i> Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection