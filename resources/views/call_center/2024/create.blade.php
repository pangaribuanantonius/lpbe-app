@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<div class="pagetitle">
	<h1><i class="bi bi-cpu"></i> Monev Aplikasi</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Layanan Call center</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form method="post" action="{{ route('call_center.2024.store')}}" enctype="multipart/form-data">
					@csrf
                    @method('POST')
                    <input type="hidden" name="tahun" value="2024">
                    <input type="hidden" name="instansi_id" class="form-control" value=" {{ \App\Models\User::where('username', session('username'))->first()->instansi_id }}" readonly>
						<div class="form-group mt-3">
							<label>Nama Layanan</label>
							<div>
								<input type="text" name="nama_layanan" class="form-control" value="{{ old('nama_layanan') }}" required>
								<sup><em>Contoh: Layanan 112</em></sup>
							</div>
						</div>
						<div class="form-group mt-3">
							<label>Nomor Layanan</label>
							<div>
								<input type="number" name="nomor_layanan" class="form-control" value="{{ old('nomor_layanan') }}" required>
								<sup><em>Contoh: Layanan 112</em></sup>
							</div>
						</div>
						<div class="form-group mt-3">
							<label>Platform</label>
							<div>
								<input type="checkbox" name="whatsapp" id="whatsapp" value="Whatsapp"> Whatsapp <br/>
	                            <input type="checkbox" name="telepon" id="telepon" value="Telepon"> Telepon <br/>
	                            <input type="checkbox" name="lainnya" value="Lainnya" onClick="lainNya()"> Lainnya <br/>
							</div>
						</div>
						<div id="target">
							<div class="form-group mt-3">
								<label>Platform Lainnya (Opsional)</label>
								<div>
									<input type="text" name="platform2" class="form-control" value="{{ old('platform2') }}" placeholder="Masukkan Plarform lainnya jika ada">
								</div>
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

	                    <div class="form-group mt-3">
	                    	<label>Deskripsi Layanan</label>
	                    	<div>
	                    		 <textarea type="text" name="deskripsi_layanan" class="form-control" value="{{ old('deskripsi_layanan') }}" required></textarea>
	                    	</div>
	                    </div>

	                    <div class="form-group mt-3">
	                    	<label>Sektor Layanan</label>
	                    	<div>
	                    		<select name="sektorlayanan" id="sektorlayanan" class="form-control" required>
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

	                    <div id="nama" style="display:none;">
	                    	<div class="form-group mt-3">
	                    		<label>Sektor Lainnya</label>
	                    		<div>
	                    			<input type="text" name="sektorlainnya" class="form-control" placeholder="Masukkan Disini">
	                    		</div>
	                    	</div>
	                    </div>

	                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
                        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
                        <script>        
                        	$('#sektorlayanan').on('change',function(){
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