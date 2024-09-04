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
        Schema::create('tabel_website', function(Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->string('instansi_id', 10)->nullable(true)->default('Kosong');
            $table->string('nama_website')->nullable(true)->default('Kosong');
            $table->longText('deskripsi_website')->nullable(true)->default('Kosong');
            $table->string('url')->nullable(true)->default('Kosong');
            $table->string('pengembang')->nullable(true)->default('Kosong');
            $table->string('tempat')->nullable(true)->default('Kosong');
            $table->string('rahasia')->nullable(true)->default('Kosong');
            $table->string('ramah_anak')->nullable(true)->default('Kosong');
            $table->string('nama_pic')->nullable(true)->default('Kosong');
            $table->string('jabatan_pic')->nullable(true)->default('Kosong');
            $table->string('kontak')->nullable(true)->default('Kosong');
            $table->string('tahun')->nullable(true)->default('Kosong');
            $table->string('status')->nullable(true)->default('Kosong');
            $table->string('verifikasi')->nullable(true)->default('Kosong');
            $table->string('catatan')->nullable(true)->default('Kosong');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_website');
    }
};
