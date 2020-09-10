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

        DB::table('unidades')->insert([
            'nombre'=>'Gerencia',
            'sigla'=>'GER',
            'descripcion'=>'los jefes'
        ]);
        DB::table('cargos')->insert([
            'nombre'=>'Gerente General',
            'descripcion'=>'Máxima autoridad institucional'
        ]);
        DB::table('cargos')->insert([
            'nombre'=>'Asesor Comercial',
            'descripcion'=>'ninguna'
        ]);
        DB::table('permisos')->insert([
            'usuario_id'=>1,
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>1
        ]);
       
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Menú',
            'url'=>'admin/menu/#',
            'orden'=>1,
            'icono'=>'fa-server'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>1,
            'nombre'=>'Ver Menú',
            'url'=>'admin/menu',
            'orden'=>1,
            'icono'=>'fa-navicon'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>1,
            'nombre'=>'Menú Rol',
            'url'=>'admin/menu-rol',
            'orden'=>2,
            'icono'=>'fa-exchange'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Usuario',
            'url'=>'admin/usuario/#',
            'orden'=>2,
            'icono'=>'fa-user'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>4,
            'nombre'=>'Ver Usuarios Activos',
            'url'=>'admin/usuario',
            'orden'=>1,
            'icono'=>'fa-users'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Roles',
            'url'=>'admin/rol/#',
            'orden'=>3,
            'icono'=>'fa-cubes'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>6,
            'nombre'=>'Ver Roles',
            'url'=>'admin/rol',
            'orden'=>1,
            'icono'=>'fa-cube'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Personal',
            'url'=>'admin/personal/#',
            'orden'=>4,
            'icono'=>'fa-users'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>8,
            'nombre'=>'Personal Activo',
            'url'=>'admin/personal',
            'orden'=>1,
            'icono'=>'fa-eye'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Unidad',
            'url'=>'admin/unidad/#',
            'orden'=>5,
            'icono'=>'fa-pie-chart'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>10,
            'nombre'=>'Ver Unidad',
            'url'=>'admin/unidad',
            'orden'=>1,
            'icono'=>'fa-external-link'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>4,
            'nombre'=>'Ver Usuarios Inactivos',
            'url'=>'admin/usuario-rol',
            'orden'=>2,
            'icono'=>'fa-users'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>8,
            'nombre'=>'Personal Retirado',
            'url'=>'admin/personalret',
            'orden'=>2,
            'icono'=>'fa-eye'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Cargo',
            'url'=>'admin/cargo/#',
            'orden'=>4,
            'icono'=>'fa-book'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>14,
            'nombre'=>'Ver Cargo',
            'url'=>'admin/cargo',
            'orden'=>1,
            'icono'=>'fa-book'
        ]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>1]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>2]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>3]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>4]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>5]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>12]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>6]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>7]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>8]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>9]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>10]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>11]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>13]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>14]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>15]);

        DB::table('personal')->insert([
            'nombre'=>'Tomas',
            'apellido'=>'Muller',
            'unidad_id'=>1,
            'ci'=>'1597894',
            'cargo_id'=>1,
            'celular'=>'78561265',
            'fecha_ing'=>"2018-06-13",
            'genero'=>'Hombre',
            'estado'=>1
        ]);
        DB::table('personal')->insert([
            'nombre'=>'Roberto',
            'apellido'=>'Lewandoski',
            'unidad_id'=>1,
            'ci'=>'8545789',
            'cargo_id'=>1,
            'celular'=>'76485932',
            'fecha_ing'=>"2017-02-11",
            'genero'=>'Hombre',
            'estado'=>1
        ]);
        DB::table('eventos')->insert([
            'title'=>'Informe General',
            'lugar'=>'Auditorio',
            'descripcion'=>'Detalle anual',
            'color'=>'#ff0000',
            'textColor'=>'#FFFFFF',
            'start'=>"2020-06-15 09:30:00",
            'end'=>"2020-06-15 09:30:00"
        ]);
        DB::table('eventos')->insert([
            'title'=>'Informe General',
            'lugar'=>'Auditorio',
            'descripcion'=>'Detalle anual',
            'color'=>'#ff0000',
            'textColor'=>'#FFFFFF',
            'start'=>"2020-09-01 09:30:00",
            'end'=>"2020-09-01 09:30:00"
        ]);
    }
}
