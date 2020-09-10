<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionUsuario;
use App\Models\Admin\Permiso;
use App\Models\seguridad\Usuario;
use App\Models\Admin\Rol;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::where('estado',1)->with('roles:id,tipo')->orderBy('id')->get();
        //roles es el nombre de la funcion q relaciona muchos a muchos a usuario con rol (models/seg/usuario)
        $activo='Activos';
        return view('admin.usuario.index', compact('usuarios','activo'));
    }

    public function create()
    {
        //dd('estas en crear usuario');
        $rols = Rol::orderBy('id')->pluck('tipo', 'id')->toArray();
        //dd($rols);
        return view('admin.usuario.crear', compact('rols'));
    }

    public function store(ValidacionUsuario $request)
    {
        //$input=$request->all();    dd($input);  //ver ls datos enviados
        if($foto=Usuario::setFoto($request->foto_up))
            $request->request->add(['foto'=>$foto]);
        $usuario = Usuario::create($request->all());
        $usuario->roles()->attach($request->rol_id);
        $per = new Permiso($request->all());
        $per->usuario_id=$usuario->id;
        $per->save();
        return redirect('admin/usuario')->with('mensaje','usuario creado con exito');    
    }

    public function ver(Usuario $usuario)
    {
        return view ('admin.usuario.foto', compact('usuario'));
        //dd($usuario);
    }

    public function edit($id)
    {
        $rols = Rol::orderBy('id')->pluck('tipo', 'id')->toArray();
        $usuario = Usuario::with('roles')->findOrFail($id);
        return view('admin.usuario.editar', compact('usuario', 'rols'));
    }

    public function update(ValidacionUsuario $request, $id)
    {       
        //$input=$request->all();    dd($input);  //ver ls datos enviados
        $usuario=Usuario::findOrFail($id);
        if ($foto = Usuario::setFoto($request->foto_up, $usuario->foto))
            $request->request->add(['foto' => $foto]);
        $usuario->update(array_filter($request->all()));
        //array_filter($request->all())    array_fiter (elimina los atributos null del &request) 
        $usuario->roles()->sync($request->rol_id);
        if($request->añadir == "on" )
            $x = 1;
        else
            $x = 0;
        if($request->editar == "on")
            $y = 1;    
        else
            $y = 0;
        if($request->eliminar == "on")
            $z = 1;    
        else
            $z = 0;
        $usuario->permiso()->update([        
            'añadir'=>$x,
            'editar'=>$y,
            'eliminar'=>$z
        ]);
        if($usuario->estado==1)
            return redirect('admin/usuario')->with('mensaje', 'Usuario actualizado con exito');
        else
            return redirect('admin/usuario-rol')->with('mensaje', 'Usuario actualizado con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $usuario=Usuario::findOrFail($id);
            if (Usuario::destroy($id)) {
                Storage::disk('public')->delete("imagenes/fotos/usuario/$usuario->foto");
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
             abort(404);
        }
    }
}
