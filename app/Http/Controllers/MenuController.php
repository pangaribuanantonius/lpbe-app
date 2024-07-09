<?php

namespace App\Http\Controllers;
use App\Models\Aplikasi;
use App\Models\CallCenter;
use App\Models\Spbe;
use App\Models\Penandatanganan;
use App\Models\Berkas;
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

    /*public function kirimberkas(Request $request){
        $datasudahvalidasi = $request->validate([
            'file_aps_publik' => 'file|mimes:pdf|max:4096',
            'file_aps_pemerintah' => 'file|mimes:pdf|max:4096',
            'file_call_center' => 'file|mimes:pdf|max:4096',
        ]);
            $extFile = $request->file_aps_publik->getClientOriginalExtension();
            $extFile = $request->file_aps_pemerintah->getClientOriginalExtension();
            $extFile = $request->file_call_center->getClientOriginalExtension();
            $namaFile = time()." Layanan Publik.".$extFile;
            $namaFile2 = time()." Layanan Administrasi Pemerintahan.".$extFile;
            $namaFile3 = time()." Layanan Call Center.".$extFile;

            $request->file_aps_publik->move('konten/berkas', $namaFile);
            $request->file_aps_pemerintah->move('konten/berkas', $namaFile2);
            $request->file_call_center->move('konten/berkas', $namaFile3);
            \App\Models\Berkas::create([
                'id' => \Str::random(8),
                'instansi_id' => $request->instansi_id,
                'tahun' => $request->tahun,
                'nama' => $request->nama,
                'tahun' => $request->tahun,
                'file_aps_publik' => $datasudahvalidasi->$namaFile,
                'file_aps_pemerintah' => $datasudahvalidasi->$namaFile2,
                'file_call_center' => $datasudahvalidasi->$namaFile3,
            ]);
        return redirect()->back()->with('success', 'Berhasil Menambah Data!');
    }*/

    public function kirimberkas(Request $request)
    {
        // Validasi file yang diunggah
        $validatedData = $request->validate([
            'file_aps_publik' => 'required|file|mimes:pdf|max:10000', // max:10000 artinya maksimal 10MB
            'file_aps_pemerintah' => 'required|file|mimes:pdf|max:10000',
            'file_call_center' => 'required|file|mimes:pdf|max:10000',
        ]);

        // Mendapatkan ekstensi file dan membuat nama file unik dengan timestamp
        $namaFile1 = time() . ' Layanan Publik.' . $request->file_aps_publik->getClientOriginalExtension();
        $namaFile2 = time() . ' Layanan Administrasi Pemerintahan.' . $request->file_aps_pemerintah->getClientOriginalExtension();
        $namaFile3 = time() . ' Layanan Call Center.' . $request->file_call_center->getClientOriginalExtension();

        // Memindahkan file ke direktori yang diinginkan
        $request->file_aps_publik->move('konten/berkas', $namaFile1);
        $request->file_aps_pemerintah->move('konten/berkas', $namaFile2);
        $request->file_call_center->move('konten/berkas', $namaFile3);

        // Menyimpan data ke database
        \App\Models\Berkas::create([
            'id' => \Str::random(8),
            'instansi_id' => $request->instansi_id,
            'tahun' => $request->tahun,
            'nama' => $request->nama,
            'file_aps_publik' => $namaFile1,
            'file_aps_pemerintah' => $namaFile2,
            'file_call_center' => $namaFile3,
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambah Data!');
    }

    public function berkas() {
        $berkas = Berkas::orderBy('created_at', 'desc')->get();
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        return view('menu.berkas', ['berkas' => $berkas, 'nama_instansi' => $nama_instansi]);
    }


    public function detail_berkas(Berkas $berkas) {
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        return view('menu.detail_berkas', ['berkas' => $berkas, 'nama_instansi' => $nama_instansi]);
    }

    public function edit_berkas(Berkas $berkas) {
        return view('menu.edit_berkas', ['berkas' => $berkas]);
    }

    public function updateberkas(Request $request, Berkas $berkas)
{
    // Validasi input
    $datasudahvalidasi = $request->validate([
        'file_aps_publik' => 'file|mimes:pdf|max:10000|nullable',
        'file_aps_pemerintah' => 'file|mimes:pdf|max:10000|nullable',
        'file_call_center' => 'file|mimes:pdf|max:10000|nullable',
    ]);

    // Proses file file_aps_publik jika ada
    if ($request->hasFile('file_aps_publik')) {
        // Hapus file lama jika ada
        if ($berkas->file_aps_publik) {
            unlink(public_path('konten/berkas/' . $berkas->file_aps_publik));
        }
        // Upload file baru
        $extFile1 = $request->file_aps_publik->getClientOriginalExtension();
        $namaFile1 = time() . " Layanan Publik." . $extFile1;
        $request->file_aps_publik->move('konten/berkas', $namaFile1);
        $berkas->file_aps_publik = $namaFile1;
    }

    // Proses file file_aps_pemerintah jika ada
    if ($request->hasFile('file_aps_pemerintah')) {
        // Hapus file lama jika ada
        if ($berkas->file_aps_pemerintah) {
            unlink(public_path('konten/berkas/' . $berkas->file_aps_pemerintah));
        }
        // Upload file baru
        $extFile2 = $request->file_aps_pemerintah->getClientOriginalExtension();
        $namaFile2 = time() . " Layanan Administrasi Pemerintahan." . $extFile2;
        $request->file_aps_pemerintah->move('konten/berkas', $namaFile2);
        $berkas->file_aps_pemerintah = $namaFile2;
    }

    // Proses file file_call_center jika ada
    if ($request->hasFile('file_call_center')) {
        // Hapus file lama jika ada
        if ($berkas->file_call_center) {
            unlink(public_path('konten/berkas/' . $berkas->file_call_center));
        }
        // Upload file baru
        $extFile3 = $request->file_call_center->getClientOriginalExtension();
        $namaFile3 = time() . " Layanan Call Center." . $extFile3;
        $request->file_call_center->move('konten/berkas', $namaFile3);
        $berkas->file_call_center = $namaFile3;
    }

    // Update data lainnya
    $berkas->save();

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Berhasil Memperbarui Data!');
}




}
