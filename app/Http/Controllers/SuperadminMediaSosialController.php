<?php

namespace App\Http\Controllers;
use App\Models\MediaSosial;
use App\Models\Instansi;
use Illuminate\Http\Request;

class SuperadminMediaSosialController extends Controller
{
    public function index() {
        $instansi_id = request('instansi_id');
        $list_instansi = Instansi::orderBy('nama_instansi', 'asc')->get();
        $media_sosial = MediaSosial::orderBy('instansi_id', 'asc')->get();

        return view('superadmin_mediasosial.index', ['list_instansi' => $list_instansi, 'media_sosial' => $media_sosial, 'instansi_id' => $instansi_id]);
    }
}
