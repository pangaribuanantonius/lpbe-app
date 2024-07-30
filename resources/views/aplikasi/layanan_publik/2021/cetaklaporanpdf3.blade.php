<!DOCTYPE html>
<html>
<head>
    <title>Laporan Aplikasi Tahun 2021 {{ $nama_instansi }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 12pt;
        }
        .center-text {
            text-align: center;
        }
        .page-break {
            page-break-before: always;
        }
        .signature-table {
            width: 100%;
            border: none;
            margin-top: 50px; /* Adjust margin as needed */
        }
        .signature-table td {
            vertical-align: top;
        }
        .no-page-break {
            page-break-inside: avoid;
        }
    </style>
</head>
<body>
    <center>
        <p class="center-text">
            <strong>Aplikasi Pelayanan Publik <br> {{ $nama_instansi }}</strong><br>
            <strong>Tahun 2021</strong>
        </p>
    </center>

    <table class="table table-bordered" width="100%" style="padding:4px;" border="1">
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
            @if($hitung_aplikasi == 0)
            <tr>
                <td>Nihil</td>
                <td>Nihil</td>
                <td>Nihil</td>
                <td>Nihil</td>
                <td>Nihil</td>
            </tr>
            @else
            @foreach($aplikasi as $p)
            <tr>
                <td>{{ $p->nama_aplikasi }}</td>
                <td>{{ $p->deskripsi }}</td>
                <td>{{ $p->kepemilikan }}</td>
                <td>{{ $p->tempataplikasi }}</td>
                <td>{{ $p->pengguna }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    
    <div class="page-break"></div>

    <table class="signature-table no-page-break">
        <tbody>
            <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="30%"></td>
                <td width="30%">{{ $penandatanganan->kecamatan->nama_kecamatan }}, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="30%"></td>
                <td width="30%">{{ $penandatanganan->jabatan }} <br>Kabupaten Deli Serdang</td>
            </tr>
            <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="30%"></td>
                <td width="30%"></td>
            </tr>
            <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="30%"></td>
                <td width="30%"></td>
            </tr>
            <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="30%"></td>
                <td width="30%" style="color:#ffffff">#</td>
            </tr>
            <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="30%"></td>
                <td width="30%"></td>
            </tr>
            <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="30%"></td>
                <td width="30%">{{ $penandatanganan->nama }}</td>
            </tr>
            <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="30%"></td>
                <td width="30%">{{ $penandatanganan->pangkat }}</td>
            </tr>
            <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="30%"></td>
                <td width="30%">NIP. {{ $penandatanganan->nip }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
