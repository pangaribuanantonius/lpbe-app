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
        Schema::table('tabel_callcenter', function (Blueprint $table) {
            $table->string('rahasia', 7)->nullable(true)->default('Kosong')->after('sektorlainnya');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabel_callcenter', function (Blueprint $table) {
            $table->dropColumn('rahasia');
        });
    }
};
