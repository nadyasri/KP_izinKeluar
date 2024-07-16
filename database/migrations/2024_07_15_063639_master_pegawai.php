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
        Schema::create('master_pegawai', function (Blueprint $table) {
            $table->id('id_pegawai'); // Kolom ID Pegawai
            $table->unsignedBigInteger('id_atasan'); // Kolom ID Atasan
            $table->string('NIP')->unique(); // Kolom NIP
            $table->string('Nama'); // Kolom Nama
            $table->string('Pangkat'); // Kolom Pangkat
            $table->string('Username')->unique(); // Kolom Username
            $table->string('Password'); // Kolom Password
            $table->timestamps(); // Kolom timestamps untuk created_at dan updated_at

            // Jika ingin menambahkan foreign key untuk id_atasan
            $table->foreign('id_atasan')->references('id_atasan')->on('master_atasan')->onDelete('cascade');
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
