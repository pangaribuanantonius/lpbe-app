@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<!-- Page Title -->
<div class="pagetitle">
    <h1><i class="bi bi-controller"></i> Media Sosial</h1>
    <ol class="breadcrumb">
        <li class="active ms-1">Data</li>
    </ol>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    @if($hitung_media_sosial == 0)
    <div class="alert alert-info" role="alert">
        Tidak Ada Data
    </div>
    <a class="btn btn-outline-success" href="{{ route('media_sosial.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
    @else
    <div class="card">
        <div class="card-body">
            <table class="table table-hover datatable table-progress">
                <thead>
                  <tr class="text-danger">
                    <th scope="col" class="align-middle">Unit Kerja</th>
                    <th scope="col" class="text-wrap text-center align-middle">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="#" class="text-wrap text-decoration-none">{{ $media_sosial->instansi->nama_instansi }}</a></td>
                    <td class="align-middle text-center">
                        <a class="btn btn-outline-dark text-center mb-1" style="white-space: nowrap;" href="#" data-bs-toggle="modal" data-bs-target="#detail"><i class="bi bi-eye"></i> Detail</a>
                        <a class="btn btn-outline-primary text-center mb-1" style="white-space: nowrap;" href="{{ route('media_sosial.edit', $media_sosial->id) }}"><i class="bi bi-pencil"></i> Edit</a>
                    </td>
                  </tr>

<!-- modal detail media sosial -->
<div class="modal fade" id="detail" tabindex="-1" arial-labelly="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Media Sosial</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group mt-3">
                        <label>Link Profil Facebook</label>
                        @if($media_sosial->link_facebook == '')
                        <p>Kosong</p>
                        @else
                        <p>{{ $media_sosial->link_facebook }}</p>
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label>Link Profil Instagram</label>
                        @if($media_sosial->link_instagram == '')
                        <p>Kosong</p>
                        @else
                        <p>{{ $media_sosial->link_instagram }}</p>
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label>Link Profil Twitter</label>
                        @if($media_sosial->link_twitter == '')
                        <p>Kosong</p>
                        @else
                        <p>{{ $media_sosial->link_twitter }}</p>
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label>Link Profil Youtube</label>
                        @if($media_sosial->link_youtube == '')
                        <p>Kosong</p>
                        @else
                        <p>{{ $media_sosial->link_youtube }}</p>
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label>Link Profil Tiktok</label>
                        @if($media_sosial->link_tiktok == '')
                        <p>Kosong</p>
                        @else
                        <p>{{ $media_sosial->link_tiktok }}</p>
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label>Link Profil Threads</label>
                        @if($media_sosial->link_threads == '')
                        <p>Kosong</p>
                        @else
                        <p>{{ $media_sosial->link_threads }}</p>
                        @endif
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal detail media sosial -->

                </tbody>
              </table>
        </div>
    </div>
    <button class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i> Ubah Data</button>
    @endif
</section>

@endsection