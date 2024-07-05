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
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $pemberitahuan = Pemberitahuan::orderBy('created_at', 'desc')->limit(3)->get();
        return view('menu.kirimaps', ['tahun' => $tahun, 'pemberitahuan' => $pemberitahuan, 'instansi_id' => $instansi_id, 'nama_instansi' => $nama_instansi]);
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



    public function uploadberkasaps(){
        $tahun = request('tahun');
        $instansi_id = \App\Models\User::Where('username', session('username'))->first()->instansi_id;

        $aplikasi = Aplikasi::where('instansi_id', $instansi_id)->where('tahun', $tahun)->where('status', 'Sedang Proses')->count();
        $call_center = CallCenter::where('instansi_id', $instansi_id)->where('tahun', $tahun)->where('status', 'Sedang Proses')->count();
        $aplikasi_final = Aplikasi::where('instansi_id', $instansi_id)->where('tahun', $tahun)->where('status', 'Final')->count();
        $call_center_final = CallCenter::where('instansi_id', $instansi_id)->where('tahun', $tahun)->where('status', 'Final')->count();
        return view('menu.uploadberkasaps', ['aplikasi' => $aplikasi, 'call_center' => $call_center, 'aplikasi_final' => $aplikasi_final, 'call_center_final' => $call_center_final]);
    }

    public function kirimberkas(Request $request){
        $datasudahvalidasi = $request->validate([
            'file_aps_publik' => 'file|mimes:pdf|max:4096',
            'file_aps_pemerintah' => 'file|mimes:pdf|max:4096',
            'file_call_center' => 'file|mimes:pdf|max:4096',
        ]);
            $extFile = $request->berkas->getClientOriginalExtension();
            $namaFile = time().".".$extFile;

            $request->berkas->move('konten/berkas', $namaFile);
            \App\Models\Berkas::create([
                'id' => \Str::random(8),
                'instansi_id' => $request('instansi_id'),
                'tahun' => $request('tahun'),
                'nama' => $request('nama'),
                'file_aps_publik' => $namaFile,
                'file_aps_pemerintah' => $namaFile,
                'file_call_center' => $namaFile,
            ]);
        return redirect('berkas/create')->with('success', 'Berhasil Menambah Data!');;
    }



}
