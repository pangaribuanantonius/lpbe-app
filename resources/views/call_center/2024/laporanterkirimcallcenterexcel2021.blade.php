       <table class="table table-bordered table-striped" border="1" width="100%">
            <thead>
                <tr>
                    <th colspan="5">Laporan Layanan Call Center {{ $nama_instansi }}</th>
                </tr>
                <tr>
                    <th colspan="5">Tahun 2021</th>
                </tr>
                <tr>
                    <th>Nama Layanan</th>
                    <th>Nomor Layanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($call_center as $c)
                <tr>
                    <td>{{ $c->nama_layanan }}</td>
                    <td>{{ $c->nomor_layanan }}</td>
                </tr>                       
                @endforeach
            </tbody>
        </table> 