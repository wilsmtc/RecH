<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionRol;
use App\Models\Admin\Rol;
use App\Models\Seguridad\Usuario;

class RolController extends Controller
{
    public function index()
    {
        $datas = Rol::orderBy('id')->get();
        return view('admin.rol.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.rol.crear');
    }

    public function store(ValidacionRol $request)
    {
        Rol::create($request->all());
        return redirect('admin/rol')->with('mensaje', 'Rol creado correctamente');     
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Rol::findOrfail($id);
        return view('admin.rol.editar', compact('data'));
    }

    public function update(ValidacionRol $request, $id)
    {
        Rol::findOrFail($id)->update($request->all());
        return redirect('admin/rol')->with('mensaje', 'Rol actualizado con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {           
            if (Rol::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
             abort(404);
        }
    }
}
