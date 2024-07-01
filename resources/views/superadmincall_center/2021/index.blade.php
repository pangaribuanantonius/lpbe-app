@extends('sidebar.sidebarpendataanaplikasiadmin')
@section('monevaplikasiadmin')

<div class="pagetitle">
	<h1><i class="bi bi-cpu"></i> Monev Aplikasi</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Layanan Call Center</li>
			<li class="active ms-1">/</li>
			<li class="active ms-1">{{ $nama_instansi }}</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

@if($jumlahcallcenter == 0)
<div class="alert alert-info" role="alert">
	Tidak Ada Data
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
			                            <a href="#" data-bs-toggle="modal" data-bs-target="#view{{ $c->id }}"><i class="bi bi-eye"></i></a>
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
					<form method="post" action="{{ route('superadmincall_center.2021.updatestatus') }}" enctype="multipart/form-data">
						@csrf
						@method('POST')
						<input type="hidden" name="instansi_id" value="{{ $c->instansi_id }}">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Status</label>
								<select name="status" class="form-control">
									<option value="{{ $c->status }}">{{ $c->status }}</option>
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
@elseif($jumlahcallcenter >=1 && $statusscallcenter->status == 'Final')
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
										<a href="#" data-bs-toggle="modal" data-bs-target="#view2{{ $c->id }}"><i class="bi bi-eye"></i></a>
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
					<form method="post" action="{{ route('superadmincall_center.2021.updatestatus') }}" enctype="multipart/form-data">
						@csrf
						@method('POST')
						<input type="hidden" name="instansi_id" value="{{ $c->instansi_id }}">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Status</label>
								<select name="status" class="form-control">
									<option value="{{ $c->status }}">{{ $c->status }}</option>
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
<p>tidak ada</p>
@endif

@endsection