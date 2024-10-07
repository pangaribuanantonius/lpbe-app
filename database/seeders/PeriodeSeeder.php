<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listlayanan = [
            [
                'id' => 'iUrZ2MDd',
                'nama_layanan' => 'aplikasi',
                'end_time' => '2024-10-02T23:59:59'
            ],
            [
                'id' => '4TlPzLbt',
                'nama_layanan' => 'smartcity',
                'end_time' => '2024-10-02T23:59:59'
            ],
            [
                'id' => 'WupKMALU',
                'nama_layanan' => 'spbe',
                'end_time' => '2024-10-02T23:59:59'
            ],
            [
                'id' => 'OEUkPoq6',
                'nama_layanan' => 'mediasosial',
                'end_time' => '2024-10-02T23:59:59'
            ],
        ];
        \DB::table('tabel_periode')->insert($listlayanan);
    }
}
