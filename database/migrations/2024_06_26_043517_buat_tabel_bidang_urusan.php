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
        Schema::create('tabel_bidang_urusan', function(Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->string('urusan_id', 10)->nullable(true)->default('Kosong');
            $table->string('nama_bidang_urusan')->nullable(true)->default('Kosong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_bidang_urusan');
    }
};
