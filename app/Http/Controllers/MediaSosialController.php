<?php

namespace App\Http\Controllers;
use App\Models\MediaSosial;
use App\Models\Instansi;
use App\Models\Penandatanganan;
use PDF;
use TCPDF;
use View;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MediaSosialController extends Controller
{
    public function index() {
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $media_sosial = MediaSosial::where('instansi_id', $instansi_id)->first();
        $hitung_media_sosial = \App\Models\MediaSosial::Where('instansi_id', $instansi_id)->count();
        $penandatanganan = Penandatanganan:: where('instansi_id', $instansi_id)->count();

        return view('media_sosial.index', ['nama_instansi' => $nama_instansi, 'media_sosial' => $media_sosial, 'hitung_media_sosial' => $hitung_media_sosial, 'penandatanganan' => $penandatanganan]);
    }

    public function create() {
        return view('media_sosial.create');
    }

    public function store(Request $request) {
        \App\Models\MediaSosial::create([
            'id' => \Str::random(8),
            'instansi_id' => $request->instansi_id,
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
            'link_twitter' => $request->link_twitter,
            'link_youtube' => $request->link_youtube,
            'link_tiktok' => $request->link_tiktok,
            'link_threads' => $request->link_threads,
        ]);
        return redirect('media_sosial/index')->with('success', 'Berhasil Menambah Data!');
    }

    public function edit(MediaSosial $media_sosial){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $media_sosial = MediaSosial::where('instansi_id', $instansi_id)->first();
        return view('media_sosial.edit', ['media_sosial' => $media_sosial, 'instansi_id' => $instansi_id]);
    }

    public function update(Request $request, MediaSosial $media_sosial){
        $media_sosial->update([
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
            'link_twitter' => $request->link_twitter,
            'link_youtube' => $request->link_youtube,
            'link_tiktok' => $request->link_tiktok,
            'link_threads' => $request->link_threads,
        ]);
        return redirect('media_sosial/index')->with('update', 'Berhasil Mengubah Data!');
    }

    public function exportpdf(){

        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $media_sosial = MediaSosial::where('instansi_id', $instansi_id)->first();
        $hitung_media_sosial = \App\Models\MediaSosial::Where('instansi_id', $instansi_id)->count();
        $penandatanganan = \App\Models\Penandatanganan::Where('instansi_id', $instansi_id)->first();


        $html = View::make('media_sosial.cetakpdf', ['nama_instansi' => $nama_instansi, 'media_sosial' => $media_sosial, 'hitung_media_sosial' => $hitung_media_sosial, 'penandatanganan' => $penandatanganan])->render();

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
        $pdf->SetTitle('Media Sosial');
        $pdf->SetSubject('Subjek Dokumen PDF');
        $pdf->SetKeywords('TCPDF, PDF, Laravel');

        // Setel margin
        $pdf->SetMargins(10, 10, 10);

        // Tambahkan halaman dengan orientasi landscape
        $pdf->AddPage('L');

        // Tulis konten HTML yang dirender ke PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Tutup dan tampilkan PDF
        $pdf->Output('Lampiran Media Sosial.pdf', 'I');

    }

    public function exportexcel()
    {
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $media_sosial = MediaSosial::where('instansi_id', $instansi_id)->first();
        $hitung_media_sosial = \App\Models\MediaSosial::Where('instansi_id', $instansi_id)->count();
        $penandatanganan = Penandatanganan:: where('instansi_id', $instansi_id)->first();

        // Menampilkan view dengan data
        $html = View::make('media_sosial.cetakexcel', [
            'nama_instansi' => $nama_instansi,
            'media_sosial' => $media_sosial,
            'hitung_media_sosial' => $hitung_media_sosial,
            'penandatanganan' => $penandatanganan,
        ])->render();

        // Membuat Spreadsheet dari HTML
        $spreadsheet = new Spreadsheet();
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Html');
        $spreadsheet = $reader->loadFromString($html);
        

        // Buat writer untuk file Excel
        $writer = new Xlsx($spreadsheet);

        // Mengatur nama file dan tipe konten
        $tanggalSekarang = Carbon::now()->format('d_m_Y');
        $fileName = 'Lampiran Media Sosial' . ' ' . $nama_instansi . ' ' . $tanggalSekarang . '.xlsx';
        $response = new StreamedResponse(function() use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $fileName . '"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }
}
