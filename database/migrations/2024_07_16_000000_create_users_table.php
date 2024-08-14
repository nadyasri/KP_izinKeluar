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
            $table->string('nama'); // Kolom Nama
            $table->string('pangkat'); // Kolom Pangkat
            $table->unsignedBigInteger('Users_groupId');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role',['pegawai','admin','superadmin'] )-> default('admin');
            $table->string('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();

            #FOREIGN KEY
            ##groupidFromJabatan
            $table->foreign('Users_groupId')->references('groupId')->on('jabatan');

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
