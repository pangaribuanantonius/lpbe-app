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
            $table->string('instansi_id_1', 10)->nullable(true)->default('Kosong');
            $table->string('instansi_id_2', 10)->nullable(true)->default('Kosong');
            $table->string('instansi_id_3', 10)->nullable(true)->default('Kosong');
            $table->string('instansi_id_4', 10)->nullable(true)->default('Kosong');
            $table->string('instansi_id_5', 10)->nullable(true)->default('Kosong');
            $table->string('no_urut', 10)->nullable(true)->default('Kosong');
            $table->longText('pertanyaan')->nullable(true);
            $table->string('pilihan1')->nullable(true);
            $table->string('pilihan2')->nullable(true);
            $table->string('pilihan3')->nullable(true);
            $table->string('pilihan4')->nullable(true);
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
