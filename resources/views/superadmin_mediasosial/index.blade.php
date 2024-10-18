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
                            @foreach($list_instansi as $instansi)
                            <tr>
                                <td>{{ $instansi->nama_instansi }}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-outline-primary"><i class="bi bi-eye"></i> Lihat</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection