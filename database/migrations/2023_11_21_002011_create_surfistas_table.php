<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurfistasTable extends Migration
{
    public function up()
    {
        Schema::create('surfistas', function (Blueprint $table) {
            $table->id('numero');
            $table->string('nome');
            $table->string('país');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surfistas');
    }
}

