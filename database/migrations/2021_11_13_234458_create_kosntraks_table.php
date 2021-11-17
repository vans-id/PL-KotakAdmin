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
            $table->integer('owner_id');
            $table->string('type');
            $table->string('name');
            $table->string('address');
            $table->string('maps');
            $table->string('description');
            $table->string('price');
            $table->string('image')->nullable();
            $table->string('bedroom');
            $table->string('bathroom');
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
