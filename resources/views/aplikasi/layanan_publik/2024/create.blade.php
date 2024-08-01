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
					<form method="post" action="{{ route('aplikasi.layanan_publik.2024.store')}}" enctype="multipart/form-data">
					@csrf
                    @method('POST')
                    <input type="hidden" name="jenis_aplikasi" value="Layanan Publik">
                    <input type="hidden" name="tahun" value="2024">
                    <input type="hidden" name="instansi_id" class="form-control" value=" {{ \App\Models\User::where('username', session('username'))->first()->instansi_id }}" readonly>
						<div class="form-group mt-3">
							<label>Nama Aplikasi</label>
							<div>
								<input type="text" name="nama_aplikasi" class="form-control" value="{{ old('nama_aplikasi') }}" required>
								<sup><em>Contoh: Delipedia</em></sup>
							</div>
						</div>
						<div class="form-group mt-3">
							<label>Kepemilikan</label>
							<div>
								<select name="kepemilikan" id="kepemilikan" class="form-control" value="{{ old('Kepemilikan') }}" required>
	                                <option value="">-- Pilih --</option>
	                                <option value="Disediakan Pusat">Disediakan Pusat</option>
	                                <option value="Dikembangkan Sendiri">Dikembangkan Sendiri</option>
	                            </select>
							</div>
						</div>
						<div id="masukann" style="display:none;">
							<div class="form-group mt-3">
								<label for="kepemilikan">Tahun Digunakan</label>
								<div>
									<input type="number" name="tahun_digunakan" class="form-control">
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
                        			<textarea type="text" name="dasarhukum" class="form-control" value="{{ old('dasarhukum') }}"></textarea>
                                	<sup><em>Contoh: Peraturan Bupati Deli Serdang No. 107 Tahun 2024 Tentang Sistem Pemerintahan Berbasis Elektronik</em></sup>
                        		</div>
                        	</div>
                        	<div class="row mt-3">
                        		<div class="col-lg-6">
                        			<div class="form-group">
                        				<label for="kepemilikan">Tahun Pembuatan</label>
                        				<div>
                        					<input type="number" name="tahun_pembuatan" class="form-control" value="{{ old('tahun_pembuatan') }}">
                        				</div>
                        			</div>
                        		</div>
                        		<div class="col-lg-6">
                        			<div class="form-group">
                        				<label for="kepemilikan">Tanggal Launching</label>
                        				<div>
                        					<input type="date" name="launching" class="form-control" value="{{ old('launching') }}">
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
								<input type="checkbox" name="desktop" id="desktop" value="Desktop"> Desktop <br/>
	                            <input type="checkbox" name="web" value="Web"> Web <br/>
	                            <input type="checkbox" name="android" value="Android"> Android <br/>
	                            <input type="checkbox" name="ios" value="iOs"> iOs <br/>
	                            <input type="checkbox" name="lainnya" value="Lainnya" onClick="lainNya()"> Lainnya <br/><br/>
							</div>
						</div>

						<div id="target" class="form-group mt-3">
							<div class="form-group">
								<label>Platform Lainnya (Opsional)</label>
	                        	<input type="text" name="platform2" class="form-control" value="{{ old('platform2') }}" placeholder="Sebutkan jika ada">
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
	                        	<input type="url" name="url" class="form-control" value="{{ old('url') }}" required>
	                        	<sup><em>Contoh: <span class="fw-bold text-danger">https://</span>deliserdangkab.go.id</em></sup>
	                        </div>
	                    </div>
	                    <div class="form-group mt-3">
	                        <label>Tempat Aplikasi</label>
	                        <div>
	                        	<select name="tempataplikasi" class="form-control" value="{{ old('tempataplikasi') }}" required>
		                            <option value="">-- Pilih --</option>
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
	                                <option value="">-- Pilih --</option>
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
                        		<div><input type="text" name="sektorpelayananpublik2" class="form-control" placeholder="Masukkan Disini"></div>
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
	                    		<textarea name="deskripsi" class="form-control" value="{{ old('deskripsi') }}" style="height:100px;" required></textarea>
	                    	</div>
	                    </div>
	                    <div class="form-group mt-3">
	                    	<label>Fitur Layanan</label>
	                    	<div>
	                    		<textarea name="daftarlayanan" class="form-control" value="{{ old('fiturutama') }}" style="height:100px;" required></textarea>
	                    	</div>
	                    </div>
	                    <div class="form-group mt-3">
	                    	<label>Produk Layanan</label>
	                    	<div>
	                    		<textarea name="daftarproduklayanan" class="form-control" value="{{ old('daftarproduklayanan') }}" style="height:100px;" required></textarea>
	                    	</div>
	                    </div>
	                    <div class="form-group mt-3">
	                    	<label>Pengguna Layanan</label>
	                    	<div>
	                    		<input type="text" name="pengguna" class="form-control" value="Masyarakat" readonly>
	                    	</div>	                    	
	                    </div>
	                    <div class="row mt-3">
	                    	<div class="col-lg-4">
	                    		<div class="form-group">
	                    			<label>Nama PIC</label>
	                    			<div>
	                    				<input type="text" name="nama_pic" class="form-control" value="{{ old('nama_pic') }}" required>
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<div class="col-lg-4">
	                    		<div class="form-group">
	                    			<label>Jabatan</label>
	                    			<div>
	                    				<input type="text" name="jabatan_pic" class="form-control" value="{{ old('jabatan_pic') }}" required><br />
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<div class="col-lg-4">
	                    		<div class="form-group">
	                    			<label>No. Handphone</label>
	                    			<div>
	                    				<input type="number" name="kontak" class="form-control" value="{{ old('kontak') }}" required>
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

					</form>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection