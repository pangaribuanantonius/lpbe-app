<?php

namespace App\Http\Controllers;
use App\Models\MediaSosial;
use App\Models\Instansi;
use App\Models\Penandatanganan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MediaSosialController extends Controller
{
    public function index() {
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $media_sosial = MediaSosial::where('instansi_id', $instansi_id)->first();
        $hitung_media_sosial = \App\Models\MediaSosial::Where('instansi_id', $instansi_id)->count();
        $penandatanganan = Penandatanganan:: where('instansi_id', $instansi_id)->count();

        return view('media_sosial.index', ['nama_instansi' => $nama_instansi, 'media_sosial' => $media_sosial, 'hitung_media_sosial' => $hitung_media_sosial, 'penandatanganan' => $penandatanganan]);
    }

    public function create() {
        return view('media_sosial.create');
    }

    public function store(Request $request) {
        \App\Models\MediaSosial::create([
            'id' => \Str::random(8),
            'instansi_id' => $request->instansi_id,
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
            'link_twitter' => $request->link_twitter,
            'link_youtube' => $request->link_youtube,
            'link_tiktok' => $request->link_tiktok,
            'link_threads' => $request->link_threads,
        ]);
        return redirect('media_sosial/index')->with('success', 'Berhasil Menambah Data!');
    }
}
