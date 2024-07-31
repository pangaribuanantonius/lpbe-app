<table class="table table-bordered table-striped" border="1" width="100%">
    <thead>
        <tr>
            <th>Nama Aplikasi</th>
            <th>Deskripsi</th>
            <th>Kepemilikan</th> 
            <th>Tempat Aplikasi</th>
            <th>Pengguna</th>
        </tr>
    </thead>
    <tbody>
        @foreach($aplikasi as $admpemerintah)
        <tr>
            <td>{{ $admpemerintah->nama_aplikasi }}</td>
            <td>{{ $admpemerintah->deskripsi }}</td>
            <td>{{ $admpemerintah->kepemilikan }}</td>
            <td>{{ $admpemerintah->tempataplikasi }}</td>
            <td>{{ $admpemerintah->pengguna }}</td>
        </tr>                       
        @endforeach
    </tbody>
</table> 