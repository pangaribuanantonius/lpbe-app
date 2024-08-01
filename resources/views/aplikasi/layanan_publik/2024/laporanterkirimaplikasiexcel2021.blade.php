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
                    <th>Klasifikasi</th>
                    <th>Kepemilikan</th> 
                    <th>Tempat Aplikasi</th>
                    <th>Pengguna</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aplikasi as $i1)
                <tr>
                    <td>{{ $i1->nama_aplikasi }}</td>
                    <td>{{ $i1->jenis_aplikasi }}</td>
                    <td>{{ $i1->kepemilikan }}</td>
                    <td>{{ $i1->tempataplikasi }}</td>
                    <td>{{ $i1->pengguna }}</td>
                </tr>                       
                @endforeach
            </tbody>
        </table> 