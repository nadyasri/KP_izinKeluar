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
         //    $table->string('nipAtasan'); #untuk pegawai; kalau ketua menjadi pegawai juga, maka column ini bisa dimasukkan ke tabel user
            $table->string('nama'); // Kolom Nama
            $table->string('pangkat'); // Kolom Pangkat
            $table->Integer('groupId');
            $table->foreign('groupId')->references('groupId')->on('jabatan')->onDelete('cascade');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role',['pegawai','admin','superadmin'] )-> default('admin');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
