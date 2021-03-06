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
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->integer('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('restrict');
            $table->string('ci',15)->unique();
            $table->integer('contrato_id')->unsigned();
            $table->foreign('contrato_id')->references('id')->on('contrato')->onDelete('restrict');
            $table->integer('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('restrict');
            $table->string('celular',15)->nullable()->unique();
            $table->date('fecha_ing'); 
            $table->date('fecha_ret')->nullable();
            $table->string('genero',6);                     
            $table->string('curriculum',100)->nullable();
            $table->string('foto',100)->nullable();
            $table->integer('estado')->nullable()->default(1);
            $table->string('razon_ret',30)->nullable();
            $table->string('memorandum_ret',100)->nullable();
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
