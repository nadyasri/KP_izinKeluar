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
        Schema::create('presensi', function (Blueprint $table) {
            $table->id('id_presensi');
            $table->unsignedBigInteger('idUser_presensi')->nullable();;
            $table->unsignedBigInteger('presensi_groupId');
            $table->date('tanggal_absen');
            $table->boolean('kehadiran')->default(1);
            $table->timestamps();

            #FOREIGN KEY
            #nipFromUser
            $table->foreign('idUser_presensi')->references('id_user')->on('users')->onDelete('set null');

            #groupidFromUser
            #$table->foreign('presensi_groupId')->references('User_groupId')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
