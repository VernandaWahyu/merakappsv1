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
            $table->unsignedBigInteger('merak_id');
            $table->foreign('merak_id')->references('id')->on('merak');
            $table->unsignedBigInteger('merak_id1');
            $table->foreign('merak_id1')->references('id')->on('merak');
            $table->unsignedSmallInteger('hasil_id');
            $table->foreign('hasil_id')->references('id')->on('hasil');
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
