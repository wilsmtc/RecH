<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario',50)->unique();
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->string('foto',25)->nullable();
            $table->string('estado',1)->nullable()->default(1);
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}
