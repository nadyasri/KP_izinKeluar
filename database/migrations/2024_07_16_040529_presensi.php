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
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id_user')->on('users')->onDelete('cascade');
            $table->boolean('kehadiran')->default(1);
            $table->timestamps();
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
