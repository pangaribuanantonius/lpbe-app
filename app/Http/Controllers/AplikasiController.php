<?php

namespace App\Http\Controllers;
use App\Models\Aplikasi;
use App\Models\CallCenter;
use App\Models\Instansi;
use App\Models\Penandatanganan;
use Illuminate\Http\Request;

class AplikasiController extends Controller
{

    public function index(){
        $layanan = request('layanan');
        $jenis_aplikasi = request('jenis_aplikasi');
        $jenisaplikasi = request('jenisaplikasi');
        $tahun = request('tahun');
        $status = request('status');
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $aplikasi = Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', $tahun)->get();
        $aplikasiadm = Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', $tahun)->get();
        $call_center = CallCenter::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->get();
        $website = Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Website')->Where('tahun', $tahun)->get();
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $jumlahaplikasipublik = \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', $tahun)->count();
        $jumlahaplikasiadm = \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', $tahun)->count();
        $jumlahcallcenter = \App\Models\CallCenter::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->count();
        $jumlahwebsite = \App\Models\Website::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->count();
        $statuss = \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', $tahun)->first();
        $statussaplikasiadm = \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', $tahun)->first();
        $statusscallcenter = \App\Models\CallCenter::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->first();
        $statusswebsite = \App\Models\Website::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->first();
        $penandatanganan = Penandatanganan:: where('instansi_id', $instansi_id)->count();
        $verifapspublik = Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', $tahun)->where('verifikasi', 'Disetujui')->count();



        if ($layanan == 'aplikasi') {
            if ($jenisaplikasi == 'layanan_publik') {
                if ($tahun == 2021) {
                    return view('aplikasi.layanan_publik.2021.index', ['aplikasi' => $aplikasi, 'jenis_aplikasi' => $jenis_aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasipublik' => $jumlahaplikasipublik, 'statuss' => $statuss, 'penandatanganan' => $penandatanganan, 'verifapspublik' => $verifapspublik]);
                }elseif ($tahun == 2024) {
                    return view('aplikasi.layanan_publik.2024.index', ['aplikasi' => $aplikasi, 'jenis_aplikasi' => $jenis_aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasipublik' => $jumlahaplikasipublik, 'statuss' => $statuss, 'penandatanganan' => $penandatanganan, 'verifapspublik' => $verifapspublik]);
                }else{
                    return view('404');
                }
            }elseif ($jenisaplikasi == 'administrasi_pemerintah') {
                if ($tahun == 2021) {
                    return view('aplikasi.administrasi_pemerintah.2021.index', ['aplikasiadm' => $aplikasiadm, 'jenis_aplikasi' => $jenis_aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasiadm' => $jumlahaplikasiadm, 'statussaplikasiadm' => $statussaplikasiadm, 'penandatanganan' => $penandatanganan]);
                }elseif ($tahun == 2024) {
                    return view('aplikasi.administrasi_pemerintah.2024.index', ['aplikasiadm' => $aplikasiadm, 'jenis_aplikasi' => $jenis_aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasiadm' => $jumlahaplikasiadm, 'statussaplikasiadm' => $statussaplikasiadm, 'penandatanganan' => $penandatanganan]);
                }else{
                    return view('404');
                }
            }elseif ($jenisaplikasi == 'call_center') {
                if ($tahun == 2021) {
                    return view('call_center.2021.index', ['call_center' => $call_center, 'nama_instansi' => $nama_instansi, 'jumlahcallcenter' => $jumlahcallcenter, 'statusscallcenter' => $statusscallcenter, 'penandatanganan' => $penandatanganan]);
                }elseif ($tahun == 2024) {
                    return view('call_center.2024.index', ['call_center' => $call_center, 'nama_instansi' => $nama_instansi, 'jumlahcallcenter' => $jumlahcallcenter, 'statusscallcenter' => $statusscallcenter, 'penandatanganan' => $penandatanganan]);
                }else{
                    return view('404');
                }
            }elseif ($jenisaplikasi == 'website') {
                if ($tahun == 2021) {
                    return view('website.2021.index', ['website' => $website, 'nama_instansi' => $nama_instansi, 'jumlahwebsite' => $jumlahwebsite, 'statusswebsite' => $statusswebsite, 'penandatanganan' => $penandatanganan]);
                }elseif ($tahun == 2024) {
                    return view('website.2024.index', ['website' => $website, 'nama_instansi' => $nama_instansi, 'jumlahwebsite' => $jumlahwebsite, 'statusswebsite' => $statusswebsite, 'penandatanganan' => $penandatanganan]);
                }else{
                    return view('404');
                }
            }else{
                return view('404');
            }
        }else{
            return view('404');
        }
    }

    /*public function index(){
        $layanan = request('layanan');
        $tahun = request('tahun');
        $status = request('status');
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $aplikasi = Aplikasi::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->get();
        $spbe = Spbe::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->get();
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $jumlahaplikasi = \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->count();
        $jumlahspbe = \App\Models\Spbe::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->count();
        $statuss = \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->first();
        $statuss2 = \App\Models\Spbe::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->first();



        if($layanan == 'aplikasi'){
            if ($tahun == 2021) {
                return view('aplikasi.2021.index', ['aplikasi' => $aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasi' => $jumlahaplikasi, 'statuss' => $statuss]);
            }else if ($tahun == 2022) {
                return view('aplikasi.2022.index', ['aplikasi' => $aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasi' => $jumlahaplikasi, 'statuss' => $statuss]);
            }else if ($tahun == 2023) {
                 return view('aplikasi.2023.index', ['aplikasi' => $aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasi' => $jumlahaplikasi, 'statuss' => $statuss]);
            }else if ($tahun == 2024) {
                return view('aplikasi.2024.index', ['aplikasi' => $aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasi' => $jumlahaplikasi, 'statuss' => $statuss]);
            }else if ($tahun == 2025) {
                return view('aplikasi.2025.index', ['aplikasi' => $aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasi' => $jumlahaplikasi, 'statuss' => $statuss]);
            }else if ($tahun == 2026) {
                return view('aplikasi.2026.index', ['aplikasi' => $aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasi' => $jumlahaplikasi, 'statuss' => $statuss]);
            }else if ($tahun == 2027) {
                return view('aplikasi.2027.index', ['aplikasi' => $aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasi' => $jumlahaplikasi, 'statuss' => $statuss]);
            }else if ($tahun == 2028) {
                return view('aplikasi.2028.index', ['aplikasi' => $aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasi' => $jumlahaplikasi, 'statuss' => $statuss]);
            }else if ($tahun == 2029) {
                return view('aplikasi.2029.index', ['aplikasi' => $aplikasi, 'nama_instansi' => $nama_instansi, 'jumlahaplikasi' => $jumlahaplikasi, 'statuss' => $statuss]);
            }else {
                return view('404');
            }

        }else if ($layanan == 'spbe') {
            if ($tahun == 2022) {
                return view('spbe.2022.index', ['spbe' => $spbe, 'nama_instansi' => $nama_instansi, 'jumlahspbe' => $jumlahspbe, 'statuss2' => $statuss2]);
            }else if ($tahun == 2023) {
                return view('spbe.2023.index', ['spbe' => $spbe, 'nama_instansi' => $nama_instansi, 'jumlahspbe' => $jumlahspbe, 'statuss2' => $statuss2]);
            }else if ($tahun == 2024) {
                return view('spbe.2024.index', ['spbe' => $spbe, 'nama_instansi' => $nama_instansi, 'jumlahspbe' => $jumlahspbe, 'statuss2' => $statuss2]);
            }else {
                return view('404');
            }
        }else if($layanan == 'smartcity') {
             return view('404');
        }
        else {
             return view('404');
        }
    }*/

    public function update(Request $request, Aplikasi $aplikasi){
            $tahun = request('tahun');
            $aplikasi->update([
                'status' => 'Selesai',
                'tahun' => $request->tahun,
            ]);
        return redirect('layanan/index?layanan=aplikasi&tahun='.request('tahun'));
    }

}
