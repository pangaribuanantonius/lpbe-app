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
                'password' => '$2y$10$KV0PI8cibKb4W93aCIsC8uR6y6LnK07XOJmtOeHc5j5n0i3rOf.9G',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];
        \DB::table('tabel_user')->insert($listuser);
    }
}
