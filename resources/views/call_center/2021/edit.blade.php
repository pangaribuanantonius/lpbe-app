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
							<label>Nama Layanan</label>
							<div>
								<input type="text" name="nama_layanan" class="form-control" value="{{ $call_center->nama_layanan }}" required>
								<sup><em>Contoh: Layanan 112</em></sup>
							</div>
						</div>
						<div class="form-group mt-3">
							<label>Nomor Layanan</label>
							<div>
								<input type="number" name="nomor_layanan" class="form-control" value="{{ $call_center->nomor_layanan }}" required>
								<sup><em>Contoh: Layanan 112</em></sup>
							</div>
						</div>
						<div class="form-group mt-3">
							<label>Platform</label>
							<div>
								<input type="checkbox" name="whatsapp" value="Whatsapp" {{ $call_center->whatsapp=="Whatsapp"? 'checked':'' }}> Whatsapp <br/>
								<input type="checkbox" name="telepon" value="Telepon" {{ $call_center->telepon=="Telepon"? 'checked':'' }}> Telepon <br/>
	                            <input type="checkbox" name="lainnya" value="Lainnya" onClick="lainNya()"> Lainnya <br/>
							</div>
						</div>
						<div id="target">
							<div class="form-group mt-3">
								<label>Platform Lainnya (Opsional)</label>
								<div>
									<input type="text" name="platform2" class="form-control" value="{{ $call_center->platform2 }}" placeholder="Masukkan Plarform lainnya jika ada">
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
	                    		<textarea type="text" name="deskripsi_layanan" class="form-control" required>{{ $call_center->deskripsi_layanan }}</textarea>
	                    	</div>
	                    </div>

	                    <div class="form-group mt-3">
	                    	<label>Sektor Layanan</label>
	                    	<div>
	                    		<select name="sektorlayanan" id="sektorlayanan" class="form-control" required>
	                                <option value="{{ $call_center->sektorlayanan }}">{{ $call_center->sektorlayanan }}</option>
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
	                    			<input type="text" name="sektorlainnya" class="form-control" value="{{ $call_center->sektorlainnya }}">
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
						<div class="form-group mt-3">
							<label>Apakah layanan ini menyimpan data pribadi/rahasia ?</label>
							<div>
								<input type="radio" name="rahasia" id="ya" value="ya" {{ $call_center->rahasia === 'ya' ? 'checked' : '' }} required> Ya
							</div>
							<div>
								<input type="radio" name="rahasia" id="tidak" value="tidak" {{ $call_center->rahasia === 'tidak' ? 'checked' : '' }} required> Tidak
							</div>
						</div>
                        <div class="row mt-3">
	                    	<div class="col-lg-4">
	                    		<div class="form-group">
	                    			<label>Nama PIC</label>
	                    			<div>
	                    				<input type="text" name="nama_pic" class="form-control" value="{{ $call_center->nama_pic }}" required>
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<div class="col-lg-4">
	                    		<div class="form-group">
	                    			<label>Jabatan</label>
	                    			<div>
	                    				<input type="text" name="jabatan_pic" class="form-control" value="{{ $call_center->jabatan_pic }}" required><br />
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<div class="col-lg-4">
	                    		<div class="form-group">
	                    			<label>No. Handphone</label>
	                    			<div>
	                    				<input type="number" name="kontak" class="form-control" value="{{ $call_center->kontak }}" required>
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
									<form method="post" action="{{ route('call_center.2021.delete', $call_center->id) }}" enctype="multipart/form-data">
										@csrf
										@method('DELETE')
										<input type="hidden" name="id">
										<input type="hidden" name="tahun" value="{{ $call_center->tahun }}">
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