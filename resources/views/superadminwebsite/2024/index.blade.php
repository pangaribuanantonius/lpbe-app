@extends('sidebar.sidebarpendataanaplikasiadmin')
@section('monevaplikasiadmin')

<div class="pagetitle">
	<h1><i class="bi bi-cpu"></i> Monev Aplikasi</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Website</li>
			<li class="active ms-1">/</li>
			<li class="active ms-1">{{ $nama_instansi }}</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

@if($jumlahwebsite == 0)
<div class="alert alert-info" role="alert">
	Tidak Ada Data
</div>
@elseif($jumlahwebsite >=1 && $statusswebsite->status == 'Sedang Proses')
<div class="alert alert-info alert-dismissible fade show" role="alert">
	Tidak Ada Data
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<section class="section dashboard d-none">
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
			                            <a href="#" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#view{{ $w->id }}"><i class="bi bi-eye"></i> Lihat</a>
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
													<textarea name="deskripsi_website" class="form-control" readonly="readonly">{{ $w->deskripsi_website }}</textarea>
												</div><br>
												<div class="form-group">
													<label>URL</label>
													<input type="text" name="url" class="form-control" readonly="readonly" value="{{ $w->url }}">
												</div><br>
                                                <div class="form-group">
													<label>Tempat</label>
													<input type="text" name="tempat" class="form-control" readonly="readonly" value="{{ $w->tempat }}">
												</div><br>
                                                <div class="form-group">
													<label>Apakah website ini menyimpan data rahasia ?</label><br>
													{{ $w->rahasia }}
												</div><br>
                                                <div class="form-group">
													<label>Apakah website ini menyediakan fitur ramah anak ?</label><br>
                                                     {{ $w->ramah_anak }}
												</div><br>
												<div class="form-group">
													<label>Nama PIC</label>
													<input type="text" name="nama_pic" class="form-control" readonly="readonly" value="{{ $w->nama_pic }}">
												</div><br>
												<div class="form-group">
													<label>Jabatan PIC</label>
													<input type="text" name="jabatan_pic" class="form-control" readonly="readonly" value="{{ $w->jabatan_pic }}">
												</div><br>
												<div class="form-group">
													<label>Kontak</label>
													<input type="text" name="kontak" class="form-control" readonly="readonly" value="{{ $w->kontak }}">
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
					<a class="btn btn-outline-primary" href="#" data-bs-toggle="modal" data-bs-target="#modalStatus1">
				<i class="bi bi-pencil-square"></i> Ubah Status
			</a>
				</div>
			</div>
		</div>

<!-- Modal ubah status -->
		<div class="modal fade" id="modalStatus1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="post" action="{{ route('superadminwebsite.2024.updatestatus') }}" enctype="multipart/form-data">
						@csrf
						@method('POST')
						<input type="hidden" name="instansi_id" value="{{ $w->instansi_id }}">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Status</label>
								<select name="status" class="form-control">
									<option value="{{ $w->status }}">{{ $w->status }}</option>
									<option value="Sedang Proses">Sedang Proses</option>
									<option value="Final">Final</option>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">
								<i class="bi bi-x-circle"></i> Batal
							</button>
							<button type="submit" class="btn btn-sm btn-outline-primary btn-icon-split">
								<span class="text">
									<i class="bi bi-cloud-upload"></i> Lanjutkan
								</span>
							</button>
						</div>
					</form>
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
								<th>Verifikasi</th>
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
										<i class="bi bi-info-circle"></i> Belum Diverifikasi
									</p> 
									@else
									<p class="badge text-danger">
										<i class="bi bi-info-circle"></i> Belum Diverifikasi
									</p> 
									@endif
								</td>
								<td>
									<div class="text-center">
										<a href="#" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#view2{{ $w->id }}"><i class="bi bi-eye"></i> Lihat</a>
										<a class="btn btn-outline-danger" style="white-space: nowrap;" href="#" data-bs-toggle="modal" data-bs-target="#verifikasi{{ $w->id }}"><i class="bi bi-pen"></i> Verifikasi</a>
									</div>
								</td>
							</tr>

							<!--Modal verifikasi -->
							<div class="modal fade" id="verifikasi{{ $w->id }}" tabindex="-1" aria-labelly="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<form method="post" action="{{ route('superadminwebsite.2024.verifadmin', ['website' => $w->id]) }}" enctype="multipart/form-data">
											@csrf
											@method('PATCH')
											<input type="hidden" name="id" value="{{ $w->id }}">
											<input type="hidden" name="instansi_id" value="{{ $instansi_id }}">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Verifikasi</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
											</div>
											<div class="modal-body">
												<div class="form-group mb-3">
													<label>Verifikasi</label>
													<select name="verifikasi" class="form-control" required>
														<option value="">Pilih</option>
														<option value="Disetujui">Disetujui</option>
														<option value="Ditinjau">Ditinjau</option>
														<option value="Ditolak">Ditolak</option>
														<option value="Kosong">Belum Diverifikasi</option>
													</select>
												</div>
												<div class="form-group mb-3">
													<label>Catatan</label>
													<textarea name="catatan" class="form-control"></textarea>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">
													<i class="bi bi-x-circle"></i> Batal
												</button>
												<button type="submit" class="btn btn-sm btn-outline-primary btn-icon-split">
													<span class="text">
														<i class="bi bi-check-circle"></i> Lanjutkan
													</span>
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!--End Modal verifikasi -->

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
													<label>Nama Website</label>
													<input type="text" name="nama_website" class="form-control" value="{{ $w->nama_website }}" readonly="readonly">
												</div><br>
												<div class="form-group">
													<label>Deskripsi Website</label>
													<textarea name="deskripsi_website" class="form-control" readonly="readonly">{{ $w->deskripsi_website }}</textarea>
												</div><br>
												<div class="form-group">
													<label>URL</label>
													<input type="text" name="url" class="form-control" readonly="readonly" value="{{ $w->url }}">
												</div><br>
                                                <div class="form-group">
													<label>Tempat</label>
													<input type="text" name="tempat" class="form-control" readonly="readonly" value="{{ $w->tempat }}">
												</div><br>
                                                <div class="form-group">
													<label>Apakah website ini menyimpan data rahasia ?</label><br>
													{{ $w->rahasia }}
												</div><br>
                                                <div class="form-group">
													<label>Apakah website ini menyediakan fitur ramah anak ?</label><br>
                                                     {{ $w->ramah_anak }}
												</div><br>
												<div class="form-group">
													<label>Nama PIC</label>
													<input type="text" name="nama_pic" class="form-control" readonly="readonly" value="{{ $w->nama_pic }}">
												</div><br>
												<div class="form-group">
													<label>Jabatan PIC</label>
													<input type="text" name="jabatan_pic" class="form-control" readonly="readonly" value="{{ $w->jabatan_pic }}">
												</div><br>
												<div class="form-group">
													<label>Kontak</label>
													<input type="text" name="kontak" class="form-control" readonly="readonly" value="{{ $w->kontak }}">
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
             <a class="btn btn-outline-primary" href="#" data-bs-toggle="modal" data-bs-target="#modalStatus2">
				<i class="bi bi-pencil-square"></i> Ubah Status
			</a>
        </div>
    </div>
</div>

<!-- Modal ubah status -->
		<div class="modal fade" id="modalStatus2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="post" action="{{ route('superadminwebsite.2024.updatestatus') }}" enctype="multipart/form-data">
						@csrf
						@method('POST')
						<input type="hidden" name="instansi_id" value="{{ $w->instansi_id }}">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Status</label>
								<select name="status" class="form-control">
									<option value="{{ $w->status }}">{{ $w->status }}</option>
									<option value="Sedang Proses">Sedang Proses</option>
									<option value="Final">Final</option>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">
								<i class="bi bi-x-circle"></i> Batal
							</button>
							<button type="submit" class="btn btn-sm btn-outline-primary btn-icon-split">
								<span class="text">
									<i class="bi bi-cloud-upload"></i> Lanjutkan
								</span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>

</div>
</section>
@else
<div class="alert alert-info" role="alert">
	Finalisasi Nihil
</div>
@endif

@endsection