<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('daftar_izin', function (Blueprint $table) {
            $table->id('id_izin'); // Kolom ID Izin
            $table->date('tanggal'); // Kolom Tanggal
            $table->unsignedBigInteger('id_atasan'); // Kolom ID Atasan
            $table->unsignedBigInteger('id_pegawai'); // Kolom ID Pegawai
            $table->string('keperluan'); // Kolom Keperluan
            $table->string('status'); // Kolom Status
            $table->text('keterangan'); // Kolom Keterangan 
            $table->time('waktu_keluar'); // Kolom Waktu Keluar
            $table->time('waktu_masuk'); // Kolom Waktu Masuk
            $table->timestamps(); // Kolom timestamps untuk created_at dan updated_at

            // Jika ingin menambahkan foreign key untuk id_atasan dan id_pegawai
            $table->foreign('id_atasan')->references('id_atasan')->on('master_pegawai')->onDelete('cascade');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('master_pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_izin');
    }
};