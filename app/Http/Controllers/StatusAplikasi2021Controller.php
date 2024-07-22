<?php

namespace App\Http\Controllers;
use App\Models\Aplikasi;
use App\Models\Instansi;
use Illuminate\Http\Request;

class StatusAplikasi2021Controller extends Controller
{
    public function updatestatus(Request $request){
        $jenis_aplikasi = 'Layanan Publik';
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $tahun = request('tahun');
        \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', $jenis_aplikasi)->Where('tahun', '2021')->update([
            'status' => 'Final',
        ]);
         return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=layanan_publik&tahun=2021')->with('updatestatus', 'Berhasil Memperbarui Data!');
    }

    public function finalisasinihil(Request $request){
        $jenis_aplikasi = 'Administrasi Pemerintah';
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $tahun = request('tahun');
        \App\Models\Aplikasi::create([
            'id' => \Str::random(8),
            'urusan_id' => $request->urusan_id,
            'bidang_urusan_id' => $request->bidang_urusan_id,
            'tahun' => $request->tahun,
            'instansi_id' => $request->instansi_id,
            'nama_aplikasi' => $request->nama_aplikasi,
            'jenis_aplikasi' => $request->jenis_aplikasi,
            'kepemilikan' => $request->kepemilikan,
            'desktop' => $request->desktop,
            'web' => $request->web,
            'android' => $request->android,
            'ios' => $request->ios,
            /*'platform' => implode(',', $request->platform),*/
            'platform2' => $request->platform2,
            'url' => $request->url,
            'tempataplikasi' => $request->tempataplikasi,
            /*'informasi' => $request->informasi,*/
            'dasarhukum' => $request->dasarhukum,
            'sektorpelayananpublik' => $request->sektorpelayananpublik,
            'sektorpelayananpublik2' => $request->sektorpelayananpublik2,
            'deskripsi' => $request->deskripsi,
            /*'fiturutama' => $request->fiturutama,*/
            'pengguna' => $request->pengguna,
            /*'pengguna2' => $request->pengguna2,*/
            'daftarlayanan' => $request->daftarlayanan,
            'daftarproduklayanan' => $request->daftarproduklayanan,
            'tahun_digunakan' => $request->tahun_digunakan,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'launching' => $request->launching,
            /*'penanggungjawab' => $request->penanggungjawab,*/
            'nama_pic' => $request->nama_pic,
            'jabatan_pic' => $request->jabatan_pic,
            'kontak' => $request->kontak,
            'status' => $request->status,
        ]);
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=layanan_publik&tahun=2021')->with('updatestatus', 'Berhasil Memperbarui Data!');
    }
}