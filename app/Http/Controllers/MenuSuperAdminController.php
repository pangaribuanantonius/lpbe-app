<?php
 
namespace App\Http\Controllers;
use App\Models\Aplikasi;
use App\Models\CallCenter;
use App\Models\Website;
use App\Models\Instansi;
use App\Models\User;
use App\Models\Tahun;
use App\Models\Berkas;
use App\Models\IndikatorSpbe;
use App\Models\Urusan;
use App\Models\BidangUrusan;
use App\Models\Pemberitahuan;
use PDF;
use Carbon\Carbon;
use App\Exports\InstansibelumentriExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuSuperAdminController extends Controller
{
    // public function menu(){
    //     /*$instansi = Instansi::WhereHas('aplikasi', function($q){
    //             $q->Where('tahun', '2021');
    //          })->get();*/
    //     $year = Carbon::now()->year; // Mengambil tahun saat ini
    //     $instansi = Instansi::orderBy('nama_instansi', 'asc')->get();
    //     $aplikasi_layanan_publik = Aplikasi::Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', $year)->where('status','!=', 'Kosong')->count();
    //     $aplikasi_administrasi_pemerintah = Aplikasi::Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', $year)->where('status','!=', 'Kosong')->count();
    //     $call_center = CallCenter::Where('tahun', $year)->where('status','!=', 'Kosong')->count();
    //     $apspublik_proses = Instansi::WhereHas('aplikasi', function($q){
    //             $q->Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', $year)->Where('status', 'Sedang Proses');
    //          })->get();
    //     $apspublik_final = Instansi::WhereHas('aplikasi', function($q){
    //             $q->Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', $year)->Where('status', 'Final');
    //          })->get();

    //     $pemberitahuan = Pemberitahuan::orderBy('created_at', 'desc')->limit(3)->get();
        
    //     return view('superadmin.menu', ['instansi' => $instansi, 'aplikasi_layanan_publik' => $aplikasi_layanan_publik, 'aplikasi_administrasi_pemerintah' => $aplikasi_administrasi_pemerintah, 'call_center' =>$call_center, 'apspublik_proses' =>$apspublik_proses, 'apspublik_final' =>$apspublik_final, 'pemberitahuan' =>$pemberitahuan]);
    // }

    public function menu()
{
    $year = Carbon::now()->year; // Mengambil tahun saat ini

    // Mengambil instansi dengan urutan nama
    $instansi = Instansi::orderBy('nama_instansi', 'asc')->get();

    // Menghitung aplikasi berdasarkan jenis, tahun, dan status
    $aplikasiLayananPublikCount = Aplikasi::where('jenis_aplikasi', 'Layanan Publik')
        ->where('tahun', $year)
        ->where('status', '!=', 'Kosong')
        ->count();

    $aplikasiAdministrasiPemerintahCount = Aplikasi::where('jenis_aplikasi', 'Administrasi Pemerintah')
        ->where('tahun', $year)
        ->where('status', '!=', 'Kosong')
        ->count();

    $callCenterCount = CallCenter::where('tahun', $year)
        ->where('status', '!=', 'Kosong')
        ->count();

    $WebsiteCount = Website::where('tahun', $year)
        ->where('status', '!=', 'Kosong')
        ->count();

    // Menghitung jumlah instansi dengan aplikasi dalam proses dan final
    $apspublikProsesCount = Instansi::whereHas('aplikasi', function($query) use ($year) {
        $query->where('jenis_aplikasi', 'Layanan Publik')
            ->where('tahun', $year)
            ->where('status', 'Sedang Proses');
    })->count();

    $apspublikFinalCount = Instansi::whereHas('aplikasi', function($query) use ($year) {
        $query->where('jenis_aplikasi', 'Layanan Publik')
            ->where('tahun', $year)
            ->where('status', 'Final');
    })->count();

    // Mengambil 3 pemberitahuan terbaru
    $pemberitahuan = Pemberitahuan::orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

    // Mengirim data ke view
    return view('superadmin.menu', [
        'instansi' => $instansi,
        'aplikasi_layanan_publik' => $aplikasiLayananPublikCount,
        'aplikasi_administrasi_pemerintah' => $aplikasiAdministrasiPemerintahCount,
        'call_center' => $callCenterCount,
        'website' => $WebsiteCount,
        'apspublik_proses' => $apspublikProsesCount,
        'apspublik_final' => $apspublikFinalCount,
        'pemberitahuan' => $pemberitahuan,
        'year' => $year
    ]);
}

    public function monevaplikasi_admin(){
        $instansi = Instansi::All();
        $aplikasi_layanan_publik = Aplikasi::Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', '2021')->count();
        $aplikasi_administrasi_pemerintah = Aplikasi::Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', '2021')->count();
        $call_center = CallCenter::Where('tahun', '2021')->count();

        $pemberitahuan = Pemberitahuan::orderBy('created_at', 'desc')->limit(3)->get();
        

        return view('superadmin.monevaplikasi_admin', ['instansi' => $instansi, 'pemberitahuan' =>$pemberitahuan, 'aplikasi_layanan_publik' => $aplikasi_layanan_publik, 'aplikasi_administrasi_pemerintah' => $aplikasi_administrasi_pemerintah, 'call_center' => $call_center]);

    }

    public function datainstansi(){
        $instansi = Instansi::orderBy('nama_instansi', 'asc')->get();
        return view('superadmin.datainstansi', ['instansi' => $instansi]);
    }

    public function tahun(){
        $tahun = Tahun::orderBy('tahun', 'asc')->get();
        return view('superadmin.tahun', ['tahun' => $tahun]);
    }

    public function monitoring(){
    $instansi = Instansi::orderBy('nama_instansi', 'asc')->get();
    $tahun = \App\Models\Tahun::orderBy('tahun', 'asc')->get();
    return view('superadmin.monitoring', ['instansi' => $instansi, 'tahun' => $tahun]);
    }

    public function aplikasi(){
        $instansi = Instansi::orderBy('nama_instansi', 'asc')->get();
        $tahun = \App\Models\Tahun::orderBy('tahun', 'asc')->get();
        $pemberitahuan = Pemberitahuan::orderBy('created_at', 'desc')->limit(3)->get();
        return view('superadmin.aplikasi', ['instansi' => $instansi, 'tahun' => $tahun, 'pemberitahuan' => $pemberitahuan]);
    }

    public function dataopd(){
        $instansi1 = Instansi::WheredoesntHave('aplikasi', function($q){$q->Where('tahun', '2022'); })->get();
        $instansi2 = Instansi::WhereHas('aplikasi', function($q){ $q->Where('status', 'Pending')->Where('tahun', '2022'); })->get();
        $instansi3 = Instansi::WhereHas('aplikasi', function($q){ $q->Where('status', 'Terkirim')->Where('tahun', '2022'); })->get();
        return view('superadmin.dataopd', ['instansi1' => $instansi1, 'instansi2' => $instansi2, 'instansi3' => $instansi3]);
    }

    public function opdbeluminputaplikasi(){
        $tahun = request('tahun');
        $instansi1 = Instansi::WheredoesntHave('aplikasi', function($q){$q->Where('tahun', '2022'); })->get();
        return view('superadmin.opdbeluminputaplikasi', ['instansi1' => $instansi1]);
    }

    public function opdbelumkirim(){
        $instansi1 = $instansi1 = Instansi::doesntHave('aplikasi')->get();
        return view('superadmin.opdbelumkirim', ['instansi1' => $instansi1]);
    }

    public function opdbelumentridataexcel() 
    {
        $instansi1 = Instansi::doesntHave('aplikasi')->get();
        return Excel::download(new InstansibelumentriExport($instansi1), 'Instansi-belum-entri-data.xlsx');
    }

    public function opdbelumentridatapdf(){
        $instansi1 = Instansi::doesntHave('aplikasi')->get();
        $pdf = PDF::loadview('superadmin.tabelbelumkirimpdf',[
            'instansi1'=>$instansi1,
        ])->setPaper('f4', 'landscape');;
        return $pdf->download('laporan-instansi-belum-entridata.pdf');
    }

    public function opdpending(){
        $tahun = request('tahun');
        $instansi2 = Instansi::WhereHas('aplikasi', function($q){ $q->Where('status', 'Pending'); })->get();
        return view('superadmin.opdpending', ['instansi2' => $instansi2]);
    }

    public function opdterkirim(){
        $instansi3 = Instansi::WhereHas('aplikasi', function($q){ $q->Where('status', 'Terkirim'); })->get();
        return view('superadmin.opdterkirim', ['instansi3' => $instansi3]);
    }

    public function daftarindikator(){
    return view('superadmin.daftarindikator');
    }

    public function daftarurusanaplikasiadmpemerintah(){
        $urusanaplikasiadmpemerintah = Urusan::orderBy('nama_urusan', 'asc')->get();
        return view('superadmin.daftarurusanaplikasiadmpemerintah', ['urusanaplikasiadmpemerintah' => $urusanaplikasiadmpemerintah]);
    }

    public function create(){
        return view('urusanaplikasiadmpemerintah.create');
    }

    public function store(Request $request){
        \App\Models\Urusan::create([
            'id' => \Str::Random(8),
            'nama_urusan' => $request->nama_urusan,
        ]);
        return redirect('superadmin/daftarurusanaplikasiadmpemerintah')->with('success', 'Berhasil Menambah Data!');
    }

    public function edit(Urusan $urusanaplikasiadmpemerintah){
        return view('urusanaplikasiadmpemerintah.edit', ['urusanaplikasiadmpemerintah' => $urusanaplikasiadmpemerintah]);
    }

    public function update(Request $request, Urusan $urusanaplikasiadmpemerintah){
             $urusanaplikasiadmpemerintah->update([
                'nama_urusan' => $request->nama_urusan,
            ]);
       
        return redirect('superadmin/daftarurusanaplikasiadmpemerintah')->with('update', 'Berhasil Ubah Data!');
    }

    public function destroy(Request $request, Urusan $urusanaplikasiadmpemerintah){
        $urusanaplikasiadmpemerintah::destroy($urusanaplikasiadmpemerintah->id);
        return redirect('superadmin/daftarurusanaplikasiadmpemerintah')->with('delete', 'Berhasil Menghapus Data!');
    }

    public function daftarbidangurusanaplikasiadmpemerintah($urusan_id){
        $urusan_id = request('urusan_id');
        $bidangurusan1 = BidangUrusan::where('urusan_id', $urusan_id)->get();
        return view('superadmin.daftarbidangurusanaplikasiadmpemerintah', ['urusan_id' => $urusan_id, 'bidangurusan1' => $bidangurusan1]);
    }

    public function createbidangurusan($urusan_id){
        $urusan_id = request('urusan_id');
        $bidangurusan1 = BidangUrusan::where('urusan_id', $urusan_id)->first();

        return view('bidangurusanaplikasiadmpemerintah.create', ['urusan_id' => $urusan_id, 'bidangurusan1' => $bidangurusan1]);
    }

    public function simpanbidangurusan(Request $request){
        \App\Models\BidangUrusan::create([
            'id' => \Str::Random(8),
            'urusan_id' => $request->urusan_id,
            'nama_bidang_urusan' => $request->nama_bidang_urusan,
        ]);
        return redirect('superadmin/daftarbidangurusanaplikasiadmpemerintah/'.$request->urusan_id)->with('success', 'Berhasil Menambah Data!');
    }

    public function editbidangurusan(BidangUrusan $bidangurusan1){
        $urusanaplikasiadmpemerintah = Urusan::orderBy('nama_urusan', 'asc')->get();
        return view('bidangurusanaplikasiadmpemerintah.edit', ['bidangurusan1' => $bidangurusan1], ['urusanaplikasiadmpemerintah' => $urusanaplikasiadmpemerintah]);
    }

    public function updatebidangurusan(Request $request, BidangUrusan $bidangurusan1){
        $bidangurusan1->update([
            'urusan_id' => $request->urusan_id,
            'nama_bidang_urusan' => $request->nama_bidang_urusan,
        ]);
        return redirect('superadmin/daftarbidangurusanaplikasiadmpemerintah/'.$request->urusan_id)->with('update', 'Berhasil Mengubah Data!');
    }

    public function hapusbidangurusan(Request $request, BidangUrusan $bidangurusan1){
        $urusan_id = request('urusan_id');
        $bidangurusan1::destroy($bidangurusan1->id);
        return redirect('superadmin/daftarbidangurusanaplikasiadmpemerintah/'.$bidangurusan1->urusan_id)->with('delete', 'Berhasil Menghapus Data!');
    }

    public function berkas_aps() {
        $instansi_id = request('instansi_id');
        $instansi = Instansi::orderBy('nama_instansi', 'asc')->get();
        $tahun = Tahun::orderBy('tahun', 'asc')->get();
        return view('superadmin.berkas_aps', ['instansi_id' => $instansi_id, 'instansi' => $instansi, 'tahun' => $tahun]);
    }

    public function listberkas() {
        $instansi_id = request('instansi_id');
        $tahun = request('tahun');
        $listberkas = Berkas::where('instansi_id', $instansi_id)->where('tahun', $tahun)->get();
        return view('superadmin.listberkas', ['instansi_id' => $instansi_id, 'tahun' => $tahun, 'listberkas' => $listberkas]);
    }

    public function detail_berkas(Berkas $berkas) {

        $instansi_id = request('instansi_id');
        return view('superadmin.detail_berkas', ['berkas' =>$berkas, 'instansi_id' => $instansi_id]);
    }

    public function balikberkaskepengguna(Request $request, Berkas $berkas) {
        $berkas->update ([
            'posisi' => $request->posisi,
        ]);
        return redirect()->back()->with('update', 'Berhasil Memperbarui Data!');

    }
    
}
