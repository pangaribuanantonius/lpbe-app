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

<section class="section dashboard">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form method="post" action="#" enctype="multipart/form-data">
					@csrf
                    @method('PATCH')
                    <input type="hidden" name="id">
                    <input type="hidden" name="tahun" value="2021">
                    <input type="hidden" name="instansi_id" class="form-control" value=" {{ \App\Models\User::where('username', session('username'))->first()->instansi_id }}" readonly>
						<div class="form-group mt-3">
							<label>Nama Aplikasi</label>
							<div>
								<input type="text" name="nama_aplikasi" class="form-control" value="{{ $aplikasi->nama_aplikasi }}" required>
								<sup><em>Contoh: Delipedia</em></sup>
							</div>
						</div>
						<div class="form-group mt-3">
							<label>Kepemilikan</label>
							<div>
								<select name="kepemilikan" id="kepemilikan" class="form-control" value="{{ $aplikasi->Kepemilikan }}" required>
	                                <option value="{{ $aplikasi->kepemilikan }}">{{ $aplikasi->kepemilikan }}</option>
	                                <option value="Disediakan Pusat">Disediakan Pusat</option>
	                                <option value="Dikembangkan Sendiri">Dikembangkan Sendiri</option>
	                            </select>
							</div>
						</div>
						<div id="masukann" style="display:none;">
							<div class="form-group mt-3">
								<label for="kepemilikan">Tahun Digunakan</label>
								<div>
									<input type="number" name="tahun_digunakan" class="form-control" value="{{ $aplikasi->tahun_digunakan }}">
								</div>
							</div>
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
                        	<div class="form-group mt-3">
                        		<label for="kepemilikan">Dasar hukum</label>
                        		<div>
                        			<textarea type="text" name="dasarhukum" class="form-control">{{ $aplikasi->dasarhukum }}</textarea>
                                	<sup><em>Contoh: Peraturan Bupati Deli Serdang No. 107 Tahun 2021 Tentang Sistem Pemerintahan Berbasis Elektronik</em></sup>
                        		</div>
                        	</div>
                        	<div class="row mt-3">
                        		<div class="col-lg-6">
                        			<div class="form-group">
                        				<label for="kepemilikan">Tahun Pembuatan</label>
                        				<div>
                        					<input type="number" name="tahun_pembuatan" class="form-control" value="{{ $aplikasi->tahun_pembuatan }}">
                        				</div>
                        			</div>
                        		</div>
                        		<div class="col-lg-6">
                        			<div class="form-group">
                        				<label for="kepemilikan">Tanggal Launching</label>
                        				<div>
                        					<input type="date" name="launching" class="form-control" value="{{ $aplikasi->launching }}">
                        				</div>
                        			</div>
                        		</div>
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

                        <div class="form-group mt-3">
							<label>Platform</label>
							<div>
								<input type="checkbox" name="desktop" value="Desktop" {{ $aplikasi->desktop=="Desktop"? 'checked':'' }}> Desktop <br/>
	                            <input type="checkbox" name="web" value="Web" {{ $aplikasi->web=="Web"? 'checked':'' }}> Web <br/>
	                            <input type="checkbox" name="android" value="Android" {{ $aplikasi->android=="Android"? 'checked':'' }}> Android <br/>
	                            <input type="checkbox" name="ios" value="iOs" {{ $aplikasi->ios=="iOs"? 'checked':'' }}> iOs <br>
	                            <input type="checkbox" name="lainnya" value="Lainnya" onClick="lainNya()"> Lainnya<br/><br>
							</div>
						</div>

						<div id="target" class="form-group mt-3">
							<div class="form-group">
								<label>Platform Lainnya (Opsional)</label>
	                        	<input type="text" name="platform2" class="form-control" value="{{ $aplikasi->platform2 }}" placeholder="Sebutkan jika ada">
							</div>
	                    </div>

	                    <script>
	                        document.getElementById("target").style.display="none";
	                        function lainNya() {
	                            var x = document.getElementById("target");
	                            if (x.style.display === "none") {
	                                x.style.display = "";
	                            } else {
	                                x.style.display = "none";
	                            }
	                        }
	                    </script>

	                    <div class="form-group">
	                        <label>Alamat URL</label>
	                        <div>
	                        	<input type="url" name="url" class="form-control" value="{{ $aplikasi->url }}" required>
	                        	<sup><em>Contoh: <span class="fw-bold text-danger">https://</span>deliserdangkab.go.id</em></sup>
	                        </div>
	                    </div>
	                    <div class="form-group mt-3">
	                        <label>Tempat Aplikasi</label>
	                        <div>
	                        	<select name="tempataplikasi" class="form-control" value="{{ old('tempataplikasi') }}" required>
		                           <option value="{{ $aplikasi->tempataplikasi }}">{{ $aplikasi->tempataplikasi }}</option>
								   <option value="Unit Kerja Terkait">Unit Kerja Terkait</option>
		                            <option value="Dinas Komunikasi, Informatika, Statistik dan Persandian">Dinas Komunikasi, Informatika, Statistik dan Persandian</option>
		                            <option value="Pemerintah Pusat/Kementrian">Pemerintah Pusat/Kementrian</option>
		                        </select>
	                        </div>
	                    </div>
	                    <div class="form-group mt-3">
                            <label>Sektor Pelayanan Publik</label>
                            <div>
                            	<select name="sektorpelayananpublik" id="sektorpelayananpublik" class="form-control" required>
	                                <option value="{{ $aplikasi->sektorpelayananpublik }}">{{ $aplikasi->sektorpelayananpublik }}</option>
	                                <option value="Pendidikan dan Pengajaran">1. Pendidikan dan Pengajaran</option>
	                                <option value="Pekerjaan dan Usaha">2. Pekerjaan dan Usaha</option>
	                                <option value="Tempat Tinggal">3. Tempat Tinggal</option>
	                                <option value="Komunikasi dan Informasi">4. Komunikasi dan Informasi</option>
	                                <option value="Lingkungan Hidup">5. Lingkungan Hidup</option>
	                                <option value="Kesehatan">6. Kesehatan</option>
	                                <option value="Jaminan Sosial">7. Jaminan Sosial</option>
	                                <option value="Energi">8. Energi</option>
	                                <option value="Perbankan">9. Perbankan</option>
	                                <option value="Perhubungan">10. Perhubungan</option>
	                                <option value="Sumber Daya Alam">11. Sumber Daya Alam</option>
	                                <option value="Pariwisata">12. Pariwisata</option>
	                                <option value="Sektor Lainnya">13. Sektor Lainnya</option>
	                            </select>
                            </div>
                        </div>
                        <div id="nama" class="form-group mt-3" style="display:none;">
                        	<div class="form-group">
                        		<label for="sektorpelayananpublik">Sektor Publik Lainnya</label>
                        		<div><input type="text" name="sektorpelayananpublik2" class="form-control" value="{{ $aplikasi->sektorpelayananpublik2 }}"></div>
                        	</div>
                        </div>

                        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
                        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
                        <script>        
	                            $('#sektorpelayananpublik').on('change',function(){
	                             var selection = $(this).val();
	                             switch(selection){
	                                case "Sektor Lainnya":
	                                $("#nama").show()
	                                break;
	                                default:
	                                $("#nama").hide()
	                            }
	                        });
	                    </script>

	                    <div class="form-group mt-3">
	                    	<label>Deskripsi Singkat</label>
	                    	<div>
	                    		<textarea name="deskripsi" class="form-control" style="height:100px;" required>{{ $aplikasi->deskripsi }}</textarea>
	                    	</div>
	                    </div>
	                    <div class="form-group mt-3">
	                    	<label>Fitur Layanan</label>
	                    	<div>
	                    		<textarea name="daftarlayanan" class="form-control" style="height:100px;" required>{{ $aplikasi->daftarlayanan }}</textarea>
	                    	</div>
	                    </div>
	                    <div class="form-group mt-3">
	                    	<label>Produk Layanan</label>
	                    	<div>
	                    		<textarea name="daftarproduklayanan" class="form-control" style="height:100px;" required>{{ $aplikasi->daftarproduklayanan }}</textarea>
	                    	</div>
	                    </div>
	                    <div class="form-group mt-3">
	                    	<label>Pengguna Layanan</label>
	                    	<div>
	                    		<input type="text" name="pengguna" class="form-control" value="{{ $aplikasi->pengguna }}" readonly>
	                    	</div>	                    	
	                    </div>
	                    <div class="row mt-3">
	                    	<div class="col-lg-4">
	                    		<div class="form-group">
	                    			<label>Nama PIC</label>
	                    			<div>
	                    				<input type="text" name="nama_pic" class="form-control" value="{{ $aplikasi->nama_pic }}" required><br />
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<div class="col-lg-4">
	                    		<div class="form-group">
	                    			<label>Jabatan</label>
	                    			<div>
	                    				<input type="text" name="jabatan_pic" class="form-control" value="{{ $aplikasi->jabatan_pic }}" required><br />
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<div class="col-lg-4">
	                    		<div class="form-group">
	                    			<label>No. Handphone</label>
	                    			<div>
	                    				<input type="number" name="kontak" class="form-control" value="{{ $aplikasi->kontak }}" required><br />
	                    			</div>
	                    		</div>
	                    	</div>
	                    </div>

	                    <button class="btn btn-outline-success btn-icon-split" id="submitButton">
	                    	<span class="icon">
	                    		<i class="bi bi-check2-circle"></i>
	                    	</span>
	                    	<span class="text">Simpan</span>
	                    </button>
	                    <a href="#" class="btn btn-outline-danger btn-icon-split"  data-bs-toggle="modal" data-bs-target="#Modal">
	                    	<span class="icon">
	                    		<i class="bi bi-trash"></i>
	                    	</span>
	                    	<span class="text">Hapus</span>
	                    </a>
					</form>
					<!-- Modal Hapus Data -->
					<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									Apakah anda yakin menghapus data ini ?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button> 
									<form method="post" action="{{ route('aplikasi.layanan_publik.2021.delete', $aplikasi->id) }}" enctype="multipart/form-data">
										@csrf
										@method('DELETE')
										<input type="hidden" name="id">
										<input type="hidden" name="tahun" value="{{ $aplikasi->tahun }}">
										<button type="submit" class="btn btn-sm btn-outline-primary btn-icon-split">
											<i class="bi bi-check2-circle"></i> <span class="text">Lanjutkan</span>
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- akhir modal hapus data -->
				</div>
			</div>
		</div>
	</div>
</section>

@endsection