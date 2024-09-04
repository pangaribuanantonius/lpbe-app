@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<div class="pagetitle">
	<h1><i class="bi bi-cpu"></i> Monev Aplikasi</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Website</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->



@if($jumlahwebsite == 0)
<div class="alert alert-info" role="alert">
	Tidak Ada Data
</div>
<a class="btn btn-outline-success" href="{{ route('website.2021.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
<a class="btn btn-outline-danger" href="#" data-bs-toggle="modal" data-bs-target="#finalisasinihilwebsite"><i class="bi bi-check2-circle"></i> Finalisasi</a>

<!-- Modal -->
<div class="modal fade" id="finalisasinihilwebsite" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tahap Finalisasi</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Tidak ada data yang di entri. Apakah anda yakin untuk memfinalisasi layanan ini ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
				<form method="post" action="#" enctype="multipart/form-data">
					@csrf
					@method('POST')
					<input type="hidden" name="tahun" value="2021">
					<input type="hidden" name="instansi_id" class="form-control" value=" {{ \App\Models\User::where('username', session('username'))->first()->instansi_id }}" readonly>
					
					<button type="submit" class="btn btn-sm btn-outline-primary btn-icon-split">
						<i class="bi bi-cloud-upload"></i> <span class="text">Lanjutkan</span>
					</button>
					
				</form>
			</div>
		</div>
	</div>
</div>



@elseif($jumlahwebsite >=1 && $statusswebsite->status == 'Sedang Proses')
<div class="alert alert-info alert-dismissible fade show" role="alert">
	Sedang Proses
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<section class="section dashboard">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body mt-4">
					<table class="table table-hover datatable">
						<thead>
							<tr>
			                    <th>Nama Website</th>
								<th>Tempat</th>
								<th>Status</th>
			                    <th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($website as $w)
							<tr>
								<td>{{ $w->nama_website }}</td>
								<td>{{ $w->tempat }}</td>
								<td>{{ $w->status }}</td>

			                    <td>
			                    	<div class="text-center">
			                            <a class="btn btn-outline-dark text-center mb-1" style="white-space: nowrap;" href="#" data-bs-toggle="modal" data-bs-target="#view{{ $w->id }}"><i class="bi bi-eye"></i> Lihat</a>
			                            <a class="btn btn-outline-primary text-center mb-1" style="white-space: nowrap;" href="{{ route('website.2021.edit', $w->id) }}"><i class="bi bi-pencil"></i> Edit</a>
			                        </div>
			                    </td>
							</tr>

							<!-- modal detail data -->
							<div class="modal fade" id="view{{ $w->id }}" tabindex="-1" arial-labelly="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Detail Layanan</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form>
												<div class="form-group">
													<label>Nama Website</label>
													<input type="text" name="nama_website" class="form-control" value="{{ $w->nama_website }}" readonly="readonly">
												</div><br>
												<div class="form-group">
													<label>Deskripsi Website</label>
													<textarea name="deskripsi_website" class="form-control" readonly>{{ $w->deskripsi_website }}</textarea>
												</div><br>
												<div class="form-group">
													<label>URL</label>
													<input type="text" class="form-control" name="url" value="{{ $w->url }}" readonly>
												</div><br>
												<div class="form-group">
													<label>Pengembang</label>
													<input type="text" class="form-control" name="pengembang" value="{{ $w->pengembang }}" readonly>
												</div><br>
												<div class="form-group">
													<label>Tempat</label>
													<input type="text" class="form-control" name="tempat" value="{{ $w->tempat }}" readonly>
												</div><br>
												<div class="form-group">
													<label>Nama PIC</label>
													<input type="text" class="form-control" name="nama_pic" value="{{ $w->nama_pic }}" readonly>
												</div><br>
												<div class="form-group">
													<label>Jabatan</label>
													<input type="text" class="form-control" name="jabatan_pic" value="{{ $w->jabatan_pic }}" readonly>
												</div><br>
												<div class="form-group">
													<label>Kontak</label>
													<input type="text" class="form-control" name="kontak" value="{{ $w->kontak }}" readonly>
												</div><br>
											</form>
										</div>
                                <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Tutup</button>
                                </div> -->
                            </div>
                        </div>
                    </div>


							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<a class="btn btn-outline-success" href="{{ route('website.2021.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
			<a class="btn btn-outline-danger" href="#" data-bs-toggle="modal" data-bs-target="#Modal"><i class="bi bi-check2-circle"></i> Finalisasi</a>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tahap Finalisasi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						Apakah anda ingin melakukan finalisasi data ?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
						<form method="post" action="{{ route('website.2021.updatefinal') }}" enctype="multipart/form-data">
							@csrf
							@method('POST')
							<button type="submit" class="btn btn-sm btn-outline-primary btn-icon-split">
								<i class="bi bi-cloud-upload"></i> <span class="text">Lanjutkan</span>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>

@elseif($jumlahwebsite >=1 && $statusswebsite->status == 'Final')
<div class="alert alert-info alert-info alert-dismissible fade show" role="alert">
	Sudah Final
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<!--<div class="mb-2" align="right">
	<a class="btn btn-outline-danger" style="margin-left: 762px;" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
		<i class="bi bi-printer"></i> cetak
	</a>
	<ul class="dropdown-menu">
		<li><a class="dropdown-item" href="{{ route('website.2021.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> PDF</a></li>
		<li><a class="dropdown-item" href="#" target="_blank"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</a></li>
	</ul>
</div>-->

@if($penandatanganan == 0)
<div class="text-end">
	<button class="first btn btn-danger mb-2"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</button>
	<button class="second btn btn-success mb-2"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</button>
</div>
@else
<div class="text-end">
	<a class="btn btn-danger mb-2" href="#" target="_blank"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
	<a class="btn btn-success mb-2" href="#" target="_blank"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</a>
</div>

<!-- @if($website->count() == $website->where('verifikasi', 'Disetujui')->count())
<div class="text-end">
	<a class="btn btn-danger mb-2" href="{{ route('website.2021.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> Cetak</a>
</div>
@else
@endif -->
@endif

<section class="section dashboard">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body mt-4">
					<table class="table table-hover datatable">
						<thead>
							<tr>
								<th>Nama Layanan</th>
								<th>Nomor Layanan</th>
			                    <th>Status</th>
								<th>Verifikasi</th>
			                    <th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($website as $w)
							<tr>
								<td>{{ $w->nama_layanan }}</td>
			                    <td>{{ $w->nomor_layanan }}</td>
								<td>{{ $w->status }}</td>
								<td>
									@if($w->verifikasi == 'Ditolak')
									<p class="badge text-danger">
										<i class="bi bi-x-circle"></i> {{ $w->verifikasi }}
									</p>
									@elseif($w->verifikasi == 'Ditinjau')
									<p class="badge text-primary">
										<i class="bi bi-info-circle"></i> {{ $w->verifikasi }}
									</p>
									@elseif($w->verifikasi == 'Disetujui')
									<p class="badge text-success">
										<i class="bi bi-check-circle"></i> {{ $w->verifikasi }}
									</p>
									@elseif($w->verifikasi == 'Kosong')
									<p class="badge text-danger">
										<i class="bi bi-ban"></i> Belum Diverifikasi
									</p>
									@else
									<p class="badge text-danger">
										<i class="bi bi-ban"></i> Belum Diverifikasi
									</p>
									@endif
								</td>
								<td>
									<div class="text-center">
										<a class="btn btn-outline-dark mb-1" style="white-space: nowrap;" href="#" data-bs-toggle="modal" data-bs-target="#view2{{ $w->id }}"><i class="bi bi-eye"></i> Lihat</a>
									</div>
								</td>
							</tr>

							<!-- modal detail data -->
							<div class="modal fade" id="view2{{ $w->id }}" tabindex="-1" arial-labelly="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Detail Layanan</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form>
												<div class="form-group">
													<label>Catatan</label>
													@if($w->catatan == 'Kosong' || $w->catatan == '')
													<p>Tidak ada catatan</p>
													@else
													<p>{{$w->catatan }}</p>
													@endif
												</div>
												<div class="form-group">
													<label>Nama Layanan</label>
													<input type="text" name="nama_layanan" class="form-control" value="{{ $w->nama_layanan }}" readonly="readonly">
												</div><br>
												
											</form>
										</div>
                                <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Tutup</button>
                                </div> -->
                            </div>
                        </div>
                    </div>


                    @endforeach
                </tbody>
            </table>
             <!-- <a class="btn btn-sm btn-outline-success" href="{{ route('website.2021.laporanterkirimwebsiteexcel2021') }}" target="_blank"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</a> -->
            
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tahap Finalisasi</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Apakah anda ingin melakukan finalisasi data ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
				<form method="post" action="{{ route('aplikasi.layanan_publik.2021.updatestatus') }}" enctype="multipart/form-data">
					@csrf
					@method('POST')
					<button type="submit" class="btn btn-sm btn-outline-primary btn-icon-split">
						<i class="bi bi-cloud-upload"></i> <span class="text">Lanjutkan</span>
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

</div>
</section>

@else
<div class="alert alert-info" role="alert">
	Finalisasi Nihil
</div>
@if($penandatanganan == 0)
<div class="text-end">
	<button class="first btn btn-danger mb-2"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</button>
	<button class="second btn btn-success mb-2"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</button>
</div>
@else
<div class="text-end">
	<a class="btn btn-danger mb-2" href="{{ route('website.2021.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
	<a class="btn btn-success mb-2" href="{{ route('website.2021.cetaklaporanexcel') }}" target="_blank"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</a>
</div>

<!-- @if($website->count() == $website->where('verifikasi', 'Disetujui')->count())
<div class="text-end">
	<a class="btn btn-danger mb-2" href="{{ route('website.2021.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> Cetak</a>
</div>
@else
@endif -->
@endif
@endif

<script>
	document.querySelector(".first").addEventListener('click', function(){
		Swal.fire({
			icon: 'error',
			title: 'Peringatan',
			html: 'Kolom Penandatanganan belum diisi, Klik <a href="{{ route('penandatanganan.create') }}">disini</a> untuk pengisian.',
			confirmButtonText: 'Tutup',
			
		});
	});
</script>

<script>
	document.querySelector(".second").addEventListener('click', function(){
		Swal.fire({
			icon: 'error',
			title: 'Peringatan',
			html: 'Kolom Penandatanganan belum diisi, Klik <a href="{{ route('penandatanganan.create') }}">disini</a> untuk pengisian.',
			confirmButtonText: 'Tutup',
			
		});
	});
</script>

@endsection



