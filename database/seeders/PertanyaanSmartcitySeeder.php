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
                'id' => 'q91TVVhC',
                'instansi_id' => 'itFy1L7e',
                'pertanyaan' => 'Apa hewan Favoritmu ?'
            ],
            [
                'id' => 'LQRELUCT',
                'instansi_id' => 'itFy1L7e',
                'pertanyaan' => 'Apa makanan Favoritmu ?'
            ],
        ];
        \DB::table('tabel_pertanyaan_smartcity')->insert($listPertanyaan);
    }
}
