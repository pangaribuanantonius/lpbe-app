@extends('sidebar.sidebarpendataanaplikasiadmin')
@section('monevaplikasiadmin')

<!-- Page Title -->
<div class="pagetitle">
    <h1><i class="bi bi-files"></i> Berkas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="active ms-1">Layanan Aplikasi</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('superadmin.listberkas') }}" method="get" enctype="multipart/form-data">
                        <div class="form-group mt-3">
                            <label>Tahun</label>
                            <select name="tahun" class="form-control" required>
                                <option value="">Pilih</option>
                                @foreach($tahun as $thn)
                                <option value="{{ $thn->tahun }}">{{ $thn->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Instansi</label>
                            <select name="instansi_id" class="form-control" required>
                                <option value="">Pilih</option>
                                @foreach($instansi as $i)
                                <option value="{{ $i->id }}">{{ $i->nama_instansi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-outline-primary"><i class="bi bi-arrow-right-circle"></i> Lanjut</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection