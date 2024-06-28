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
        Schema::create('tabel_aplikasi', function(Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->string('instansi_id', 10)->nullable(true)->default('Kosong');
            $table->string('urusan_id', 10)->nullable(true)->default('Kosong');
            $table->string('bidang_urusan_id', 10)->nullable(true)->default('Kosong');
            $table->string('nama_aplikasi')->nullable(true)->default('Kosong');
            $table->string('jenis_aplikasi')->nullable(true)->default('Kosong');
            $table->string('kepemilikan')->nullable(true)->default('Kosong');
            $table->string('tahun_digunakan')->nullable(true)->default('Kosong');
            $table->longText('dasarhukum')->nullable(true);
            $table->string('tahun_pembuatan')->nullable(true)->default('Kosong');
            $table->string('launching')->nullable(true)->default('Kosong');
            $table->string('desktop')->nullable(true)->default('Kosong');
            $table->string('web')->nullable(true)->default('Kosong');
            $table->string('android')->nullable(true)->default('Kosong');
            $table->string('ios')->nullable(true)->default('Kosong');
            $table->string('platform')->nullable(true)->default('Kosong');
            $table->string('platform2')->nullable(true)->default('Kosong');
            $table->string('url')->nullable(true)->default('Kosong');
            $table->string('tempataplikasi')->nullable(true)->default('Kosong');
            $table->string('sektorpelayananpublik')->nullable(true)->default('Kosong');
            $table->string('sektorpelayananpublik2')->nullable(true)->default('Kosong');
            $table->longText('deskripsi')->nullable(true);
            $table->longText('daftarlayanan')->nullable(true);
            $table->longText('daftarproduklayanan')->nullable(true);
            $table->string('pengguna')->nullable(true)->default('Kosong');
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
        Schema::dropIfExists('tabel_aplikasi');
    }
};
