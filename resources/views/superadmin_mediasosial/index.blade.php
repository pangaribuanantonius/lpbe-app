@extends('sidebar.sidebarmediasosialadmin')
@section('mediasosialadmin')

<!-- Page Title -->
<div class="pagetitle">
    <h1><i class="bi bi-controller"></i> Media Sosial</h1>
    <ol class="breadcrumb">
        <li class="active ms-1">Unit Kerja</li>
    </ol>
</div>
<!-- End Page Title -->


<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body mt-4">
                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th>Unit Kerja</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($media_sosial as $mediasosial)
                            <tr>
                                <td>{{ $mediasosial->instansi->nama_instansi }}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#lihat{{ $mediasosial->instansi_id }}"><i class="bi bi-eye"></i> Lihat</a>
                                </td>
                            </tr>

                            <div class="modal fade" id="lihat{{ $mediasosial->instansi_id }}" tabindex="-1" arial-labelly="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group mt-3">
                                                <label>Link Profil Facebook</label>
                                                @if($mediasosial->link_facebook == '')
                                                <p>-</p>
                                                @else
                                                <p>{{ $mediasosial->link_facebook }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Link Profil Instagram</label>
                                                @if($mediasosial->link_instagram == '')
                                                <p>-</p>
                                                @else
                                                <p>{{ $mediasosial->link_instagram }}</p>
                                                @endif
                                            <div class="form-group mt-3">
                                                <label>Link Profil Twitter</label>
                                                @if($mediasosial->link_twitter == '')
                                                <p>-</p>
                                                @else
                                                <p>{{ $mediasosial->link_twitter }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Link Profil Youtube</label>
                                                @if($mediasosial->link_youtube == '')
                                                <p>-</p>
                                                @else
                                                <p>{{ $mediasosial->link_youtube }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Link Profil Tiktok</label>
                                                @if($mediasosial->link_tiktok == '')
                                                <p>-</p>
                                                @else
                                                <p>{{ $mediasosial->link_tiktok }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group mt-3">
                                                <label>Link Profil Threads</label>
                                                @if($mediasosial->link_threads == '')
                                                <p>-</p>
                                                @else
                                                <p>{{ $mediasosial->link_threads }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Tutup</button>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection