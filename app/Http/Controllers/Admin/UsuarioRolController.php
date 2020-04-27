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
        $aux=Usuario::with('roles:id,tipo,estado')->orderBy('id')->get();
        //$aux=UsuarioRol::orderBy('id')->get();
        return view ('admin.usuariorol.index', compact('aux'));
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
   
}