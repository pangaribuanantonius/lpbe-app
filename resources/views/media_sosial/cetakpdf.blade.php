<!DOCTYPE html>
<html>
<head>
	<title>Laporan Aplikasi Tahun 2024 {{ $nama_instansi }}</title>
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
			<strong>Media Sosial <br> {{ $nama_instansi }}</Strong><br>
		</p>
	</center>
 
	<table class="table table-bordered" width="100%" style="padding:4px;" border="1">
		<thead>
			<tr>
				<th>Link Profil Facebook</th>
                <th>Link Profil Instagram</th>
                <th>Link Profil Twitter</th>
                <th>Link Profil Youtube</th>
                <th>Link Profil Tiktok</th>
                <th>Link Profil Threads</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				@if($media_sosial->link_facebook == '')
				<td>Nihil</td>
				@else
				<td>{{ $media_sosial->link_facebook }}</td>
				@endif

				@if($media_sosial->link_instagram == '')
				<td>Nihil</td>
				@else
				<td>{{ $media_sosial->link_instagram }}</td>
				@endif

				@if($media_sosial->link_twitter == '')
				<td>Nihil</td>
				@else
				<td>{{ $media_sosial->link_twitter }}</td>
				@endif

				@if($media_sosial->link_youtube == '')
				<td>Nihil</td>
				@else
				<td>{{ $media_sosial->link_youtube }}</td>
				@endif

				@if($media_sosial->link_tiktok == '')
				<td>Nihil</td>
				@else
				<td>{{ $media_sosial->link_tiktok }}</td>
				@endif

				@if($media_sosial->link_threads == '')
				<td>Nihil</td>
				@else
				<td>{{ $media_sosial->link_threads }}</td>
				@endif

				
			</tr>
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
					<td class="" width="30%" style="color:#ffffff">#</td>
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
