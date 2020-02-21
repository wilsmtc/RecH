<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Rol;
use App\Models\Admin\UsuarioRol;
use App\Models\Seguridad\Usuario;

class UsuarioRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aux=Usuario::with('roles:id,tipo,estado')->orderBy('id')->get();
        //$aux=UsuarioRol::orderBy('id')->get();
        return view ('admin.usuariorol.index', compact('aux'));
    }
    public function store(Request $request)
    {
        //$rols=Rol::findOrFail($id);
        if ($request->ajax()) {
            if ($request->input('estado') == 1) {
                
                return response()->json(['respuesta' => 'Rol en estado activo']);
            } else {
                
                return response()->json(['respuesta' => 'Rol en estado inactivo']);
            }
        } else {
            abort(404);
        }

        
    }
   
}