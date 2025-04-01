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
        Schema::create('uji', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('kode')->nullable();
            $table->date('tanggal_pengujian')->nullable();
            $table->string('jenis_kendaraan')->nullable();
            $table->string('nama')->nullable();
            $table->text('alamat_garasi')->nullable();
            $table->string('merk_kendaraan')->nullable();
            $table->string('tipe_kendaraan')->nullable();
            $table->string('tahun_pembuatan')->nullable();
            $table->string('nomor_kendaraan')->nullable();
            $table->string('nomor_pemeriksaan')->nullable();
            $table->string('nomor_chassis')->nullable();
            $table->string('nomor_mesin')->nullable();
            $table->string('macam')->nullable();
            $table->string('bahan')->nullable();
            $table->string('keistimewaan')->nullable();
            $table->date('tanggal_terakhir_pengujian')->nullable();
            $table->string('tempat_terakhir_pengujian')->nullable();
            $table->string('ktp')->nullable();
            $table->string('ktp_size_asli')->nullable();
            $table->string('ktp_size_kompresi')->nullable();
            $table->string('stnk')->nullable();
            $table->string('stnk_size_asli')->nullable();
            $table->string('stnk_size_kompresi')->nullable();
            $table->string('surat_uji_kendaraan')->nullable();
            $table->string('surat_uji_kendaraan_size_asli')->nullable();
            $table->string('surat_uji_kendaraan_size_kompresi')->nullable();
            $table->string('status')->default('Belum Validasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uji');
    }
};
