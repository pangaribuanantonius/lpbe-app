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
        Schema::table('tabel_tahun', function (Blueprint $table) {
            $table->string('layanan')->nullable(true)->default('Kosong')->after('tahun');
            $table->dateTime('end_time')->nullable(); // Menggunakan dateTime atau timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabel_tahun', function (Blueprint $table) {
            $table->dropColumn('layanan');
            $table->dropColumn('end_time');
        });
    }
};
