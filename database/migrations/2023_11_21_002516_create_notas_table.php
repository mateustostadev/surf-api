<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateNotasTable extends Migration
{
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('onda');
            $table->float('notaParcial1');
            $table->float('notaParcial2');
            $table->float('notaParcial3');
            $table->foreign('onda')->references('id')->on('ondas');
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('notas');
    }
}

