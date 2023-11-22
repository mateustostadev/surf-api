<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBateriasTable extends Migration
{
    public function up()
    {
        Schema::create('baterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surfista1');
            $table->unsignedBigInteger('surfista2');
            $table->foreign('surfista1')->references('numero')->on('surfistas');
            $table->foreign('surfista2')->references('numero')->on('surfistas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('baterias');
    }
}

