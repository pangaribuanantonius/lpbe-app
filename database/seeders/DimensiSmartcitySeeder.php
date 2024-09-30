<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DimensiSmartcitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listdimensi = [
            [
                'id' => 'fcnoIREe',
                'nama_dimensi' => 'Smart Governance'
            ],
            [
                'id' => 'e99K36Hi',
                'nama_dimensi' => 'Smart Branding'
            ],
            [
                'id' => 'rL0TxVJL',
                'nama_dimensi' => 'Smart Economy'
            ],
            [
                'id' => 'B7aSUxFk',
                'nama_dimensi' => 'Smart Living'
            ],
            [
                'id' => 'NOCQw7WD',
                'nama_dimensi' => 'Smart Society'
            ],
            [
                'id' => 'I4oopnWH',
                'nama_dimensi' => 'Smart Environment'
            ],
        ];
        \DB::table('tabel_dimensi_smartcity')->insert($listdimensi);
    }
}
