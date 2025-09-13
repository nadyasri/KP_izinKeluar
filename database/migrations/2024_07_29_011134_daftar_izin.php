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
            $table->unsignedBigInteger('groupId_pengirim');  //pengirim
            $table->unsignedBigInteger('groupId_penerima');  //penerima
            $table->date('tanggal'); // Kolom Tanggal
            $table->unsignedBigInteger('idUser');
            $table->string('keperluan'); // Kolom Keperluan
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu'); // Kolom Status
            $table->text('keterangan'); // Kolom Keterangan 
            $table->time('waktu_keluar'); // Kolom Waktu Keluar
            $table->time('waktu_kembali'); // Kolom Waktu Masuk
            $table->timestamps(); // Kolom timestamps untuk created_at dan updated_at

            #FOREIGN KEY
            ##idPengirimFromUsers
            $table->foreign('groupId_pengirim')->references('Users_groupId')->on('users')->onDelete('cascade');
            
            ##idPenerimaFromJabatan
            $table->foreign('groupId_penerima')->references('parentId')->on('jabatan');

            $table->foreign('idUser')->references('id_user')->on('users');

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
