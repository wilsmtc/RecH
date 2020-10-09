<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapacitacionTable extends Migration
{
    public function up()
    {
        Schema::create('capacitacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('restrict');
            $table->string('nombre',50);
            $table->string('descripcion',250)->nullable();
            $table->string('documento',15);
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('capacitacion');
    }
}
