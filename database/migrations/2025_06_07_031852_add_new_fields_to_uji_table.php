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
        Schema::table('uji', function (Blueprint $table) {
            $table->string('ktp_compression_ratio')->nullable()->after('surat_uji_kendaraan_size_kompresi');
            $table->string('ktp_space_saving')->nullable()->after('ktp_compression_ratio');
            $table->string('stnk_compression_ratio')->nullable()->after('ktp_space_saving');
            $table->string('stnk_space_saving')->nullable()->after('stnk_compression_ratio');
            $table->string('surat_uji_kendaraan_compression_ratio')->nullable()->after('stnk_space_saving');
            $table->string('surat_uji_kendaraan_space_saving')->nullable()->after('surat_uji_kendaraan_compression_ratio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('uji', function (Blueprint $table) {
            $table->dropColumn([
                'ktp_compression_ratio',
                'ktp_space_saving',
                'stnk_compression_ratio',
                'stnk_space_saving',
                'surat_uji_kendaraan_compression_ratio',
                'surat_uji_kendaraan_space_saving'
            ]);
        });
    }
};
