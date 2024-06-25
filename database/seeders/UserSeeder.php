<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listuser = [
            [
                'id' => '3kE5HIFk',
                'instansi_id' => null,
                'tandatangan_naskah_id' => null,
                'nama' => 'Admin',
                'nip' => '124324536',
                'jabatan' => 'Super Admin',
                'level' => 'Super Admin',
                'username' => 'admin',
                'password' => '$2y$10$nsUDjIMXhINVCrAg1Cf.7uh0uE8pTPGcP72JgY0Dag419rEPKN4D.',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];
        \DB::table('tabel_user')->insert($listuser);
    }
}
