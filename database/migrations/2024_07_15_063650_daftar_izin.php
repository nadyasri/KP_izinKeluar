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
        Schema::create('daftar_izin', function (Blueprint $table) {
            $table->id('id_izin'); // Kolom ID Izin
            $table->date('Tanggal'); // Kolom Tanggal
            $table->unsignedBigInteger('id_atasan'); // Kolom ID Atasan
            $table->unsignedBigInteger('id_pegawai'); // Kolom ID Pegawai
            $table->string('Keperluan'); // Kolom Keperluan
            $table->string('Status'); // Kolom Status
            $table->text('Keterangan')->nullable(); // Kolom Keterangan (nullable)
            $table->time('Waktu_keluar')->nullable(); // Kolom Waktu Keluar (nullable)
            $table->time('Waktu_masuk')->nullable(); // Kolom Waktu Masuk (nullable)
            $table->timestamps(); // Kolom timestamps untuk created_at dan updated_at

            // Jika ingin menambahkan foreign key untuk id_atasan dan id_pegawai
            $table->foreign('id_atasan')->references('id_atasan')->on('master_atasan')->onDelete('cascade');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai')->onDelete('cascade');
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
