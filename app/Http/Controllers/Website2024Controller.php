<?php

namespace App\Http\Controllers;

use App\Models\Website; 
use App\Models\User;
use App\Models\Instansi;
use App\Models\Penandatanganan; 
use PDF;
use TCPDF;
use View;
use App\Exports\TesExport;
use App\Exports\LaporanTerkirimAplikasi2024Export;
use App\Exports\LaporanTerkirimAplikasi2024AdmPemerintahExport;
use App\Exports\InstansiBelumInputAplikasi2024Export;
use App\Exports\InstansiStatusPendingAplikasi2024Export;
use App\Exports\InstansiStatusTerkirimAplikasi2024Export;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\Carbon;

class Website2024Controller extends Controller
{
    public function create(){
        $layanan = request('layanan');
        $tahun = request('tahun');
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        return view('website.2024.create', ['nama_instansi' => $nama_instansi]);
    }

    public function store(Request $request){
        \App\Models\Website::create([
            'id' => \Str::random(8),
            'tahun' => $request->tahun,
            'instansi_id' => $request->instansi_id,
            'nama_website' => $request->nama_website,
            'deskripsi_website' => $request->deskripsi_website,
            'url' => $request->url,
            'pengembang' => $request->pengembang,
            'tempat' => $request->tempat,
            'rahasia' => $request->rahasia,
            'ramah_anak' => $request->ramah_anak,
            'nama_pic' => $request->nama_pic,
            'jabatan_pic' => $request->jabatan_pic,
            'kontak' => $request->kontak,
            'status' => 'Sedang Proses',
        ]);
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=website&tahun='.request('tahun').'')->with('success', 'Berhasil Menambah Data!');
    }

    public function edit(Website $website){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        return view('website.2024.edit', ['website' => $website, 'nama_instansi' => $nama_instansi]);
    }

    public function update(Request $request, Website $website){
        $website->update([
            'tahun' => $request->tahun,
            'nama_website' => $request->nama_website,
            'deskripsi_website' => $request->deskripsi_website,
            'url' => $request->url,
            'pengembang' => $request->pengembang,
            'tempat' => $request->tempat,
            'rahasia' => $request->rahasia,
            'ramah_anak' => $request->ramah_anak,
            'nama_pic' => $request->nama_pic,
            'jabatan_pic' => $request->jabatan_pic,
            'kontak' => $request->kontak,
            'status' => 'Sedang Proses',
        ]);
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=website&tahun='.request('tahun').'')->with('success', 'Berhasil Menambah Data!');
    }

    public function destroy(Request $request, Website $website){
        $website::destroy($website->id);
        /*return redirect('info/index')->with(['flashdata' => 'Berhasil']);*/
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=website&tahun='.request('tahun'))->with('delete', 'Berhasil Menghapus Data!');
    }

    public function updatefinal(Request $request){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $tahun = request('tahun');
        \App\Models\Website::Where('instansi_id', $instansi_id)->Where('tahun', '2024')->update([
            'status' => 'Final',
        ]);
         return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=website&tahun=2024')->with('updatestatus', 'Berhasil Memperbarui Data!');
    }

    public function finalisasinihil(Request $request){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $tahun = request('tahun');
        \App\Models\Website::create([
            'id' => \Str::random(8),
            'tahun' => $request->tahun,
            'instansi_id' => $request->instansi_id,
            'nama_website' => $request->nama_website,
            'deskripsi_website' => $request->deskripsi_website,
            'url' => $request->url,
            'pengembang' => $request->pengembang,
            'tempat' => $request->tempat,
            'rahasia' => $request->rahasia,
            'ramah_anak' => $request->ramah_anak,
            'nama_pic' => $request->nama_pic,
            'jabatan_pic' => $request->jabatan_pic,
            'kontak' => $request->kontak,
            'status' => $request->status
        ]);
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=website&tahun='.request('tahun').'')->with('updatestatus', 'Berhasil Menambah Data!');
    }

    public function cetakwebsitepdf_2024(){

        $tahun = request('tahun');
        $statuss = \App\Models\Aplikasi::first();
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $website = \App\Models\Website::Where('instansi_id', $instansi_id)->Where('tahun', '2024')->Where('status', 'Final')->Where('verifikasi', 'Disetujui')->get();
        $hitung_website = \App\Models\Website::Where('instansi_id', $instansi_id)->Where('tahun', '2024')->Where('status', 'Final')->Where('verifikasi', 'Disetujui')->count();
        $penandatanganan = \App\Models\Penandatanganan::Where('instansi_id', $instansi_id)->first();


        $html = View::make('website.2024.cetaklaporanpdf', ['website'=>$website, 'hitung_website'=>$hitung_website, 'penandatanganan'=>$penandatanganan, 'nama_instansi'=>$nama_instansi])->render();

       // Ukuran kertas F4 dalam milimeter
        $f4 = [210, 330];

        // Buat instance TCPDF dengan ukuran kertas F4 dan orientasi landscape
        $pdf = new TCPDF('L', 'mm', $f4, true, 'UTF-8', false);

        // Menonaktifkan header dan footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Setel informasi dokumen
       /* $pdf->SetCreator(PDF_CREATOR);*/
        /*$pdf->SetAuthor('Nama Anda');*/
        $pdf->SetTitle('Layanan Website');
        $pdf->SetSubject('Subjek Dokumen PDF');
        $pdf->SetKeywords('TCPDF, PDF, Laravel');

        // Setel margin
        $pdf->SetMargins(10, 10, 10);

        // Tambahkan halaman dengan orientasi landscape
        $pdf->AddPage('L');

        // Tulis konten HTML yang dirender ke PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Tutup dan tampilkan PDF
        $pdf->Output('Lap. Website 2024.pdf', 'I');

    }

    public function exportexcel()
    {
        $tahun = request('tahun');
        $user = User::where('username', session('username'))->first();
        $instansi_id = $user->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;

        // Ambil data aplikasi berdasarkan kondisi tertentu
        $website = Website::where('instansi_id', $instansi_id)
                            ->where('tahun', '2024')
                            ->where('status', 'Final')
                            ->where('verifikasi', 'Disetujui')
                            ->get();

        // Hitung jumlah aplikasi
        $hitung_website = Website::where('instansi_id', $instansi_id)
                                   ->where('tahun', '2024')
                                   ->where('status', 'Final')
                                   ->where('verifikasi', 'Disetujui')
                                   ->count();

        // Ambil data penandatanganan
        $penandatanganan = Penandatanganan::where('instansi_id', $instansi_id)->first();

        // Menampilkan view dengan data
        $html = View::make('website.2024.cetaklaporanexcel', [
            'website' => $website,
            'hitung_website' => $hitung_website,
            'penandatanganan' => $penandatanganan,
            'nama_instansi' => $nama_instansi
        ])->render();

        // Membuat Spreadsheet dari HTML
        $spreadsheet = new Spreadsheet();
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Html');
        $spreadsheet = $reader->loadFromString($html);
        

        // Buat writer untuk file Excel
        $writer = new Xlsx($spreadsheet);

        // Mengatur nama file dan tipe konten
        $tanggalSekarang = Carbon::now()->format('d_m_Y');
        $fileName = 'Layanan Website' . ' ' . $nama_instansi . ' ' . $tanggalSekarang . '.xlsx';
        $response = new StreamedResponse(function() use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $fileName . '"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }


}
