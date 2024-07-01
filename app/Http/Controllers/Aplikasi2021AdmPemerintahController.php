<?php

namespace App\Http\Controllers;
use App\Models\Aplikasi; 
use App\Models\Instansi;
use App\Models\Urusan;
use App\Models\BidangUrusan;
use App\Models\Penandatanganan; 
use PDF;
use App\Exports\TesExport;
use App\Exports\LaporanTerkirimAplikasi2021Export;
use App\Exports\InstansiBelumInputAplikasi2021Export;
use App\Exports\InstansiStatusPendingAplikasi2021Export;
use App\Exports\InstansiStatusTerkirimAplikasi2021Export;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Aplikasi2021AdmPemerintahController extends Controller
{
    public function terkirim(){
        $tahun = request('tahun');

        $statuss = \App\Models\Aplikasi::first();

        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;

        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;

        $aplikasi = \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('tahun', '2021')->Where('status', 'Terkirim')->get();
        
        return view('aplikasi.2021.terkirim', ['aplikasi' => $aplikasi, 'nama_instansi' => $nama_instansi, 'statuss' => $statuss]);
    } 

    public function create(){
        $layanan = request('layanan');
        $tahun = request('tahun'); 
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $urusanaplikasiadmpemerintah = Urusan::orderBy('nama_urusan', 'asc')->get();
        return view('aplikasi.administrasi_pemerintah.2021.create', ['nama_instansi' => $nama_instansi, 'urusanaplikasiadmpemerintah' => $urusanaplikasiadmpemerintah]);
    }

    public function getbidangurusan(Request $request)
    {
        $bidang_urusan_id = BidangUrusan::where('urusan_id', $request->urusan_id)->pluck('nama_bidang_urusan', 'id');
        return response()->json($bidang_urusan_id);
    }

    public function store(Request $request){
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
                'status' => 'Sedang Proses',
            ]);
       
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=administrasi_pemerintah&tahun='.request('tahun').'')->with('success', 'Berhasil Menambah Data!');
    }

    public function edit(Aplikasi $aplikasi){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $urusanaplikasiadmpemerintah = Urusan::orderBy('nama_urusan', 'asc')->get();
        return view('aplikasi.administrasi_pemerintah.2021.edit', ['aplikasi' => $aplikasi, 'nama_instansi' => $nama_instansi, 'urusanaplikasiadmpemerintah' => $urusanaplikasiadmpemerintah]);
    }

    public function update(Request $request, Aplikasi $aplikasi){
             $aplikasi->update([
                'tahun' => $request->tahun,
                'instansi_id' => $request->instansi_id,
                'nama_aplikasi' => $request->nama_aplikasi,
                'kepemilikan' => $request->kepemilikan,
                'desktop' => $request->desktop,
                'web' => $request->web,
                'android' => $request->android,
                'ios' => $request->ios,
                /*'platform' => $request->platform,*/
                /*'platform' => implode(',', $request->platform),*/
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
            ]);
       
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=administrasi_pemerintah&tahun='.request('tahun'))->with('update', 'Berhasil Ubah Data!');
    }

    public function destroy(Request $request, Aplikasi $aplikasi){
            $aplikasi::destroy($aplikasi->id);
        /*return redirect('info/index')->with(['flashdata' => 'Berhasil']);*/
       return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=administrasi_pemerintah&tahun='.request('tahun').'')->with('delete', 'Berhasil Menghapus Data!');
    }

    public function cetakaplikasipdf_2021(){
        $tahun = request('tahun');
        $statuss = \App\Models\Aplikasi::first();
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $aplikasi = \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('tahun', '2021')->get();
        $penandatanganan = \App\Models\Penandatanganan::Where('instansi_id', $instansi_id)->first();
 
        $pdf = PDF::loadview('aplikasi.administrasi_pemerintah.2021.cetakaplikasipdf_2021',[
            'aplikasi'=>$aplikasi,
            'penandatanganan'=>$penandatanganan,
            'nama_instansi'=>$nama_instansi,
        ])->setPaper('f4', 'landscape');;
        return $pdf->download('laporan-aplikasi-pdf-2021.pdf');
    }

    public function laporanterkirimaplikasiadmexcel2021(){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $aplikasi = Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', '2021')->Where('status', 'Final')->get();
        /*return view('aplikasi.2021.laporanterkirimaplikasiexcel2021', ['aplikasi' => $aplikasi]);*/
        return Excel::download(new LaporanTerkirimAplikasi2021Export($aplikasi), 'laporan-aplikasi-terkirim-2021.xlsx');
        
    }


    public function laporanterkirimaplikasiexcel2021(){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $aplikasi = Aplikasi::Where('instansi_id', $instansi_id)->Where('tahun', '2021')->Where('status', 'Terkirim')->get();
        /*return view('aplikasi.2021.laporanterkirimaplikasiexcel2021', ['aplikasi' => $aplikasi]);*/
        return Excel::download(new LaporanTerkirimAplikasi2021Export($aplikasi), 'laporan-aplikasi-terkirim-2021.xlsx');
        
    }

    public function opdbeluminputaplikasi2021(){
        $instansi1 = Instansi::WheredoesntHave('aplikasi', function($q){$q->Where('tahun', '2021'); })->get();
        return view('laporanaplikasi.2021.laporanbelumkirim', ['instansi1' => $instansi1]);
    }

    public function opdaplikasipending2021(){ 
        $opdaplikasipending2021 = Instansi::WhereHas('aplikasi', function($q){ $q->Where('status', 'Pending')->Where('tahun', '2021'); })->get();
        return view('laporanaplikasi.2021.laporanaplikasipending', ['opdaplikasipending2021' => $opdaplikasipending2021]);
    } 

    public function opdaplikasiterkirim2021(){
        $opdaplikasiterkirim2021 = Instansi::WhereHas('aplikasi', function($q){ $q->Where('status', 'Terkirim')->Where('tahun', '2021'); })->get();
        return view('laporanaplikasi.2021.laporanaplikasiterkirim', ['opdaplikasiterkirim2021' => $opdaplikasiterkirim2021]); 
    }

    public function laporanopdbeluminputaplikasipdf_2021(){
        $tahun = request('tahun');
        $instansi1 = Instansi::WheredoesntHave('aplikasi', function($q){$q->Where('tahun', '2021'); })->get();
        $pdf = PDF::loadview('laporanaplikasi.2021.tabelopdbelumkirimaplikasi2021pdf',[
            'instansi1'=>$instansi1,
        ])->setPaper('f4', 'landscape');;
        return $pdf->download('laporan-instansi-belum-entridata-2021.pdf');
    }

    public function laporanaplikasipendingpdf_2021(){
        $tahun = request('tahun');
        $instansi1 = Instansi::WhereHas('aplikasi', function($q){$q->Where('status', 'Pending')->Where('tahun', '2021'); })->get();
        $pdf = PDF::loadview('laporanaplikasi.2021.tabelopdaplikasipending2021pdf',[
            'instansi1'=>$instansi1,
        ])->setPaper('f4', 'landscape');;
        return $pdf->download('laporan-instansi-aplikasi-pending-2021.pdf');
    } 

    public function laporanaplikasiterkirimpdf_2021(){
        $tahun = request('tahun');
        $instansi1 = Instansi::WhereHas('aplikasi', function($q){$q->Where('status', 'Terkirim')->Where('tahun', '2021'); })->get();
        $pdf = PDF::loadview('laporanaplikasi.2021.tabelopdaplikasiterkirim2021pdf',[
            'instansi1'=>$instansi1,
        ])->setPaper('f4', 'landscape');;
        return $pdf->download('laporan-instansi-aplikasi-terkirim-2021.pdf');
    }

    public function dataopd(){
        $instansi1 = Instansi::WheredoesntHave('aplikasi', function($q){$q->Where('tahun', '2021'); })->get();
        $instansi2 = Instansi::WhereHas('aplikasi', function($q){ $q->Where('status', 'Pending')->Where('tahun', '2021'); })->get();
        $instansi3 = Instansi::WhereHas('aplikasi', function($q){ $q->Where('status', 'Terkirim')->Where('tahun', '2021'); })->get();
        return view('laporanaplikasi.2021.dataopd', ['instansi1' => $instansi1, 'instansi2' => $instansi2, 'instansi3' => $instansi3]);
    }

    public function laporanbeluminputaplikasiexcel_2021(){
        $instansi1 = Instansi::WheredoesntHave('aplikasi', function($q){$q->Where('tahun', '2021'); })->get();
        return Excel::download(new InstansiBelumInputAplikasi2021Export($instansi1), 'Instansi-belum-entri-aplikasi-2021.xlsx');
    }

    public function laporanaplikasipendingexcel_2021(){
        $instansi1 = Instansi::WhereHas('aplikasi', function($q){$q->Where('tahun', '2021')->Where('status', 'Pending'); })->get();
        return Excel::download(new InstansiStatusPendingAplikasi2021Export($instansi1), 'Instansi-aplikasi-status-pending-2021.xlsx');
    }

    public function laporanaplikasiterkirimexcel_2021(){
        $instansi1 = Instansi::WhereHas('aplikasi', function($q){$q->Where('tahun', '2021')->Where('status', 'Terkirim'); })->get();
        return Excel::download(new InstansiStatusTerkirimAplikasi2021Export($instansi1), 'Instansi-aplikasi-status-terkirim-2021.xlsx');
    }
}
