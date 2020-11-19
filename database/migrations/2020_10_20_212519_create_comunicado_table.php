<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunicadoTable extends Migration
{

    public function up()
    {
        Schema::create('comunicado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('tipo',13);
            $table->string('documento',15);
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comunicado');
    }
}
