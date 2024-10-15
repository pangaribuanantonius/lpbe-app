@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')




<div class="pagetitle">
	<h1><i class="bi bi-cpu"></i> Monev Aplikasi</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Aplikasi Pelayanan Publik</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

@if($jumlahaplikasipublik == 0)
<div class="alert alert-info" role="alert">
	Tidak Ada Data
</div>
<a class="btn btn-outline-success" href="{{ route('aplikasi.layanan_publik.2024.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
<a class="btn btn-outline-danger" href="#" data-bs-toggle="modal" data-bs-target="#finalisasinihil"><i class="bi bi-check2-circle"></i> Finalisasi</a>

<!-- Modal -->
<div class="modal fade" id="finalisasinihil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<form method="post" action="{{ route('aplikasi.layanan_publik.2024.finalisasinihil') }}" enctype="multipart/form-data">
					@csrf
					@method('POST')
					<input type="hidden" name="tahun" value="2024">
					<input type="hidden" name="jenis_aplikasi" value="Layanan Publik">
					<input type="hidden" name="instansi_id" class="form-control" value=" {{ \App\Models\User::where('username', session('username'))->first()->instansi_id }}" readonly>
					<input type="hidden" name="nama_aplikasi" value="Kosong">
					<input type="hidden" name="kepemilikan" value="Kosong">
					<input type="hidden" name="tahun_digunakan" value="Kosong">
					<input type="hidden" name="dasar_hukum" value="Kosong">
					<input type="hidden" name="tahun_pembuatan" value="Kosong">
					<input type="hidden" name="launching" value="Kosong">
					<input type="hidden" name="kepemilikan" value="Kosong">
					<input type="hidden" name="desktop" value="Kosong">
					<input type="hidden" name="web" value="Kosong">
					<input type="hidden" name="android" value="Kosong">
					<input type="hidden" name="ios" value="Kosong">
					<input type="hidden" name="platform2" value="Kosong">
					<input type="hidden" name="url" value="Kosong">
					<input type="hidden" name="tempataplikasi" value="Kosong">
					<input type="hidden" name="sektorpelayananpublik" value="Kosong">
					<input type="hidden" name="sektorpelayananpublik2" value="Kosong">
					<input type="hidden" name="deskripsi" value="Kosong">
					<input type="hidden" name="daftarlayanan" value="Kosong">
					<input type="hidden" name="daftarproduklayanan" value="Kosong">
					<input type="hidden" name="rahasia" value="Kosong">
					<input type="hidden" name="pengguna" value="Kosong">
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
			                            <a class="btn btn-outline-dark text-center mb-1" style="white-space: nowrap;" href="#" data-bs-toggle="modal" data-bs-target="#view{{ $aps->id }}"><i class="bi bi-eye"></i> Lihat</a>
			                            <a class="btn btn-outline-primary text-center mb-1" style="white-space: nowrap;" href="{{ route('aplikasi.layanan_publik.2024.edit', $aps->id) }}"><i class="bi bi-pencil"></i> Edit</a>
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
						<label>Apakah layanan ini menyimpan data pribadi/rahasia</label><br>
						{{ $aps->rahasia }}
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
				</div>
			</div>
			<a class="btn btn-outline-success" href="{{ route('aplikasi.layanan_publik.2024.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
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
@elseif($jumlahaplikasipublik >=1 && $statuss->status == 'Final')
<div class="alert alert-info alert-info alert-dismissible fade show" role="alert">
	Sudah Final
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<!--<div class="mb-2" align="right">
	<a class="btn btn-outline-danger" style="margin-left: 820px;" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
		<i class="bi bi-printer"></i> Cetak
	</a>
	<ul class="dropdown-menu">
		<li><a class="dropdown-item" href="{{ route('aplikasi.layanan_publik.2024.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> PDF</a></li>
		<li><a class="dropdown-item" href="#" target="_blank"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</a></li>
	</ul>
</div>-->



@if($penandatanganan == 0)
<div class="text-end">
	<button class="first btn btn-danger mb-2"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</button>
	<button class="second btn btn-success mb-2"><i class="bi bi-file-earmark-spreadsheet"></i> PDF</button>
</div>
@else
<div class="text-end">
	<a class="btn btn-danger mb-2" href="{{ route('aplikasi.layanan_publik.2024.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
	<a class="btn btn-success mb-2" href="{{ route('aplikasi.layanan_publik.2024.cetaklaporanexcel') }}" target="_blank"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</a>
</div>

<!-- @if($aplikasi->count() == $aplikasi->where('verifikasi', 'Disetujui')->count())
<div class="text-end">
	<a class="btn btn-danger mb-2" href="{{ route('aplikasi.layanan_publik.2024.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
</div>
@else

@endif -->

@endif

<section class="section dashboard">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body mt-3">
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
									@elseif($aps->verifikasi == 'Ditinjau')
									<p class="badge text-primary">
										<i class="bi bi-info-circle"></i> {{ $aps->verifikasi }}
									</p>
									@elseif($aps->verifikasi == 'Disetujui')
									<p class="badge text-success">
										<i class="bi bi-check-circle"></i> {{ $aps->verifikasi }}
									</p>
									@elseif($aps->verifikasi == 'Kosong')
									<p class="badge text-danger">
										<i class="bi bi-ban"></i> Belum Diverifikasi
									</p>
									@else
									<p class="badge text-danger">
										<i class="bi bi-ban"></i> Belum Diverifikasi
									</p>
									@endif
								</td>
								<td class="text-center">
									<a class="btn btn-outline-dark mb-1" style="white-space: nowrap;" href="#" data-bs-toggle="modal" data-bs-target="#view2{{ $aps->id }}"><i class="bi bi-eye"></i> Lihat</a>
								</td>
							</tr>

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
												<div class="form-group alert alert-info">
													<label>Catatan</label>
													@if($aps->catatan == 'Kosong' || $aps->catatan == '')
													<p>Tidak ada catatan</p>
													@else
													<p>{{$aps->catatan }}</p>
													@endif
												</div>
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
													<label>Apakah layanan ini menyimpan data pribadi/rahasia</label><br>
													{{ $aps->rahasia }}
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
	<div class="text-end">
		<button class="first btn btn-danger mb-2"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</button>
		<button class="second btn btn-success mb-2"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</button>
	</div>
</div>
@else
<div class="text-end">
	<a class="btn btn-danger mb-2" href="{{ route('aplikasi.layanan_publik.2024.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
	<a class="btn btn-success mb-2" href="{{ route('aplikasi.layanan_publik.2024.cetaklaporanexcel') }}" target="_blank"><i class="bi bi-file-earmark-spreadsheet"></i> Excel</a>
</div>

<!-- @if($aplikasi->count() == $aplikasi->where('verifikasi', 'Disetujui')->count())
<div class="text-end">
	<a class="btn btn-danger mb-2" href="{{ route('aplikasi.layanan_publik.2024.cetaklaporanpdf') }}" target="_blank"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
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



