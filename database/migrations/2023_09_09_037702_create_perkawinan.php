<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerkawinan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perkawinan', function (Blueprint $table) {
            $table->smallInteger('id_perkawinan',11); // Ini akan membuat kolom 'id' sebagai primary key dan auto increment
            $table->smallInteger('jenis_id');
            $table->foreign('jenis_id')->references('id_jenis')->on('jenis');
            $table->smallInteger('warna_id');
            $table->foreign('warna_id')->references('id_warna')->on('warna');
            $table->smallInteger('status_id');
            $table->foreign('status_id')->references('id_status')->on('status_fertilisasi');
            $table->dateTime('tanggal');
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
}
