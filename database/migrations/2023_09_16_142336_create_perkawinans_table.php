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
        Schema::create('perkawinan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jantan');
            $table->foreign('jantan')->references('id')->on('merak');
            $table->unsignedBigInteger('betina');
            $table->foreign('betina')->references('id')->on('merak');
            $table->unsignedSmallInteger('hasil_kawin');
            $table->foreign('hasil_kawin')->references('id')->on('hasil_kawin');
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
        Schema::dropIfExists('perkawinan');
    }
};
