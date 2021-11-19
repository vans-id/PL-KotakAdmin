<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosntraksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosntraks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('jenis');
            $table->string('nama_tempat');
            $table->string('alamat');
            $table->longText('maps');
            $table->longText('keterangan');
            $table->string('harga_sewa');
            $table->string('gambar')->nullable();
            $table->string('status_kamar');
            $table->string('status_kamarmandi');
            $table->string('wifi')->nullable();
            $table->string('laundry')->nullable();
            $table->integer('warung_makan');
            $table->longText('peraturan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kosntrak');
    }
}
