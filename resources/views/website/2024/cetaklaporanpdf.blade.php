<!DOCTYPE html>
<html>
<head>
	<title>Call Center Tahun 2024 {{ $nama_instansi }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
			<strong>Layanan Call Center <br> {{ $nama_instansi }}</Strong><br>
			<strong>Tahun 2024</strong>
		</p>
	</center>
 
	<table class="table table-bordered" style="padding:4px;" width="100%" border="1">
		<thead>
			<tr>
				<th>Nama Website</th>
				<th>Deskripsi Website</th>
				<th>Pengembang</th>
				<th>Tempat</th>
			</tr>
		</thead>
		<tbody>
			@if($hitung_website == 0)
			<tr>
				<td>Nihil</td>
				<td>Nihil</td>
				<td>Nihil</td>
				<td>Nihil</td>
				<td>Nihil</td>
			</tr>
			@else
			@foreach($website as $w)
			<tr>
				<td>{{ $w->nama_layanan }}</td>
				<td>{{ $w->nomor_layanan }}</td>
				<td>{!! nl2br(e($w->deskripsi_layanan)) !!}</td>
				<td>{{ $w->sektorlayanan }}</td>
				<td>{{ $w->sektorlainnya }}</td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
	<br>
	<br>


		<table border="0">
			<tbody>
				<!-- <tr>
					<td>
						<span>Lubuk Pakam, Agustus 2023</span>
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