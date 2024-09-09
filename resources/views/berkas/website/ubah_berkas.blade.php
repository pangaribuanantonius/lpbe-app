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
                    <form action="{{ route('berkas.website.ubah_berkas', ['berkas' => $berkas]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id">
                        <div class="form-group mt-3">
                            <label>File</label>
                            <input type="file" name="file_website" class="form-control" required>
                            {{ $berkas->file_website }}
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-outline-success"><i class="bi bi-check-circle"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection