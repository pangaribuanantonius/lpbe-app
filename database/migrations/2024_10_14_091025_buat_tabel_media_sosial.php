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
        Schema::create('tabel_media_sosial', function(Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->string('instansi_id', 10)->nullable(true)->default('Kosong');
            $table->string('link_facebook')->nullable(true)->default('Kosong');
            $table->string('link_instagram')->nullable(true)->default('Kosong');
            $table->string('link_twitter')->nullable(true)->default('Kosong');
            $table->string('link_youtube')->nullable(true)->default('Kosong');
            $table->string('link_tiktok')->nullable(true)->default('Kosong');
            $table->string('link_thread')->nullable(true)->default('Kosong');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_media_sosial');
    }
};
