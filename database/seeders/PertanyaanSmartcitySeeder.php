<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSmartcitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listPertanyaan = [
            [
                'id' => '0q8ug5Gh',
                'instansi_id' => 'itFy1L7e',
                'pertanyaan' => 'Apa Hewan Favoritmu ?'
            ]
        ];
        \DB::table('tabel_pertanyaan_smartcity')->insert($listPertanyaan);
    }
}
