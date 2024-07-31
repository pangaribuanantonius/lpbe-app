<?php

namespace App\Http\Controllers;
use App\Models\CallCenter;
use App\Models\Instansi;
use App\Models\Penandatanganan;
use App\Exports\LaporanTerkirimCallCenter2021Export;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\User;

use TCPDF;
use View;

use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\Carbon;

class CallCenter2021Controller extends Controller
{
    public function create(){
        $layanan = request('layanan');
        $tahun = request('tahun');
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        return view('call_center.2021.create', ['nama_instansi' => $nama_instansi]);
    }

    public function store(Request $request){
            \App\Models\CallCenter::create([
                'id' => \Str::random(8),
                'tahun' => $request->tahun,
                'instansi_id' => $request->instansi_id,
                'nama_layanan' => $request->nama_layanan,
                'nomor_layanan' => $request->nomor_layanan,
                'deskripsi_layanan' => $request->deskripsi_layanan,
                'whatsapp' => $request->whatsapp,
                'telepon' => $request->telepon,
                /*'platform' => implode(',', $request->platform),*/
                'platform' => $request->platform,
                'sektorlayanan' => $request->sektorlayanan,
                'sektorlainnya' => $request->sektorlainnya,
                'nama_pic' => $request->nama_pic,
                'jabatan_pic' => $request->jabatan_pic,
                'kontak' => $request->kontak,
                'status' => 'Sedang Proses',
            ]);
       
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=call_center&tahun='.request('tahun').'')->with('success', 'Berhasil Menambah Data!');
    }

    public function edit(CallCenter $call_center){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        return view('call_center.2021.edit', ['call_center' => $call_center, 'nama_instansi' => $nama_instansi]);
    }

    public function update(Request $request, CallCenter $call_center){
             $call_center->update([
                'tahun' => $request->tahun,
                'instansi_id' => $request->instansi_id,
                'nama_layanan' => $request->nama_layanan,
                'nomor_layanan' => $request->nomor_layanan,
                'deskripsi_layanan' => $request->deskripsi_layanan,
                'whatsapp' => $request->whatsapp,
                'telepon' => $request->telepon,
                /*'platform' => implode(',', $request->platform),*/
                'platform' => $request->platform,
                'sektorlayanan' => $request->sektorlayanan,
                'sektorlainnya' => $request->sektorlainnya,
                'nama_pic' => $request->nama_pic,
                'jabatan_pic' => $request->jabatan_pic,
                'kontak' => $request->kontak,
            ]);
       
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=call_center&tahun='.request('tahun'))->with('update', 'Berhasil Ubah Data!');
    }

    public function destroy(Request $request, CallCenter $call_center){
        $call_center::destroy($call_center->id);
        /*return redirect('info/index')->with(['flashdata' => 'Berhasil']);*/
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=call_center&tahun='.request('tahun'))->with('delete', 'Berhasil Menghapus Data!');
    }

    public function updatestatuscallcenter(Request $request){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $tahun = request('tahun');
        \App\Models\CallCenter::Where('instansi_id', $instansi_id)->Where('tahun', '2021')->update([
            'status' => 'Final',
        ]);
         return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=call_center&tahun=2021')->with('updatestatus', 'Berhasil Memperbarui Data!');
    }

    public function cetakcallcenterpdf_2021(){

        $tahun = request('tahun');
        $statuss = \App\Models\Aplikasi::first();
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $call_center = \App\Models\CallCenter::Where('instansi_id', $instansi_id)->Where('tahun', '2021')->Where('status', 'Final')->Where('verifikasi', 'Disetujui')->get();
        $hitung_call_center = \App\Models\CallCenter::Where('instansi_id', $instansi_id)->Where('tahun', '2021')->Where('status', 'Final')->Where('verifikasi', 'Disetujui')->count();
        $penandatanganan = \App\Models\Penandatanganan::Where('instansi_id', $instansi_id)->first();


        $html = View::make('call_center.2021.cetaklaporanpdf', ['call_center'=>$call_center, 'hitung_call_center'=>$hitung_call_center, 'penandatanganan'=>$penandatanganan, 'nama_instansi'=>$nama_instansi])->render();

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
        $pdf->SetTitle('Layanan Call Center');
        $pdf->SetSubject('Subjek Dokumen PDF');
        $pdf->SetKeywords('TCPDF, PDF, Laravel');

        // Setel margin
        $pdf->SetMargins(10, 10, 10);

        // Tambahkan halaman dengan orientasi landscape
        $pdf->AddPage('L');

        // Tulis konten HTML yang dirender ke PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Tutup dan tampilkan PDF
        $pdf->Output('Lap. Layanan Call Center.pdf', 'I');

    }


    public function laporanterkirimcallcenterexcel2021(){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $call_center = CallCenter::Where('instansi_id', $instansi_id)->Where('tahun', '2021')->Where('status', 'Final')->get();
        /*return view('aplikasi.2021.laporanterkirimaplikasipublikexcel2021', ['aplikasi' => $aplikasi]);*/
        return Excel::download(new LaporanTerkirimCallCenter2021Export($call_center), 'laporan-call-center-2021.xlsx');
        
    }

    public function finalisasinihil(Request $request){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $tahun = request('tahun');
        \App\Models\CallCenter::create([
            'id' => \Str::random(8),
            'instansi_id' => $request->instansi_id,
            'nama_layanan' => $request->nama_layanan,
            'nomor_layanan' => $request->nomor_layanan,
            'deskripsi_layanan' => $request->deskripsi_layanan,
            'whatsapp' => $request->whatsapp,
            'telepon' => $request->telepon,
            'platform' => $request->platform,
            'sektorlayanan' => $request->sektorlayanan,
            'sektorlainnya' => $request->sektorlainnya,
            'nama_pic' => $request->nama_pic,
            'jabatan_pic' => $request->jabatan_pic,
            'kontak' => $request->kontak,
            'status' => $request->status,
            'verifikasi' => $request->verifikasi,
            'catatan' => $request->catatan,
            'tahun' => $request->tahun,
        ]);
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=call_center&tahun='.request('tahun').'')->with('updatestatus', 'Berhasil Menambah Data!');
    }

    public function exportexcel()
    {
        $tahun = request('tahun');
        $user = User::where('username', session('username'))->first();
        $instansi_id = $user->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;

        // Ambil data aplikasi berdasarkan kondisi tertentu
        $call_center = CallCenter::where('instansi_id', $instansi_id)
                            ->where('tahun', '2021')
                            ->where('status', 'Final')
                            ->where('verifikasi', 'Disetujui')
                            ->get();

        // Hitung jumlah aplikasi
        $hitung_call_center = CallCenter::where('instansi_id', $instansi_id)
                                   ->where('tahun', '2021')
                                   ->where('status', 'Final')
                                   ->where('verifikasi', 'Disetujui')
                                   ->count();

        // Ambil data penandatanganan
        $penandatanganan = Penandatanganan::where('instansi_id', $instansi_id)->first();

        // Menampilkan view dengan data
        $html = View::make('call_center.2021.cetaklaporanexcel', [
            'call_center' => $call_center,
            'hitung_call_center' => $hitung_call_center,
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
        $fileName = 'Layanan Call Center' . ' ' . $nama_instansi . ' ' . $tanggalSekarang . '.xlsx';
        $response = new StreamedResponse(function() use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $fileName . '"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }

}
