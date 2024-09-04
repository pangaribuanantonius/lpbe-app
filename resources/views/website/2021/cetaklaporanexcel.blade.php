<table class="table table-bordered table-striped" border="1" width="100%">
    <thead>
        <tr>
            <th>Nama Website</th>
            <th>Deskripsi Website</th>
            <th>Pengembang</th>
            <th>Tempat</th> 
        </tr>
    </thead>
    <tbody>
        @foreach($website as $w)
        <tr>
            <td>{{ $w->nama_website }}</td>
            <td>{{ $w->deskripsi_website }}</td>
            <td>{{ $w->pengembang }}</td>
        </tr>                       
        @endforeach
    </tbody>
</table> 