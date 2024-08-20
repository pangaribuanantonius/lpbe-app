@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="pagetitle">
	<h1><i class="bi bi-cpu"></i> Monev Aplikasi</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Aplikasi Administrasi Pemerintah</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form method="post" action="{{ route('aplikasi.administrasi_pemerintah.2024.store')}}" enctype="multipart/form-data">
					@csrf
                    @method('POST')
                    <input type="hidden" name="jenis_aplikasi" value="Administrasi Pemerintah">
                    <input type="hidden" name="tahun" value="2024">
                    <input type="hidden" name="instansi_id" class="form-control" value=" {{ \App\Models\User::where('username', session('username'))->first()->instansi_id }}" readonly>
						<div class="form-group mt-3">
							<label>Nama Aplikasi</label>
							<div>
								<input type="text" name="nama_aplikasi" class="form-control" value="{{ old('nama_aplikasi') }}" required>
								<sup><em>Contoh: Sikkomin DS</em></sup>
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
                            <label>Urusan</label>
                            <div>
                            	<select name="urusan_id" id="urusan_id" class="form-control" required>
	                                <option value="">-- Pilih --</option>
	                                @foreach($urusanaplikasiadmpemerintah as $urusan1)
	                                <option value="{{ $urusan1->id }}">{{ $urusan1->nama_urusan }}</option>
	                                @endforeach
	                            </select>
                            </div>
                        </div>

                        	<div class="form-group mt-3">
                        		<label>Bidang Urusan</label>
                        		<div>
                        			 <select name="bidang_urusan_id" id="bidang_urusan_id" class="form-control" required>
		                                <option value="">-- Pilih --</option>
		                            </select>
                        		</div>
                        	</div>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#urusan_id').on('change', function(){
                                    var urusan_id = $(this).val();
                                    if(urusan_id){
                                        $.ajax({
                                            url: '{{ route("bidang_urusan_id.get") }}',
                                            type: "POST",
                                            data: {
                                                urusan_id: urusan_id,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            dataType: "json",
                                            success:function(data){
                                                $('#bidang_urusan_id').empty();
                                                $.each(data, function(key, value){
                                                    $('#bidang_urusan_id').append('<option value="'+ key +'">'+ value +'</option>');
                                                });
                                            }
                                        });
                                    }else{
                                        $('#bidang_urusan_id').empty();
                                    }
                                });
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
							<label>Apakah layanan ini menyimpan data pribadi/rahasia ?</label>
							<div>
								<input type="radio" name="rahasia" id="ya" value="ya" required> Ya
							</div>
							<div>
								<input type="radio" name="rahasia" id="tidak" value="tidak" required> Tidak
							</div>
						</div>
	                    <div class="form-group mt-3">
	                    	<label>Pengguna Layanan</label>
	                    	<div>
	                    		<input type="text" name="pengguna" class="form-control" value="ASN/Non-ASN" readonly>
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