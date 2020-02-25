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
            'apellido'=>'Uño',
            'email'=>'wils.mtc.cmb@gmail.com'
        ]);

        DB::table('roles')->insert([
            'tipo'=>'Administrador'
        ]);

        DB::table('roles')->insert([
            'tipo'=>'Usuario'
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
            'apellido'=>'Robben',
            'email'=>'Bolivar.mtc.cmb@gmail.com'

        ]);
        DB::table('usuario_rol')->insert([
            'rol_id'=>2,
            'usuario_id'=>2,
            'estado'=>0 //0=inactivo    
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Gerencia',
            'sigla'=>'GER',
            'descripcion'=>'los jefes'
        ]);
        DB::table('permisos')->insert([
            'usuario_id'=>1,
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>1
        ]);
        DB::table('permisos')->insert([
            'usuario_id'=>2,
            'añadir'=>0,
            'editar'=>0,
            'eliminar'=>0
        ]);

    }
}
