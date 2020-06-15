<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('personal_id')->unsigned();
            $table->foreign('personal_id')->references('id')->on('personal')->onDelete('restrict');
            $table->string('tipo',10);
            $table->string('razon',200)->nullable();
            $table->string('observacion',200)->nullable();
            $table->date('fecha_ini'); 
            $table->integer('dias_t');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
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
        Schema::dropIfExists('vacacion');
    }
}
