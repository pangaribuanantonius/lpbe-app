@extends('sidebar.sidebarberkasapsadmin')
@section('berkasapsadmin')

<!-- Page Title -->
<div class="pagetitle">
    <h1><i class="bi bi-files"></i> Berkas</h1>
</div>
<!-- End Page Title -->

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
                @foreach($listberkas as $bks)
                @if($bks->posisi == 'Pengguna')
                <tr>
                    <td>{{$bks->nama}}</td>
                    <td>{{$bks->tahun}}</td>
                    <td class="text-center">
                        <a href="{{ route('superadmin.detail_berkas', $bks->id) }}" class="btn btn-outline-primary"><i class="bi bi-eye"></i> Lihat</a>
                    </td>
                </tr>
                @elseif($bks->posisi == 'Admin')
                <tr>
                    <td>{{$bks->nama}}</td>
                    <td>{{$bks->tahun}}</td>
                    <td class="text-center">
                        <a href="{{ route('superadmin.detail_berkas', $bks->id) }}" class="btn btn-outline-primary"><i class="bi bi-eye"></i> Lihat</a>
                        <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#balikberkas{{$bks->id}}"><i class="bi bi-send"></i> Kembalikan</a>
                    </td>
                </tr>
                @endif

<!-- Modal balik berkas -->
<div class="modal fade" id="balikberkas{{$bks->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kembalikan berkas ke Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
                <form method="post" action="{{ route('superadmin.balikberkaskepengguna', ['berkas' => $bks->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{ $bks->id }}">
                    <input type="hidden" name="posisi" value="Pengguna">
                    <button type="submit" class="btn btn-sm btn-outline-primary btn-icon-split">
                        <i class="bi bi-send"></i> <span class="text">Lanjutkan</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection