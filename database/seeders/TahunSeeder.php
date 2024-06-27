<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listtahun = [
            [
                'id' => 'LPYsScb5',
                'tahun' => '2021',
            ],
            [
                'id' => 'YCf2DxEW',
                'tahun' => '2022',
            ],
            ['id' => 'ITflX9Uv',
                'tahun' => '2023',
            ],
            [
                'id' => '7x91Bm5W',
                'tahun' => '2024',
            ],
        ];
        \DB::table('tabel_tahun')->insert($listtahun);
    }
}
