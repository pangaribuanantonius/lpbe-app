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
        Schema::create('tabel_callcenter', function(Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->string('instansi_id', 10)->nullable(true)->default('Kosong');
            $table->string('nama_layanan')->nullable(true)->default('Kosong');
            $table->string('nomor_layanan', 13)->nullable(true)->default('Kosong');
            $table->string('deskripsi_layanan')->nullable(true)->default('Kosong');
            $table->string('whatsapp')->nullable(true)->default('Kosong');
            $table->string('telepon')->nullable(true)->default('Kosong');
            $table->string('platform')->nullable(true)->default('Kosong');
            $table->string('sektorlayanan')->nullable(true)->default('Kosong');
            $table->string('sektorlainnya')->nullable(true)->default('Kosong');
            $table->string('nama_pic')->nullable(true)->default('Kosong');
            $table->string('jabatan_pic')->nullable(true)->default('Kosong');
            $table->string('kontak')->nullable(true)->default('Kosong');
            $table->string('tahun')->nullable(true)->default('Kosong');
            $table->string('status')->nullable(true)->default('Kosong');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_callcenter');
    }
};
