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
                'instansi_id_1' => 'Kosong',
                'instansi_id_2' => 'Kosong',
                'instansi_id_3' => 'Kosong',
                'instansi_id_4' => 'Kosong',
                'instansi_id_5' => 'Kosong',
                'pertanyaan' => 'Apa hewan Favoritmu ?',
                'pilihan1' => 'Anjing',
                'pilihan2' => 'Kucing',
                'pilihan3' => 'Kelinci',
                'pilihan4' => 'Hamster',
            ],
            [
                'id' => 'LQRELUCT',
                'instansi_id_1' => 'Kosong',
                'instansi_id_2' => 'Kosong',
                'instansi_id_3' => 'Kosong',
                'instansi_id_4' => 'Kosong',
                'instansi_id_5' => 'Kosong',
                'pertanyaan' => 'Apa makanan Favoritmu ?',
                'pilihan1' => 'Telur',
                'pilihan2' => 'Mie Instan',
                'pilihan3' => 'Ikan',
                'pilihan4' => 'Tidak ada satupun yang benar',
            ],
        ];
        \DB::table('tabel_pertanyaan_smartcity')->insert($listPertanyaan);
    }
}
