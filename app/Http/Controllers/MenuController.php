<?php

namespace App\Http\Controllers;
use App\Models\Aplikasi;
use App\Models\CallCenter;
use App\Models\Spbe;
use App\Models\Penandatanganan;
use App\Models\Instansi;
use App\Models\Tahun;
use App\Models\Pemberitahuan;
use App\Models\User;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $instansiall = Instansi::All();
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;

        /*grafik layanan aplikasi*/
        $aplikasi_layanan_publik = Aplikasi::Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', '2021')->Where('instansi_id', $instansi_id)->count();
        $aplikasi_administrasi_pemerintah = Aplikasi::Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', '2021')->Where('instansi_id', $instansi_id)->count();
        $call_center = CallCenter::Where('tahun', '2021')->Where('instansi_id', $instansi_id)->count();

        $pemberitahuan = Pemberitahuan::orderBy('created_at', 'desc')->limit(3)->get();

        return view('menu.index', ['nama_instansi' => $nama_instansi, 'aplikasi_layanan_publik' => $aplikasi_layanan_publik, 'aplikasi_administrasi_pemerintah' => $aplikasi_administrasi_pemerintah, 'call_center' =>$call_center, 'instansiall' => $instansiall, 'pemberitahuan' => $pemberitahuan]);
    }

    public function monitoring(){
    $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
    $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
    $tahun = \App\Models\Tahun::orderBy('tahun', 'asc')->get();

    return view('menu.monitoring', ['tahun' => $tahun, 'nama_instansi' => $nama_instansi]);
    }

    public function aplikasi(){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $tahun = \App\Models\Tahun::orderBy('tahun', 'asc')->get();
        $instansiall = Instansi::All();

        /*grafik layanan aplikasi*/
        $aplikasi_layanan_publik = Aplikasi::Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', '2021')->count();
        $aplikasi_administrasi_pemerintah = Aplikasi::Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', '2021')->count();
        $call_center = CallCenter::Where('tahun', '2021')->count();

        $pemberitahuan = Pemberitahuan::orderBy('created_at', 'desc')->limit(3)->get();
        return view('menu.aplikasi', ['tahun' => $tahun, 'nama_instansi' => $nama_instansi, 'pemberitahuan' => $pemberitahuan, 'aplikasi_layanan_publik' => $aplikasi_layanan_publik, 'aplikasi_administrasi_pemerintah' => $aplikasi_administrasi_pemerintah, 'call_center' =>$call_center, 'instansiall' => $instansiall]);
    }

    public function kirimaplikasi(){
        $tahun = \App\Models\Tahun::orderBy('tahun', 'asc')->get();
        $pemberitahuan = Pemberitahuan::orderBy('created_at', 'desc')->limit(3)->get();
        return view('menu.kirimaps', ['tahun' => $tahun, 'pemberitahuan' => $pemberitahuan]);
    }

    public function penandatanganan(){

        $instansi_id = \App\Models\User::Where('username', session('username'))->first()->instansi_id;

        $nama_instansi = \App\Models\Instansi::Where('id', $instansi_id)->first()->nama_instansi;

        $penandatanganan = \App\Models\Penandatanganan::Where('instansi_id', $instansi_id)->get();

        $jumlahtandatangan = \App\Models\Penandatanganan::Where('instansi_id', $instansi_id)->count();

        return view('menu.penandatanganan', [
            'jumlahtandatangan' => $jumlahtandatangan,  
            'instansi_id' => $instansi_id, 
            'nama_instansi' => $nama_instansi, 
            'penandatanganan' => $penandatanganan]);
    }


    public function updatelayananaplikasi(Request $request){
        $tahun = request('tahun');
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        \App\Models\Aplikasi::where('instansi_id', $instansi_id)->where('tahun', $tahun)->update([
            'status' => 'Final',
        ]);
        \App\Models\CallCenter::where('instansi_id', $instansi_id)->where('tahun', $tahun)->update([
            'status' => 'Final',
        ]);
        return redirect('menu/kirimaps')->with('update', '');
    }



}
