<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionUsuario;
use App\Http\Requests\ValidacionUsuarioEditar;
use App\Models\seguridad\Usuario;
use App\Models\Admin\Rol;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::with('roles:id,tipo')->orderBy('id')->get();
        //roles es el nombre de la funcion q relaciona muchos a muchos a usuario con rol (models/seg/usuario)
        return view('admin.usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd('estas en crear usuario');
        $rols = Rol::orderBy('id')->pluck('tipo', 'id')->toArray();
        //dd($rols);
        return view('admin.usuario.crear', compact('rols'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionUsuario $request)
    {
       $usuario = Usuario::create($request->all());
       $usuario->roles()->attach($request->rol_id);
       return redirect('admin/usuario')->with('mensaje','usuario creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rols = Rol::orderBy('id')->pluck('tipo', 'id')->toArray();
        $usuario = Usuario::with('roles')->findOrFail($id);
        return view('admin.usuario.editar', compact('usuario', 'rols'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionUsuario $request, $id)
    {
        $usuario=Usuario::findOrFail($id);
        $usuario->update(array_filter($request->all()));
        //array_filter($request->all())    array_fiter (elimina los atributos null del &request) 
        $usuario->roles()->sync($request->rol_id);
        return redirect('admin/usuario')->with('mensaje', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Usuario::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
             abort(404);
        }
    }
}
