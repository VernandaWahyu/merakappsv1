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
        Schema::create('merak', function (Blueprint $table) {
            $table->id();
            $table->string('kode_merak', 10);
            $table->unsignedSmallInteger('warna');
            $table->foreign('warna')->references('id')->on('warna');
            $table->string('generasi', 5);
            $table->enum('jenis_kelamin', ['J', 'B']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merak');
    }
};
