<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticomunicadoTable extends Migration
{
    public function up()
    {
        Schema::create('noticomunicado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comunicado_id')->unsigned();
            $table->foreign('comunicado_id')->references('id')->on('comunicado')->onDelete('cascade');
            $table->integer('notificar_id');
            $table->integer('autor_id');
            $table->integer('estado')->default(1);
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('noticomunicado');
    }
}
