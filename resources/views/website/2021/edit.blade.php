@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<div class="pagetitle">
	<h1><i class="bi bi-cpu"></i> Monev Aplikasi</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Website</li>
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
                        @method('POST')
                        <div class="form-group mt-3">
                            <label>Nama Website</label>
                            <input type="text" name="nama_website" value="{{ $website->nama_website }}" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label>Deskripsi Website</label>
                            <textarea name="deskripsi_website" class="form-control">{{ $website->deskripsi_website }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label>Alamat URL</label>
                            <input type="url" name="url" class="form-control" value="{{ $website->url }}" required>
                        </div>
                        <div class="form-group mt-3">
                            <label>Pengembang</label>
                            <select name="pengembang" class="form-control" required>
                                <option value="{{$website->pengembang}}">{{ $website->pengembang }}</option>
                                <option value="Dikembangkan Sendiri">Dikembangkan Sendiri</option>
                                <option value="Dinas Komunikasi, Informatika, Statistik dan Persandian">Dinas Komunikasi, Informatika, Statistik dan Persandian</option>
                                <option value="Pihak Ketiga">Pihak Ketiga</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Tempat</label>
                            <select name="tempat" class="form-control" required>
                                <option value="{{ $website->tempat }}">{{ $website->tempat }}</option>
                                <option value="Unit Kerja Terkait">Unit Kerja Terkait</option>
                                <option value="Dinas Komunikasi, Informatika, Statistik dan Persandian">Dinas Komunikasi, Informatika, Statistik dan Persandian</option>
                                <option value="Pihak Ketiga">Pihak Ketiga</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
							<label>Apakah Website ini menyimpan data pribadi/rahasia ?</label>
							<div>
								<input type="radio" name="rahasia" id="ya" value="ya" {{ $website->rahasia === 'ya' ? 'checked' : '' }} required> Ya
							</div>
							<div>
								<input type="radio" name="rahasia" id="tidak" value="tidak" {{ $website->rahasia === 'tidak' ? 'checked' : '' }} required> Tidak
							</div>
						</div>
                        <div class="form-group mt-3">
                            <label>Apakah Website ini menyediakan fitur ramah anak ?</label>
                            <div>
								<input type="radio" name="ramah_anak" id="ya" value="ya" {{ $website->ramah_anak === 'ya' ? 'checked' : '' }} required> Ya
							</div>
							<div>
								<input type="radio" name="ramah_anak" id="tidak" value="tidak" {{ $website->ramah_anak === 'tidak' ? 'checked' : '' }} required> Tidak
							</div>
                        </div>
                        <div class="row mt-3">
	                    	<div class="col-lg-4">
	                    		<div class="form-group">
	                    			<label>Nama PIC</label>
	                    			<div>
	                    				<input type="text" name="nama_pic" class="form-control" value="{{ $website->nama_pic }}" required>
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<div class="col-lg-4">
	                    		<div class="form-group">
	                    			<label>Jabatan</label>
	                    			<div>
	                    				<input type="text" name="jabatan_pic" class="form-control" value="{{ $website->jabatan_pic }}" required><br />
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<div class="col-lg-4">
	                    		<div class="form-group">
	                    			<label>No. Handphone</label>
	                    			<div>
	                    				<input type="number" name="kontak" class="form-control" value="{{ $website->kontak }}" required>
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