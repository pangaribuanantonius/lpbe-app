<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listkecamatan = [
            [
                'id' => 'l2NLXVik',
                'nama_kecamatan' => 'Bangun Purba',
            ],
            [
                'id' => 'ilQcIgi6',
                'nama_kecamatan' => 'Batang Kuis',
            ],
            [
                'id' => 'Rr0EkW0r',
                'nama_kecamatan' => 'Beringin',
            ],
            [
                'id' => 'MMui0iFL',
                'nama_kecamatan' => 'Biru-biru',
            ],
            [
                'id' => 'vgjAPdLQ',
                'nama_kecamatan' => 'Deli Tua',
            ],
            [
                'id' => '1SFC4xr1',
                'nama_kecamatan' => 'Galanag',
            ],
            [
                'id' => 'TUC9Qe3J',
                'nama_kecamatan' => 'Gunung Meriah',
            ],
            [
                'id' => 'glORF1kL',
                'nama_kecamatan' => 'Hamparan Perak',
            ],
            [
                'id' => 'lITEocgO',
                'nama_kecamatan' => 'Kutalimbaru',
            ],
            [
                'id' => '9dat0mLM',
                'nama_kecamatan' => 'Labuhan Deli',
            ],
            [
                'id' => 'F71dwkvy',
                'nama_kecamatan' => 'Lubuk Pakam',
            ],
            [
                'id' => '2LwgmUX3',
                'nama_kecamatan' => 'Namorambe',
            ],
            [
                'id' => '0kJstAnj',
                'nama_kecamatan' => 'Pagar Merbau',
            ],
            [
                'id' => 'CKamU1Bc',
                'nama_kecamatan' => 'Pancur Batu',
            ],
            [
                'id' => 'yp2ykrxN',
                'nama_kecamatan' => 'Pantai Labu',
            ],
            [
                'id' => 'se9073z4',
                'nama_kecamatan' => 'Patumbak',
            ],
            [
                'id' => 'seJnBM6W',
                'nama_kecamatan' => 'Percut Sei Tuan',
            ],
            [
                'id' => '9UZCFC3w',
                'nama_kecamatan' => 'Sibolangit',
            ],
            [
                'id' => 'olfesA3Z',
                'nama_kecamatan' => 'STM Hilir',
            ],
            [
                'id' => 'zs7NXWML',
                'nama_kecamatan' => 'STM Hulu',
            ],
            [
                'id' => 'TBlWZdRw',
                'nama_kecamatan' => 'Sunggal',
            ],
            [
                'id' => 'cJTfrqI6',
                'nama_kecamatan' => 'Tanjung Morawa',
            ],

        ];
        \DB::table('tabel_kecamatan')->insert($listkecamatan);
    }
}
