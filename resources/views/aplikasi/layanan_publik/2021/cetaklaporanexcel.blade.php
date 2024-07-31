<table class="table table-bordered table-striped" border="1" width="100%">
    <thead>
        <tr>
            <th colspan="5">Laporan Aplikasi {{ $nama_instansi }}</th>
        </tr>
        <tr>
            <th colspan="5">Tahun 2021</th>
        </tr>
        <tr>
            <th>Nama Aplikasi</th>
            <th>Deskripsi</th>
            <th>Kepemilikan</th> 
            <th>Tempat Aplikasi</th>
            <th>Pengguna</th>
        </tr>
    </thead>
    <tbody>
        @foreach($aplikasi as $publik)
        <tr>
            <td>{{ $publik->nama_aplikasi }}</td>
            <td>{{ $publik->deskripsi }}</td>
            <td>{{ $publik->kepemilikan }}</td>
            <td>{{ $publik->tempataplikasi }}</td>
            <td>{{ $publik->pengguna }}</td>
        </tr>                       
        @endforeach
    </tbody>
</table> 