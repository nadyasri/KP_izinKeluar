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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nip')->unique();
            $table->string('nipAtasan'); #untuk pegawai; kalau ketua menjadi pegawai juga, maka column ini bisa dimasukkan ke tabel user
            $table->string('namaDepan'); // Kolom Nama Depan
            $table->string('namaBelakang'); // Kolom Nama Belakang
            $table->string('jabatan'); // Kolom Jabatan
            $table->string('pangkat'); // Kolom Pangkat
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role',['pegawai','admin','superadmin'] )-> default('admin');
            $table->rememberToken();
            $table->timestamps();

            // Jika ingin menambahkan foreign key untuk username atasan
            #$table->foreign('username')->references('username')->on('master_atasan')->onDelete('cascade');

            // Jika ingin menambahkan foreign key untuk username pegawai
            #$table->foreign('username_pegawai')->references('username')->on('master_pegawai')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
