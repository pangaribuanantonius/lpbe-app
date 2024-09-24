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
        Schema::create('tabel_jawaban_smartcity', function(Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->string('instansi_id', 10)->nullable(true)->default('Kosong');
            $table->string('pertanyaan_id', 10)->nullable(true)->default('Kosong');
            $table->string('jawaban')->nullable(true)->default('Kosong');
            $table->longText('catatan')->nullable(true);
            $table->string('file_dukung_1')->nullable(true)->default('Kosong');
            $table->string('file_dukung_2')->nullable(true)->default('Kosong');
            $table->string('file_dukung_3')->nullable(true)->default('Kosong');
            $table->string('tahun')->nullable(true)->default('Kosong');
            $table->string('status')->nullable(true)->default('kosong');
            $table->string('verifikasi')->nullable(true)->default('kosong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_jawaban_smartcity');
    }
};
