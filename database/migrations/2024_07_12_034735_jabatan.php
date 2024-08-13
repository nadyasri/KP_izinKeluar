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
        Schema::create('jabatan', function (Blueprint $table) {
            $table->integer('groupId')->primary();
            $table->Integer('parentId')->nullable();
            $table->foreign('parentId')->references('groupId')->on('jabatan');
            $table->string('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('jabatan');
    }
};
