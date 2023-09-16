<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_merak');
            $table->foreign('kode_merak')->references('id')->on('merak');
            $table->string('status_hidup', 20);
            $table->text('keterangan');
            $table->timestamp('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat');
    }
};
