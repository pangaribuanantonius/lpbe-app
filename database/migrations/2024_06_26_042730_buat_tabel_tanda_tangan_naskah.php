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
        Schema::create('tabel_tanda_tangan_naskah', function(Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->string('user_id', 10)->nullable(true)->default('Kosong');
            $table->string('kecamatan_id', 10)->nullable(true)->default('Kosong');
            $table->string('instansi_id', 10)->nullable(true)->default('Kosong');
            $table->string('nama')->nullable(true)->default('Kosong');
            $table->string('nip')->nullable(true)->default('Kosong');
            $table->string('jabatan')->nullable(true)->default('Kosong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_tanda_tangan_naskah');
    }
};
