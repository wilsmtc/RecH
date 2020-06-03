<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item',5)->nullable()->unique();
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->integer('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('restrict');
            $table->string('ci',15)->unique();
            $table->string('cargo',50);
            $table->string('celular',15)->nullable()->unique();
            $table->date('fecha_nac'); 
            $table->string('genero',6);                     
            $table->string('curriculum',100)->nullable();
            $table->string('foto',100)->nullable();
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
        Schema::dropIfExists('personal');
    }
}
