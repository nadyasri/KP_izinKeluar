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
        Schema::create('master_pegawai', function (Blueprint $table) {
            $table->id('id_pegawai'); // Kolom ID Pegawai
            $table->string('nipAtasan')->nullable(); // Kolom ID Atasan
            #FK NIP ATASAN
            $table->foreign('nipAtasan')->references('nip')->on('master_atasan')->onDelete('set null');
            $table->string('nip')->unique(); // Kolom NIP
            //FK NIP PEGAWAI
            $table->foreign('nip')->references('nip')->on('users')->onDelete('cascade');
            $table->string('namaDepan'); // Kolom Nama Depan
            $table->string('namaBelakang'); // Kolom Nama Belakang
            $table->string('jabatan'); // Kolom Jabatan
            $table->string('pangkat'); // Kolom Pangkat
            $table->string('username')->unique(); // Kolom Username
            //FK USERNAME
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
            $table->string('password'); // Kolom Password
            $table->timestamps(); // Kolom timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_pegawai');
    }
};
