<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacionTable extends Migration
{
    public function up()
    {
        Schema::create('notificacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('capacitacion_id')->unsigned();
            $table->foreign('capacitacion_id')->references('id')->on('capacitacion')->onDelete('cascade');
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
        Schema::dropIfExists('notificacion');
    }
}
