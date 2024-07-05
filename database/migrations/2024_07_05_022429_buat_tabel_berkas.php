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
        Schema::create('tabel_berkas', function(Blueprint $table){
            $table->string('id')->unique();
            $table->string('instansi_id', 10)->nullable(true)->default('Kosong');
            $table->string('tahun')->nullable(true)->default('Kosong');
            $table->string('nama')->nullable(true)->default('Kosong');
            $table->string('file_aps_publik')->nullable(true)->default('Kosong');
            $table->string('file_aps_pemerintah')->nullable(true)->default('Kosong');
            $table->string('file_call_center')->nullable(true)->default('Kosong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('tabel_berkas');
    }
};
