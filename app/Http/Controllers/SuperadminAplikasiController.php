<?php

namespace App\Http\Controllers;
use App\Models\Aplikasi;
use App\Models\CallCenter;
use App\Models\Instansi;
use Illuminate\Http\Request;

class SuperadminAplikasiController extends Controller
{
    public function index(){
        $layanan = request('layanan');
        $jenisaplikasi = request('jenisaplikasi');
        $tahun = request('tahun');
        $status = request('status');
        $instansi_id = request('instansi_id');
        $aplikasi = Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', $tahun)->get();
        $aplikasiadm = Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', $tahun)->get();
        $call_center = CallCenter::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->get();
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $jumlahaplikasipublik = \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', $tahun)->count();
        $jumlahaplikasiadm = \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', $tahun)->count();
        $jumlahcallcenter = \App\Models\CallCenter::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->count();
        $statuss = \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', $tahun)->first();
        $statussaplikasiadm = \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', $tahun)->first();
        $statusscallcenter = \App\Models\CallCenter::Where('instansi_id', $instansi_id)->Where('tahun', $tahun)->first();

        if ($layanan == 'aplikasi') {
            if ($jenisaplikasi == 'layanan_publik') {
                if ($tahun == '2021') {
                    return view('superadminaplikasi.layanan_publik.2021.index', ['aplikasi' => $aplikasi, 'instansi_id' => $instansi_id, 'nama_instansi' => $nama_instansi, 'jumlahaplikasipublik' => $jumlahaplikasipublik, 'statuss' => $statuss]);
                }else{
                    return view('404');
                }
            }elseif($jenisaplikasi == 'administrasi_pemerintah') {
                if ($tahun == '2021') {
                    return view('superadminaplikasi.administrasi_pemerintah.2021.index', ['aplikasiadm' => $aplikasiadm, 'instansi_id' => $instansi_id, 'nama_instansi' => $nama_instansi, 'jumlahaplikasiadm' => $jumlahaplikasiadm, 'statussaplikasiadm' => $statussaplikasiadm]);
                }else{
                    return view('404');
                }
            }elseif ($jenisaplikasi == 'call_center') {
                if ($tahun == '2021') {
                    return view('superadmincall_center.2021.index', ['call_center' => $call_center, 'instansi_id' => $instansi_id, 'nama_instansi' => $nama_instansi, 'jumlahcallcenter' => $jumlahcallcenter, 'statusscallcenter' => $statusscallcenter]);
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
}
