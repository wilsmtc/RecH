<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'tipo'=>'Administrador',
            'añadir'=>1,
            'editar'=>1,
            'eliminar'=>1
        ]);

        DB::table('roles')->insert([
            'tipo'=>'Usuario'
        ]);

        DB::table('unidades')->insert([
            'nombre'=>'Gerencia',
            'sigla'=>'GER',
            'descripcion'=>'Cabeza de la institución'
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Contabilidad y finanzas',
            'sigla'=>'CyF',
            'descripcion'=>'Contabilidad de costes, registros, balances.'
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Recursos Humanos',
            'sigla'=>'RRHH',
            'descripcion'=>'Encargados de la administración del personal'
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Marketing',
            'sigla'=>'Mkg',
            'descripcion'=>'Gestionar, investigar y planificar mercadotecnia'
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Informática',
            'sigla'=>'INF',
            'descripcion'=>'guia, soporte y desarrollo en tecnologias de software'
        ]);
        DB::table('unidades')->insert([
            'nombre'=>'Jurídica',
            'sigla'=>'JRC',
            'descripcion'=>'asesoria y funciones legales'
        ]);
        DB::table('usuarios')->insert([
            'usuario'=>'admin',
            'password'=>bcrypt('123456'),
            'nombre'=>'Wilson',
            'apellido'=>'Uño',
            'email'=>'wils.mtc.cmb@gmail.com'
        ]);
        DB::table('usuarios')->insert([
            'usuario'=>'user2',
            'password'=>bcrypt('123456'),
            'nombre'=>'usuario',
            'apellido'=>'dos',
            'email'=>'user2.cmb@gmail.com'
        ]);
        DB::table('usuarios')->insert([
            'usuario'=>'user3',
            'password'=>bcrypt('123456'),
            'nombre'=>'usuario',
            'apellido'=>'tres',
            'email'=>'user3@gmail.com'
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id'=>1,
            'usuario_id'=>1,
            'estado'=>1 //1=activo    
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id'=>2,
            'usuario_id'=>2,
            'estado'=>1 //1=activo    
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id'=>2,
            'usuario_id'=>3,
            'estado'=>1 //1=activo    
        ]);
        DB::table('cargos')->insert(['nombre'=>'Administrador de empresas','descripcion'=>'ninguna']);
        DB::table('cargos')->insert(['nombre'=>'Asesor Comercial','descripcion'=>'ninguna']);
        DB::table('cargos')->insert(['nombre'=>'Contador','descripcion'=>'ninguna']);
        DB::table('cargos')->insert(['nombre'=>'Gerente General','descripcion'=>'Máxima autoridad institucional']);
        DB::table('cargos')->insert(['nombre'=>'Ingeniero de Sistemas','descripcion'=>'ninguna']);
        DB::table('cargos')->insert(['nombre'=>'Licenciado en Marketing','descripcion'=>'ninguna']);
        DB::table('cargos')->insert(['nombre'=>'Licenciado en Derecho','descripcion'=>'ninguna']);
        DB::table('cargos')->insert(['nombre'=>'Secretaria','descripcion'=>'ninguna']);
        DB::table('cargos')->insert(['nombre'=>'Responsable Contabilidad y Finanzas','descripcion'=>'ninguna']);        
        DB::table('cargos')->insert(['nombre'=>'Responsable Recursos Humanos','descripcion'=>'ninguna']);        
        DB::table('cargos')->insert(['nombre'=>'Responsable Marketing','descripcion'=>'ninguna']);        
        DB::table('cargos')->insert(['nombre'=>'Responsable Juridica','descripcion'=>'ninguna']);        
        DB::table('cargos')->insert(['nombre'=>'Responsable Informática','descripcion'=>'ninguna']); 
        
        DB::table('contrato')->insert(['nombre'=>'Indefinido','vacacion'=>'si']);
        DB::table('contrato')->insert(['nombre'=>'eventual','vacacion'=>'si']);
        DB::table('contrato')->insert(['nombre'=>'Por obra o servicio','vacacion'=>'no']);
        DB::table('contrato')->insert(['nombre'=>'De formación y aprendizaje','vacacion'=>'no']);
        DB::table('contrato')->insert(['nombre'=>'De consultoria','vacacion'=>'no']);
        DB::table('contrato')->insert(['nombre'=>'Jornal','vacacion'=>'no']);

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
            'orden'=>3,
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
            'orden'=>4,
            'icono'=>'fa-eye'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>8,
            'nombre'=>'Ver Cargo',
            'url'=>'admin/cargo',
            'orden'=>1,
            'icono'=>'fa-book'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>8,
            'nombre'=>'Ver Contrato',
            'url'=>'admin/contrato',
            'orden'=>2,
            'icono'=>'fa-file-text'
        ]);

        DB::table('menu')->insert([
            'menu_id'=>0,
            'nombre'=>'Capacitación',
            'url'=>'admin/capacitacion/#',
            'orden'=>6,
            'icono'=>'fa fa-calendar-plus-o'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>16,
            'nombre'=>'Ver Capacitación',
            'url'=>'admin/capacitacion',
            'orden'=>1,
            'icono'=>'fa fa-bar-chart'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>16,
            'nombre'=>'Ver Comuncados',
            'url'=>'admin/comunicado',
            'orden'=>2,
            'icono'=>'fa fa-file'
        ]);
        DB::table('menu')->insert([
            'menu_id'=>16,
            'nombre'=>'Calendario de Actividades',
            'url'=>'eventos',
            'orden'=>3,
            'icono'=>'fa fa-calendar'
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
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>16]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>17]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>18]);
        DB::table('menu_rol')->insert(['rol_id'=>1,'menu_id'=>19]);
        DB::table('eventos')->insert([
            'unidad_id'=>1,
            'title'=>'Informe General',
            'lugar'=>'Auditorio',
            'descripcion'=>'Detalle anual',
            'color'=>'#ff0000',
            'textColor'=>'#FFFFFF',
            'start'=>"2020-09-15 09:30:00",
            'end'=>"2020-09-15 09:30:00"
        ]);
        DB::table('eventos')->insert([
            'unidad_id'=>1,
            'title'=>'Informe General',
            'lugar'=>'Auditorio',
            'descripcion'=>'Detalle anual',
            'color'=>'#ff0000',
            'textColor'=>'#FFFFFF',
            'start'=>"2020-10-01 09:30:00",
            'end'=>"2020-10-01 09:30:00"
        ]);

        DB::table('personal')->insert([
            'nombre'=>'Tomas',
            'apellido'=>'Muller',
            'unidad_id'=>1,
            'ci'=>'1597894',
            'cargo_id'=>1,
            'celular'=>'78561265',
            'fecha_ing'=>"2018-06-13",
            'genero'=>'Hombre',
            'contrato_id'=>1,
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
            'contrato_id'=>1,
            'estado'=>1
        ]);

        $faker=Faker::create();
        for($i=0;$i<1000;$i++){
            DB::table('personal')->insert([
                'nombre'=>$faker->firstName,
                'apellido'=>$faker->lastName,
                'unidad_id'=>$faker->numberBetween($min = 1, $max = 6),
                'ci'=>$faker->unique()->numberBetween($min = 1000000, $max = 99999999),
                'cargo_id'=>$faker->numberBetween($min = 1, $max = 13),
                'celular'=>$faker->unique()->numberBetween($min = 10000, $max = 999999),
                'fecha_ing'=>$faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now'),
                'genero'=>$faker->randomElement(['Hombre', 'Mujer']),
                'contrato_id'=>$faker->numberBetween($min = 1, $max = 6),
                'estado'=>1
            ]);
        }
    }
}
