<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOndasTable extends Migration
{
    public function up()
    {
        Schema::create('ondas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bateria');
            $table->unsignedBigInteger('surfista');
            $table->foreign('bateria')->references('id')->on('baterias');
            $table->foreign('surfista')->references('numero')->on('surfistas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ondas');
    }
}

