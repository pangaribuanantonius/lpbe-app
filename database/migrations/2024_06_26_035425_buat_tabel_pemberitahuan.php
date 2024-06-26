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
        Schema::create('tabel_pemberitahuan', function(Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->string('bidang_urusan_id', 10)->nullable(true)->default('Kosong');
            $table->string('nama_aplikasi')->nullable(true)->default('Kosong');
            $table->string('kepemilikan')->nullable(true)->default('Kosong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_pemberitahuan');
    }
};
