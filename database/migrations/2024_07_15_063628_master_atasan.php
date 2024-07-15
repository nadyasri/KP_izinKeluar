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
        Schema::create('master_atasan', function (Blueprint $table) {
            $table->id('id_atasan'); // Kolom ID
            $table->string('NIP')->unique(); // Kolom NIP
            $table->string('Nama'); // Kolom Nama
            $table->string('Jabatan'); // Kolom Jabatan
            $table->string('Username')->unique(); // Kolom Username
            $table->string('Password'); // Kolom Password
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
