@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<div class="pagetitle">
	<h1><i class="bi bi-cpu"></i> Monev Aplikasi</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Layanan Call Center</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->



@if($jumlahcallcenter == 0)
<div class="alert alert-info" role="alert">
	Tidak Ada Data
</div>
<a class="btn btn-outline-success" href="{{ route('call_center.2024.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
<a class="btn btn-outline-danger" href="#" data-bs-toggle="modal" data-bs-target="#finalisasinihilcallcenter"><i class="bi bi-check2-circle"></i> Finalisasi</a>

<!-- Modal -->
<div class="modal fade" id="finalisasinihilcallcenter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<form method="post" action="{{ route('call_center.2024.finalisasinihil') }}" enctype="multipart/form-data">
					@csrf
					@method('POST')
					<input type="hidden" name="tahun" value="2024">
					<input type="hidden" name="instansi_id" class="form-control" value=" {{ \App\Models\User::where('username', session('username'))->first()->instansi_id }}" readonly>
					<input type="hidden" name="nama_layanan" value="Kosong">
					<input type="hidden" name="nomor_layanan" value="Kosong">
					<input type="hidden" name="deskripsi_layanan" value="Kosong">
					<input type="hidden" name="whatsapp" value="Kosong">
					<input type="hidden" name="telepon" value="Kosong">
					<input type="hidden" name="platform" value="Kosong">
					<input type="hidden" name="sektorlayanan" value="Kosong">
					<input type="hidden" name="sektorlainnya" value="Kosong">
					<input type="hidden" name="nama_pic" value="Kosong">
					<input type="hidden" name="jabatan_pic" value="Kosong">
					<input type="hidden" name="kontak" value="Kosong">
					<input type="hidden" name="status" value="Kosong">
					<input type="hidden" name="verifikasi" value="Kosong">
					<input type="hidden" name="catatan" value="Kosong">

					<button type="submit" class="btn btn-sm btn-outline-primary btn-icon-split">
						<i class="bi bi-cloud-upload"></i> <span class="text">Lanjutkan</span>
					</button>
					
				</form>
			</div>
		</div>
	</div>
</div>



@elseif($jumlahcallcenter >=1 && $statusscallcenter->status == 'Sedang Proses')
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
								<th>Nama Layanan</th>
								<th>Nomor Layanan</th>
			                    <th>Status</th>
			                    <th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($call_center as $c)
							<tr>
								<td>{{ $c->nama_layanan }}</td>
			                    <td>{{ $c->nomor_layanan }}</td>
			                    <td>{{ $c->status }}</td>
			                    <td>
			                    	<div class="text-center">
			                            <a class="btn btn-outline-dark text-center mb-1" style="white-space: nowrap;" href="#" data-bs-toggle="modal" data-bs-target="#view{{ $c->id }}"><i class="bi bi-eye"></i> Lihat</a>
			                            <a class="btn btn-outline-primary text-center mb-1" style="white-space: nowrap;" href="{{ route('call_center.2024.edit', $c->id) }}"><i class="bi bi-pencil"></i> Edit</a>
			                        </div>
			                    </td>
							</tr>

							<!-- modal detail data -->
							<div class="modal fade" id="view{{ $c->id }}" tabindex="-1" arial-labelly="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Detail Layanan</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form>
												<div class="form-group">
													<label>Nama Layanan</label>
													<input type="text" name="nama_layanan" class="form-control" value="{{ $c->nama_layanan }}" readonly="readonly">
												</div><br>
												<div class="form-group">
													<label>Nomor Layanan</label>
													<input type="text" name="nomor_layanan" class="form-control" value="{{ $c->nomor_layanan }}" readonly="readonly">
												</div><br>
												<div class="form-group">
													<label>Platform</label><br />
													<input type="checkbox" name="whatsapp" value="Whatsapp" {{ $c->whatsapp=="Whatsapp"? 'checked':'' }} disabled> Whatsapp <br/>
													<input type="checkbox" name="telepon" value="Telepon" {{ $c->telepon=="Telepon"? 'checked':'' }} disabled> Telepon <br/>
												</div><br>
												<div class="form-group">
													<label>Platform Lainnya</label>
													<input type="text" name="platform2" class="form-control" readonly="readonly" value="{{ $c->platform2 }}">
												</div><br>
												<div class="form-group">
													<label>Deskripsi Layanan</label>
													<textarea name="deskripsi_layanan" class="form-control" readonly="readonly">{{ $c->deskripsi_layanan }}</textarea>
												</div><br>
												<div class="form-group">
													<label>Sektor Layanan</label>
													<input type="text" name="sektorlayanan" class="form-control" readonly="readonly" value="{{ $c->sektorlayanan }}">
												</div><br>
												<div class="form-group">
													<label>Sektor Lainnya</label>
													<input type="text" name="sektorlainnya" class="form-control" readonly="readonly" value="{{ $c->sektorlainnya }}">
												</div><br>
												<div class="form-group">
													<label>Nama PIC</label>
													<input type="text" name="nama_pic" class="form-control" readonly="readonly" value="{{ $c->nama_pic }}">
												</div><br>
												<div class="form-group">
													<label>Jabatan PIC</label>
													<input type="text" name="jabatan_pic" class="form-control" readonly="readonly" value="{{ $c->jabatan_pic }}">
												</div><br>
												<div class="form-group">
													<label>Kontak</label>
													<input type="text" name="kontak" class="form-control" readonly="readonly" value="{{ $c->kontak }}">
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
			<a class="btn btn-outline-success" href="{{ route('call_center.2024.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
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
						<form method="post" action="{{ route('call_center.2024.updatestatuscallcenter') }}" enctype="multipart/form-data">
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

@elseif($jumlahcallcenter >=1 && $statusscallcenter->status == 'Final')
<div class="alert alert-info alert-info alert-dismissible fade show" role="alert">
	Sudah Final
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<!--<div class="mb-2" align="right">
	<a class="btn btn-outline-danger" style="margin-left: 762px;" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
		<i class="bi bi-printer"></i> cetak
	</a>
	<ul class="dropdown-menu">
		<li><a class="dropdown-item" href="{{ route('call_center.2024.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> PDF</a></li>
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
	<a class="btn btn-danger mb-2" href="{{ route('call_center.2024.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
	<a class="btn btn-success mb-2" href="{{ route('call_center.2024.cetaklaporanexcel') }}" target="_blank"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</a>
</div>

<!-- @if($call_center->count() == $call_center->where('verifikasi', 'Disetujui')->count())
<div class="text-end">
	<a class="btn btn-danger mb-2" href="{{ route('call_center.2024.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> Cetak</a>
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
							@foreach($call_center as $c)
							<tr>
								<td>{{ $c->nama_layanan }}</td>
			                    <td>{{ $c->nomor_layanan }}</td>
								<td>{{ $c->status }}</td>
								<td>
									@if($c->verifikasi == 'Ditolak')
									<p class="badge text-danger">
										<i class="bi bi-x-circle"></i> {{ $c->verifikasi }}
									</p>
									@elseif($c->verifikasi == 'Disetujui')
									<p class="badge text-success">
										<i class="bi bi-check-circle"></i> {{ $c->verifikasi }}
									</p>
									@elseif($c->verifikasi == 'Kosong')
									<p class="badge text-primary">
										<i class="bi bi-info-circle"></i> Belum Diverifikasi
									</p>
									@else
									<p class="badge text-primary">
										<i class="bi bi-info-circle"></i> Belum Diverifikasi
									</p>
									@endif
								</td>
								<td>
									<div class="text-center">
										<a class="btn btn-outline-dark mb-1" style="white-space: nowrap;" href="#" data-bs-toggle="modal" data-bs-target="#view2{{ $c->id }}"><i class="bi bi-eye"></i> Lihat</a>
									</div>
								</td>
							</tr>

							<!-- modal detail data -->
							<div class="modal fade" id="view2{{ $c->id }}" tabindex="-1" arial-labelly="exampleModalLabel" aria-hidden="true">
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
													@if($c->catatan == 'Kosong' || $c->catatan == '')
													<p>Tidak ada catatan</p>
													@else
													<p>{{$c->catatan }}</p>
													@endif
												</div>
												<div class="form-group">
													<label>Nama Layanan</label>
													<input type="text" name="nama_layanan" class="form-control" value="{{ $c->nama_layanan }}" readonly="readonly">
												</div><br>
												<div class="form-group">
													<label>Nomor Layanan</label>
													<input type="text" name="nomor_layanan" class="form-control" value="{{ $c->nomor_layanan }}" readonly="readonly">
												</div><br>
												<div class="form-group">
													<label>Platform</label><br />
													<input type="checkbox" name="whatsapp" value="Whatsapp" {{ $c->whatsapp=="Whatsapp"? 'checked':'' }} disabled> Whatsapp <br/>
													<input type="checkbox" name="telepon" value="Telepon" {{ $c->telepon=="Telepon"? 'checked':'' }} disabled> Telepon <br/>
												</div><br>
												<div class="form-group">
													<label>Platform Lainnya</label>
													<input type="text" name="platform2" class="form-control" readonly="readonly" value="{{ $c->platform2 }}">
												</div><br>
												<div class="form-group">
													<label>Deskripsi Layanan</label>
													<textarea name="deskripsi_layanan" class="form-control" readonly="readonly">{{ $c->deskripsi_layanan }}</textarea>
												</div><br>
												<div class="form-group">
													<label>Sektor Layanan</label>
													<input type="text" name="sektorlayanan" class="form-control" readonly="readonly" value="{{ $c->sektorlayanan }}">
												</div><br>
												<div class="form-group">
													<label>Sektor Lainnya</label>
													<input type="text" name="sektorlainnya" class="form-control" readonly="readonly" value="{{ $c->sektorlainnya }}">
												</div><br>
												<div class="form-group">
													<label>Nama PIC</label>
													<input type="text" name="nama_pic" class="form-control" readonly="readonly" value="{{ $c->nama_pic }}">
												</div><br>
												<div class="form-group">
													<label>Jabatan PIC</label>
													<input type="text" name="jabatan_pic" class="form-control" readonly="readonly" value="{{ $c->jabatan_pic }}">
												</div><br>
												<div class="form-group">
													<label>Kontak</label>
													<input type="text" name="kontak" class="form-control" readonly="readonly" value="{{ $c->kontak }}">
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
				<form method="post" action="{{ route('aplikasi.layanan_publik.2024.updatestatus') }}" enctype="multipart/form-data">
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
	<button class="second btn btn-succes mb-2"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</button>
</div>
@else
<div class="text-end">
	<a class="btn btn-danger mb-2" href="{{ route('call_center.2024.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
	<a class="btn btn-success mb-2" href="{{ route('call_center.2024.cetaklaporanexcel') }}" target="_blank"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</a>
</div>

<!-- @if($call_center->count() == $call_center->where('verifikasi', 'Disetujui')->count())
<div class="text-end">
	<a class="btn btn-danger mb-2" href="{{ route('call_center.2024.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> Cetak</a>
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



