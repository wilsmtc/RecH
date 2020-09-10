<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Rol;
use App\Models\Admin\UsuarioRol;
use App\Models\Seguridad\Usuario;

class UsuarioRolController extends Controller
{
    public function index()
    {
        // $aux=Usuario::with('roles:id,tipo,estado')->orderBy('id')->get();
        // return view ('admin.usuariorol.index', compact('aux'));
        $usuarios = Usuario::where('estado',0)->with('roles:id,tipo')->orderBy('id')->get();
        //roles es el nombre de la funcion q relaciona muchos a muchos a usuario con rol (models/seg/usuario)
        $activo=' Inactivos';
        return view('admin.usuario.index', compact('usuarios','activo'));
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $aux = new Usuario();
            if ($request->input('estado') == 1) {
               // $aux->find($request->input('usuario_id'))->roles()->update($request->estado=0);//attach=añadir en BD
                return response()->json(['respuesta' => 'Rol en estado activo']);
            } else {
               // $aux->find($request->input('usuario_id'))->roles()->update($request->estado=0);
                return response()->json(['respuesta' => 'Rol en estado inactivo']);
            }
        } else {
            abort(404);
        }       
    }
    public function desactivar($id)
    {
        $usuario=Usuario::findOrFail($id);
        $usuario->estado=0;
        $usuario->save();
        //dd($usuario);      
        return redirect('admin/usuario-rol')->with('mensaje', 'Usuario inactivado');
    }
    public function activar($id)
    {
        $usuario=Usuario::findOrFail($id);
        $usuario->estado=1;
        $usuario->save();
        //dd($usuario);
        return redirect('admin/usuario')->with('mensaje', 'Usuario activado con exito');
    }
}