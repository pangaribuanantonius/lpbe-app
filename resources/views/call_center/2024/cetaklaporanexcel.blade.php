<table class="table table-bordered table-striped" border="1" width="100%">
    <thead>
        <tr>
            <th>Nama Layanan</th>
            <th>Nomor Layanan</th>
            <th>Deskripsi Layanan</th>
            <th>Sektor Layanan</th> 
            <th>Sektor Lain</th>
        </tr>
    </thead>
    <tbody>
        @foreach($call_center as $c)
        <tr>
            <td>{{ $c->nama_layanan }}</td>
            <td>{{ $c->nomor_layanan }}</td>
            <td>{{ $c->deskripsi_layanan }}</td>
            <td>{{ $c->sektorlayanan }}</td>
            <td>{{ $c->sektorlainnya }}</td>
        </tr>                       
        @endforeach
    </tbody>
</table> 