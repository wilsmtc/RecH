<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'usuario'=>'bayern',
            'password'=>bcrypt('munich'),
            'nombre'=>'Wilson',
            'apellido'=>'Uño'
        ]);

        DB::table('roles')->insert([
            'tipo'=>'administrador'
   
        ]);

        DB::table('usuario_rol')->insert([
            'rol_id'=>1,
            'usuario_id'=>1,
            'estado'=>1 //1=activo    
        ]);

        DB::table('usuarios')->insert([
            'usuario'=>'wil',
            'password'=>bcrypt('wil'),
            'nombre'=>'Arjen',
            'apellido'=>'Robben'
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id'=>1,
            'usuario_id'=>2,
            'estado'=>0 //0=inactivo    
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Gerencia',
            'sigla'=>'GER',
            'descripcion'=>'los jefes'
        ]);

    }
}
