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
        Schema::create('tabel_periode', function(Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->string('nama_layanan')->nullable(true)->default('Kosong');
            $table->dateTime('end_time')->nullable(); // Menggunakan dateTime atau timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_periode');
    }
};
