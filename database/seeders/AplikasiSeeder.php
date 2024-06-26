<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AplikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listaplikasi = [
            [
                'id' => 'rUiLbk8w',
                'instansi_id' => 'Kosong',
                'urusan_id' => 'Kosong',
                'bidang_urusan_id' => 'Kosong',
                'nama_aplikasi' => 'Test',
                'kepemilikan' => 'Kosong',
                'tahun_digunakan' => '2000',
                'dasarhukum' => 'Kosong',
                'tahun_pembuatan' => '2000',
                'launching' => 'Kosonng',
                'desktop' => 'Kosong',
                'web' => 'Kosong',
                'android' => 'Kosong',
                'ios' => 'Kosong',
                'platform' => 'Kosong',
                'platform2' => 'Kosong',
                'url' => 'https://portal.deliserdangkab.go.id',
                'tempataplikasi' => 'Kosong',
                'sektorpelayananpublik' => 'Kosong',
                'deskripsi' => 'Kosong',
                'daftarlayanan' => 'Kosong',
                'daftarlayanan' => 'Kosong',
                'pengguna' => 'Kosong',
                'nama_pic' => 'Kosong',
                'jabatan_pic' => 'Kosong',
                'kontak' => 'Kosong',
                'tahun' => 'Kosong',
                'status' => 'Kosong', 
            ],
            [
                'id' => 'ewffd9kZ',
                'instansi_id' => 'Kosong',
                'urusan_id' => 'Kosong',
                'bidang_urusan_id' => 'Kosong',
                'nama_aplikasi' => 'Test',
                'kepemilikan' => 'Kosong',
                'tahun_digunakan' => '2000',
                'dasarhukum' => 'Kosong',
                'tahun_pembuatan' => '2000',
                'launching' => 'Kosonng',
                'desktop' => 'Kosong',
                'web' => 'Kosong',
                'android' => 'Kosong',
                'ios' => 'Kosong',
                'platform' => 'Kosong',
                'platform2' => 'Kosong',
                'url' => 'https://portal.deliserdangkab.go.id',
                'tempataplikasi' => 'Kosong',
                'sektorpelayananpublik' => 'Kosong',
                'deskripsi' => 'Kosong',
                'daftarlayanan' => 'Kosong',
                'daftarlayanan' => 'Kosong',
                'pengguna' => 'Kosong',
                'nama_pic' => 'Kosong',
                'jabatan_pic' => 'Kosong',
                'kontak' => 'Kosong',
                'tahun' => 'Kosong',
                'status' => 'Kosong',
            ],
        ];
        \DB::table('tabel_aplikasi')->insert($listaplikasi);
    }
}
