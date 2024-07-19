@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<div class="pagetitle">
    <h1><i class="bi bi-files"></i> Berkas</h1>
</div>
<!-- End Page Title -->

@php
$tahun = request('tahun');
$instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
@endphp
<div class="d-none">{{ $tahun }}</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            @if($aplikasi || $call_center)
            <div class="alert alert-primary mt-4">Ada data yang belum di finalisasi. Mohon lakukan finalisasi!</div>
            <p>Status: 
                <ul>
                    <li>Pendataan Aplikasi Pelayanan Publik Sedang Proses, <a href="#">Klik Disini!</a></li>
                    <li>Pendataan Aplikasi Layanan Administrasi Pemerintahan Sedang Proses, <a href="#">Klik Disini!</a></li>
                    <li>Pendataan Layanan Call Center Sedang Proses, <a href="#">Klik Disini!</a></li>
                </ul>
            </p>
            @elseif($aplikasi_final >= 1 && $call_center_final >= 1 && $jlhberkas == 0)
           
            <div class="card">
                <div class="card-header">
                    Upload berkas anda disini
                </div>
                <div class="card-body">
                    <form action="{{ route('menu.kirimberkas') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="instansi_id" value="{{ $instansi_id }}" class="form-control">
                        <input type="hidden" name="nama" value="Layanan Aplikasi Tahun {{ $tahun }}" class="form-control">
                        <input type="hidden" name="tahun" value="{{ $tahun }}" class="form-control">
                        <div class="form-gorup mt-3">
                            <label>File Aplikasi Layanan Publik</label>
                            <input type="file" name="file_aps_publik" class="form-control" required>
                        </div>
                        <div class="form-gorup mt-3">
                            <label>File Aplikasi Adm. Pemerintahan</label>
                            <input type="file" name="file_aps_pemerintah" class="form-control" required>
                        </div>
                        <div class="form-gorup mt-3">
                            <label>File Layanan Call Center</label>
                            <input type="file" name="file_call_center" class="form-control" required>
                        </div>
                        <div class="form-gorup mt-3">
                            <button class="btn btn-outline-success" type="submit"><i class="bi bi-check-circle"></i> Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
           
            
            @elseif($aplikasi_final >= 1 && $call_center_final >= 1 && $jlhberkas >= 1)
            <div class="card">
                <div class="card-body mt-3">
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tahun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($berkas as $bks)
                            <tr>
                                <td>{{$bks->nama}}</td>
                                <td>{{$bks->tahun}}</td>
                                @if($bks->posisi == 'Pengguna')
                                <td class="text-center">
                                    <a href="{{ route('menu.detail_berkas', $bks->id) }}" class="btn btn-outline-primary"><i class="bi bi-eye"></i> Lihat</a>
                                    <a href="#" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#sendberkas{{$bks->id}}"><i class="bi bi-send"></i> Kirim</a>                                    
                                </td>


<!-- Modal Kirim Berkas -->
<div class="modal fade" id="sendberkas{{$bks->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kirim berkas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
                <form method="post" action="{{ route('menu.ubahposisiberkas', ['berkas' => $bks->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{ $bks->id }}">
                    <input type="hidden" name="posisi" value="Admin">
                    <button type="submit" class="btn btn-sm btn-outline-primary btn-icon-split">
                        <i class="bi bi-send"></i> <span class="text">Lanjutkan</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


                                
                                @elseif($bks->posisi == 'Admin')
                                <td class="text-center">
                                    <a href="{{ route('menu.detail_berkas', $bks->id) }}" class="btn btn-outline-primary"><i class="bi bi-eye"></i> Lihat</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="alert alert-primary">Belum tersedia</div>
            @endif
        </div>
    </div>
</section>






@endsection