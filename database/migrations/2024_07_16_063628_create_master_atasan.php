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
        Schema::create('master_atasan', function (Blueprint $table) {
            $table->id('id_atasan'); // Kolom ID
            $table->string('nip')->unique(); // Kolom NIP
            $table->foreign('nip')->references('nip')->on('users')->onDelete('cascade');

            $table->string('namaDepan'); // Kolom Nama Depan

            $table->string('namaBelakang'); // Kolom Nama Belakang

            $table->string('jabatan'); // Kolom Jabatan

            $table->string('pangkat'); // Kolom Unit Kerja

            $table->string('username')->unique(); // Kolom Username
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
        Schema::dropIfExists('master_atasan');
    }
};
