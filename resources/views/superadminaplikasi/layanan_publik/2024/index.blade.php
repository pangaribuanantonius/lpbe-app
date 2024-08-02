@extends('sidebar.sidebarpendataanaplikasiadmin')
@section('monevaplikasiadmin')

<div class="pagetitle">
	<h1><i class="bi bi-pen"></i> Pendataan Aplikasi</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Aplikasi Pelayanan Publik</li>
			<li class="active ms-1">/</li>
			<li class="active ms-1">{{ $nama_instansi }}</li>
		</ol>
	</nav>
</div>

@if($jumlahaplikasipublik == 0)
<div class="alert alert-info" role="alert">
	Tidak Ada Data
</div>
@elseif($jumlahaplikasipublik >=1 && $statuss->status == 'Sedang Proses')
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
								<th>Nama Aplikasi</th>
			                    
			                    
			                    <th>Tempat Aplikasi</th>
			                    <th>Status</th>
			                    <th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($aplikasi as $aps)
							<tr>
								<td>{{ $aps->nama_aplikasi }}</td>
			                    
			                    
			                    <td>{{ $aps->tempataplikasi }}</td>
			                    <td>{{ $aps->status }}</td>
			                    <td>
			                    	<div class="text-center">
			                            <a class="btn btn-outline-dark" style="white-space: nowrap;" href="#" data-bs-toggle="modal" data-bs-target="#view{{ $aps->id }}"><i class="bi bi-eye"></i> Lihat</a>

			                        </div>
			                    </td>
							</tr>


							<!-- modal detail data -->
<div class="modal fade" id="view{{ $aps->id }}" tabindex="-1" arial-labelly="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Layanan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label>Nama Aplikasi</label>
						<input type="text" name="nama_aplikasi" class="form-control" value="{{ $aps->nama_aplikasi }}" readonly="readonly">
					</div><br>
					<div class="form-group">
						<label>Kepemilikan</label>
						<select id="kepemilikan" name="kepemilikan" class=" form-control">
							<option value="{{ $aps->kepemilikan }}">{{ $aps->kepemilikan }}</option>
						</select>
					</div><br>
					<div id="masukann" style="display:none;">
						<label for="kepemilikan">Tahun Digunakan</label>
						<input type="text" name="tahun_digunakan" class="form-control" value="{{ $aps->tahun_digunakan }}">
						<br>
					</div>
					<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
					<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
					<script>
						$('#kepemilikan').on('change',function(){
							var selection = $(this).val();
							switch(selection){
							case "Disediakan Pusat":
								$("#masukann").show()
								break;
							default:
								$("#masukann").hide()
							}
						});
					</script>
					<div id="masukkan" style="display:none;">
						<div class="form-group">
							<label for="kepemilikan">Dasar hukum</label>
							<textarea type="text" name="dasarhukum" class="form-control">{{ $aps->dasarhukum }}</textarea>
							<sup><em>Cth: Peraturan Bupati Deli Serdang No. 107 Tahun 2024 Tentang Sistem Pemerintahan Berbasis Elektronik</em></sup>
							<br />
						</div>
						<div class="form-group">
							<label for="kepemilikan">Tanggal Launching</label>
							<input type="date" name="launching" class="form-control" value="{{ $aps->launching }}">
							<br>
						</div>
					</div>

					<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
					<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
					<script>
						$('#kepemilikan').on('change',function(){
							var selection = $(this).val();
							switch(selection){
							case "Dikembangkan Sendiri":
								$("#masukkan").show()
								break;
							default:
								$("#masukkan").hide()
							}
						});
					</script>
					<div class="form-group">
						<label>Platform</label><br />
						<input type="checkbox" name="desktop" value="Desktop" {{ $aps->desktop=="Desktop"? 'checked':'' }} disabled> Desktop <br/>
						<input type="checkbox" name="web" value="Web" {{ $aps->web=="Web"? 'checked':'' }} disabled> Web <br/>
						<input type="checkbox" name="android" value="Android" {{ $aps->android=="Android"? 'checked':'' }} disabled> Android <br/>
						<input type="checkbox" name="ios" value="iOs" {{ $aps->ios=="iOs"? 'checked':'' }} disabled> iOs
					</div><br>
					<div class="form-group">
						<label>Platform Lainnya</label>
						<input type="text" name="platform2" class="form-control" readonly="readonly" value="{{ $aps->platform2 }}">
					</div><br>
					<div class="form-group">
						<label>URL</label>
						<input type="text" name="url" class="form-control" readonly="readonly" value="{{ $aps->url }}">
					</div><br>
					<div class="form-group">
						<label>Tempat Aplikasi</label>
						<input type="text" name="tempataplikasi" class="form-control" readonly="readonly" value="{{ $aps->tempataplikasi }}">
					</div><br>
					<div class="form-group">
						<label>URL</label>
						<input type="text" name="url" class="form-control" readonly="readonly" value="{{ $aps->url }}">
					</div><br>
					<div class="form-group">
						<label>Sektor Pelayanan Publik</label>
						<input type="text" name="sektorpelayananpublik" class="form-control" readonly="readonly" value="{{ $aps->sektorpelayananpublik }}">
					</div><br>
					<div class="form-group">
						<label>Sektor Pelayanan Publik Lainnya</label>
						<input type="text" name="sektorpelayananpublik2" class="form-control" readonly="readonly" value="{{ $aps->sektorpelayananpublik2 }}">
					</div><br>
					<div class="form-group">
						<label>Deskripsi Singkat</label>
						<textarea name="deskripsi" class="form-control" readonly="readonly">{{ $aps->deskripsi }}</textarea>
					</div><br>
					<div class="form-group">
						<label>Fitur Layanan</label>
						<textarea name="daftarlayanan" class="form-control" readonly="readonly">{{ $aps->daftarlayanan }}</textarea>
					</div><br>
					<div class="form-group">
						<label>Produk Layanan</label>
						<textarea name="daftarproduklayanan" class="form-control" readonly="readonly">{{ $aps->daftarproduklayanan }}</textarea>
					</div><br>
					<div class="form-group">
						<label>Nama PIC</label>
						<input type="text" name="nama_pic" class="form-control" readonly="readonly" value="{{ $aps->nama_pic }}">
					</div><br>
					<div class="form-group">
						<label>Jabatan PIC</label>
						<input type="text" name="jabatan_pic" class="form-control" readonly="readonly" value="{{ $aps->jabatan_pic }}">
					</div><br>
					<div class="form-group">
						<label>Kontak</label>
						<input type="text" name="kontak" class="form-control" readonly="readonly" value="{{ $aps->kontak }}">
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

					<form method="post" action="{{ route('superadminaplikasi.layanan_publik.2024.updatestatus') }}" enctype="multipart/form-data">
						@csrf
						@method('POST')
						<input type="hidden" name="instansi_id" value="{{ $aps->instansi_id }}">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Status</label>
								<select name="status" class="form-control">
									<option value="{{ $aps->status }}">{{ $aps->status }}</option>
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
@elseif($jumlahaplikasipublik >=1 && $statuss->status == 'Final')
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
								<th>Nama Aplikasi</th>
								
								
								<th>Tempat Aplikasi</th>
								<th>Status</th>
								<th>Verifikasi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($aplikasi as $aps)
							<tr>
								<td>{{ $aps->nama_aplikasi }}</td>
								
								
								<td>{{ $aps->tempataplikasi }}</td>
								<td>{{ $aps->status }}</td>
								<td>
									@if($aps->verifikasi == 'Ditolak')
									<p class="badge text-danger">
										<i class="bi bi-x-circle"></i> {{ $aps->verifikasi }}
									</p>
									@elseif($aps->verifikasi == 'Disetujui')
									<p class="badge text-success">
										<i class="bi bi-check-circle"></i> {{ $aps->verifikasi }}
									</p> 
									@elseif($aps->verifikasi == 'Kosong')
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
										<a class="btn btn-outline-dark" style="white-space: nowrap;" href="#" data-bs-toggle="modal" data-bs-target="#view2{{ $aps->id }}"><i class="bi bi-eye"></i> Lihat</a>
										<a class="btn btn-outline-danger" style="white-space: nowrap;" href="#" data-bs-toggle="modal" data-bs-target="#verifikasi{{ $aps->id }}"><i class="bi bi-pen"></i> Verifikasi</a>
									</div>
								</td>
							</tr>

							<!--Modal verifikasi -->
							<div class="modal fade" id="verifikasi{{ $aps->id }}" tabindex="-1" aria-labelly="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<form method="post" action="{{ route('superadminaplikasi.layanan_publik.2024.verifadmin', ['aplikasi' => $aps->id]) }}" enctype="multipart/form-data">
											@csrf
											@method('PATCH')
											<input type="hidden" name="id" value="{{ $aps->id }}">
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
							<div class="modal fade" id="view2{{ $aps->id }}" tabindex="-1" arial-labelly="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Detail Layanan</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form>
												<div class="form-group">
													<label>Nama Aplikasi</label>
													<input type="text" name="nama_aplikasi" class="form-control" value="{{ $aps->nama_aplikasi }}" readonly="readonly">
												</div><br>
												<div class="form-group">
													<label>Kepemilikan</label>
													<select id="kepemilikan" name="kepemilikan" class=" form-control">
														<option value="{{ $aps->kepemilikan }}">{{ $aps->kepemilikan }}</option>
													</select>
												</div><br>
												<div id="masukann" style="display:none;">
													<label for="kepemilikan">Tahun Digunakan</label>
													<input type="text" name="tahun_digunakan" class="form-control" value="{{ $aps->tahun_digunakan }}">
													<br>
												</div>
												<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
												<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
												<script>
													$('#kepemilikan').on('change',function(){
														var selection = $(this).val();
														switch(selection){
														case "Disediakan Pusat":
															$("#masukann").show()
															break;
														default:
															$("#masukann").hide()
														}
													});
												</script>
												<div id="masukkan" style="display:none;">
													<div class="form-group">
														<label for="kepemilikan">Dasar hukum</label>
														<textarea type="text" name="dasarhukum" class="form-control">{{ $aps->dasarhukum }}</textarea>
														<sup><em>Cth: Peraturan Bupati Deli Serdang No. 107 Tahun 2024 Tentang Sistem Pemerintahan Berbasis Elektronik</em></sup>
														<br />
													</div>
													<div class="form-group">
														<label for="kepemilikan">Tanggal Launching</label>
														<input type="date" name="launching" class="form-control" value="{{ $aps->launching }}">
														<br>
													</div>
												</div>

												<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
												<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
												<script>
													$('#kepemilikan').on('change',function(){
														var selection = $(this).val();
														switch(selection){
														case "Dikembangkan Sendiri":
															$("#masukkan").show()
															break;
														default:
															$("#masukkan").hide()
														}
													});
												</script>
												<div class="form-group">
													<label>Platform</label><br />
													<input type="checkbox" name="desktop" value="Desktop" {{ $aps->desktop=="Desktop"? 'checked':'' }} disabled> Desktop <br/>
													<input type="checkbox" name="web" value="Web" {{ $aps->web=="Web"? 'checked':'' }} disabled> Web <br/>
													<input type="checkbox" name="android" value="Android" {{ $aps->android=="Android"? 'checked':'' }} disabled> Android <br/>
													<input type="checkbox" name="ios" value="iOs" {{ $aps->ios=="iOs"? 'checked':'' }} disabled> iOs
												</div><br>
												<div class="form-group">
													<label>Platform Lainnya</label>
													<input type="text" name="platform2" class="form-control" readonly="readonly" value="{{ $aps->platform2 }}">
												</div><br>
												<div class="form-group">
													<label>URL</label>
													<input type="text" name="url" class="form-control" readonly="readonly" value="{{ $aps->url }}">
												</div><br>
												<div class="form-group">
													<label>Tempat Aplikasi</label>
													<input type="text" name="tempataplikasi" class="form-control" readonly="readonly" value="{{ $aps->tempataplikasi }}">
												</div><br>
												<div class="form-group">
													<label>URL</label>
													<input type="text" name="url" class="form-control" readonly="readonly" value="{{ $aps->url }}">
												</div><br>
												<div class="form-group">
													<label>Sektor Pelayanan Publik</label>
													<input type="text" name="sektorpelayananpublik" class="form-control" readonly="readonly" value="{{ $aps->sektorpelayananpublik }}">
												</div><br>
												<div class="form-group">
													<label>Sektor Pelayanan Publik Lainnya</label>
													<input type="text" name="sektorpelayananpublik2" class="form-control" readonly="readonly" value="{{ $aps->sektorpelayananpublik2 }}">
												</div><br>
												<div class="form-group">
													<label>Deskripsi Singkat</label>
													<textarea name="deskripsi" class="form-control" readonly="readonly">{{ $aps->deskripsi }}</textarea>
												</div><br>
												<div class="form-group">
													<label>Fitur Layanan</label>
													<textarea name="daftarlayanan" class="form-control" readonly="readonly">{{ $aps->daftarlayanan }}</textarea>
												</div><br>
												<div class="form-group">
													<label>Produk Layanan</label>
													<textarea name="daftarproduklayanan" class="form-control" readonly="readonly">{{ $aps->daftarproduklayanan }}</textarea>
												</div><br>
												<div class="form-group">
													<label>Nama PIC</label>
													<input type="text" name="nama_pic" class="form-control" readonly="readonly" value="{{ $aps->nama_pic }}">
												</div><br>
												<div class="form-group">
													<label>Jabatan PIC</label>
													<input type="text" name="jabatan_pic" class="form-control" readonly="readonly" value="{{ $aps->jabatan_pic }}">
												</div><br>
												<div class="form-group">
													<label>Kontak</label>
													<input type="text" name="kontak" class="form-control" readonly="readonly" value="{{ $aps->kontak }}">
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
                <!-- <a class="btn btn-outline-success" href="{{ route('superadminaplikasi.layanan_publik.2024.laporanterkirimaplikasipublikexcel2024', ['instansi_id' => $instansi_id]) }}" target="_blank">
	                <i class="bi bi-file-earmark-spreadsheet"></i> Excel
	            </a> -->
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalStatus2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="{{ route('superadminaplikasi.layanan_publik.2024.updatestatus') }}" enctype="multipart/form-data">
				@csrf
				@method('POST')
				<input type="hidden" name="instansi_id" value="{{ $aps->instansi_id }}">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Status</label>
						<select name="status" class="form-control">
							<option value="{{ $aps->status }}">{{ $aps->status }}</option>
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