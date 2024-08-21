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
            $table->id('id_cuti'); // Kolom ID Izin
            $table->unsignedBigInteger('groupId_pengirim');  //pengirim
            $table->unsignedBigInteger('groupId_penerima');  //penerima
            $table->date('tanggal'); // Kolom Tanggal
            $table->string('nip');
            $table->string('keperluan'); // Kolom Keperluan
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu'); // Kolom Status
            $table->text('keterangan'); // Kolom Keterangan 
            $table->time('tanggal_mulai'); // Kolom Waktu Keluar
            $table->time('tanggal_kembali'); // Kolom Waktu Masuk
            $table->timestamps(); // Kolom timestamps untuk created_at dan updated_at

            #FOREIGN KEY
            ##idPengirimFromUsers
            $table->foreign('groupId_pengirim')->references('Users_groupId')->on('users')->onDelete('cascade');
            
            ##idPenerimaFromJabatan
            $table->foreign('groupId_penerima')->references('parentId')->on('jabatan');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
