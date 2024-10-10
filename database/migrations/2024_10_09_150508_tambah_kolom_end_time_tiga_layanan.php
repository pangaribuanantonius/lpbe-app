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
            $table->string('end_aplikasi')->nullable(true)->default('Kosong')->after('tahun');
            $table->string('end_spbe')->nullable(true)->default('Kosong')->after('end_aplikasi');
            $table->string('end_smartcity')->nullable(true)->default('Kosong')->after('end_spbe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabel_tahun', function (Blueprint $table) {
            $table->dropColumn('end_aplikasi');
            $table->dropColumn('end_spbe');
            $table->dropColumn('end_smartcity');
        });
    }
};
