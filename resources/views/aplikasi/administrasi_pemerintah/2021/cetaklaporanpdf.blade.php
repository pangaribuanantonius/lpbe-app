<!DOCTYPE html>
<html>
<head>
	<title>Layanan Aplikasi Adm Pemerintah Tahun 2021 {{ $nama_instansi }}</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 12pt;
			margin: 500px;
		}

	</style>
	<center>
		<p align="center">
			<strong>Aplikasi Layanan Administrasi Pemerintahan <br>{{ $nama_instansi }}</Strong><br>
			<strong>Tahun 2021</strong>
		</p>
	</center>
 
	<table class="table table-bordered" style="padding:4px;" width="100%" border="1">
		<thead>
			<tr>
				<th>Nama Aplikasi</th>
				<th>Deskripsi</th>
				<th>Kepemilikan</th>
				<th>Bidang Urusan</th>
				<th>Tempat Aplikasi</th>
				<th>Pengguna</th>
			</tr>
		</thead>
		<tbody>
			@foreach($aplikasi as $p)
			<tr>
				<td>{{ $p->nama_aplikasi }}</td>
				<td>{{ $p->deskripsi }}</td>
				<td>{{ $p->kepemilikan }}</td>
				<td>{{ $p->anakurusan1->nama_bidang_urusan }}</td>
				<td>{{ $p->tempataplikasi }}</td>
				<td>{{ $p->pengguna }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<br>
	<br>


		<table border="0">
			<tbody>
				<!-- <tr>
					<td>
						<span>{{$penandatanganan->kecamatan->nama_kecamatan}}, Agustus 2023</span>
						<br><br><br><br>
					</td>
				</tr>
				<tr>
					<td>{{ $penandatanganan->nama }}</td>
				</tr>
				<tr>
					<td>PEMBINA UTAMA MUDA</td>
				</tr>
				<tr>
					<td>NIP. {{ $penandatanganan->nip }}</td>
				</tr> -->

				<tr>
					<td width="20%"></td>
					<td width="20%"></td>
					<td width="30%"></td>
					<td width="30%">{{$penandatanganan->kecamatan->nama_kecamatan}}, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</td>
				</tr>
				<tr>
					<td width="20%"></td>
					<td width="20%"></td>
					<td width="30%"></td>
					<td width="30%">{{ $penandatanganan->jabatan }}</td>
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

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>