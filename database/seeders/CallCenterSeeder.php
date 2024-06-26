<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CallCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listcallcenter = [
            [
                 'id' => 'nsFmwxDw',
                 'instansi_id' => 'Kosong',
                 'nama_layanan' => 'Kosong',
                 'nomor_layanan' => 'Kosong',
                 'deskripsi_layanan' => 'Kosong',
                 'whatsapp' => 'Kosong',
                 'telepon' => 'Kosong',
                 'platform' => 'Kosong',
                 'sektorlayanan' => 'Kosong',
                 'sektorlainnya' => 'Kosong',
                 'nama_pic' => 'Kosong',
                 'jabatan_pic' => 'Kosong',
                 'kontak' => 'Kosong',
                 'Tahun' => '2000',
                 'Status' => 'Kosong',
            ],
            [
                'id' => 'oFLXFE1r',
                 'instansi_id' => 'Kosong',
                 'nama_layanan' => 'Kosong',
                 'nomor_layanan' => 'Kosong',
                 'deskripsi_layanan' => 'Kosong',
                 'whatsapp' => 'Kosong',
                 'telepon' => 'Kosong',
                 'platform' => 'Kosong',
                 'sektorlayanan' => 'Kosong',
                 'sektorlainnya' => 'Kosong',
                 'nama_pic' => 'Kosong',
                 'jabatan_pic' => 'Kosong',
                 'kontak' => 'Kosong',
                 'Tahun' => '2000',
                 'Status' => 'Kosong',
            ],
        ];
        \DB::table('tabel_callcenter')->insert($listcallcenter);
    }
}
