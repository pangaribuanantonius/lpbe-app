@extends('sidebar.sidebarpendataanaplikasiadmin')
@section('monevaplikasiadmin')

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
                <tr>
                    <td>{{$bks->nama}}</td>
                    <td>{{$bks->tahun}}</td>
                    <td class="text-center">
                        <a href="{{ route('superadmin.detail_berkas', $bks->id) }}" class="btn btn-outline-primary"><i class="bi bi-eye"></i> Lihat</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection