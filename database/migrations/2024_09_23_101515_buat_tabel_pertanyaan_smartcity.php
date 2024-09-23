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
        Schema::create('tabel_pertanyaan_smartcity', function(Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->string('instansi_id', 10)->nullable(true)->default('Kosong');
            $table->longText('pertanyaan')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_pertanyaan_smartcity');
    }
};
