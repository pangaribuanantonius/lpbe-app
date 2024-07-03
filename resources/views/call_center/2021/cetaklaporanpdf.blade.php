<!DOCTYPE html>
<html>
<head>
	<title>Call Center Tahun 2021 {{ $nama_instansi }}</title>
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
			<strong>Layanan Call Center {{ $nama_instansi }}</Strong><br>
			<strong>Tahun 2021</strong>
		</p>
	</center>
 
	<table class="table table-bordered" style="padding:4px;" width="100%" border="1">
		<thead>
			<tr>
				<th>Nama Layanan</th>
				<th>Nomor Layanan</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($call_center as $c)
			<tr>
				<td>{{ $c->nama_layanan }}</td>
				<td>{{ $c->nomor_layanan }}</td>
				<td>{{ $c->status }}</td>
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
					<td width="30%">#</td>
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