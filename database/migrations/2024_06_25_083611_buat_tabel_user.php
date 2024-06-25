<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tabel_user', function(Blueprint $table) {
            $table->string('id')->unique();
            $table->string('instansi_id', 10)->nullable(true)->default('kosong');
            $table->string('tandatangan_naskah_id', 10)->nullable(true)->default('kosong');
            $table->string('nama')->nullable(true)->default('kosong');
            $table->string('nip', '20')->nullable(true)->default('kosong');
            $table->string('jabatan')->nullable(true)->default('kosong');
            $table->string('level')->nullable(true)->default('kosong');
            $table->string('username')->nullable(true)->default('kosong');
            $table->string('password')->nullable(true)->default('kosong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_user');
    }
};
