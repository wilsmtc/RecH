<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPersonal;
use App\Models\Admin\Personal;
use App\Models\Admin\Unidad;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::with('unidad:id,nombre')->orderBy('id')->get();
        //dd($personal);
        return view('admin.personal.index', compact('personal'));
    }

    public function create()
    {
        $unidad = Unidad::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('admin.personal.crear', compact('unidad'));
    }

    public function store(ValidacionPersonal $request)
    {
        if($foto=Personal::setFoto($request->foto_up))
            $request->request->add(['foto'=>$foto]);
        Personal::create($request->all());
        return redirect('admin/personal')->with('mensaje','Personal creado con exito');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $unidad = Unidad::orderBy('id')->pluck('nombre', 'id')->toArray();
        $personal = Personal::with('unidad')->findOrFail($id);        
        return view('admin.personal.editar', compact('personal','unidad'));
    }

    public function update(ValidacionPersonal $request, $id)
    {
        $personal = Personal::findOrFail($id);
        if ($foto = Personal::setFoto($request->foto_up, $personal->foto))
            $request->request->add(['foto' => $foto]);
        $personal->update($request->all());
        return redirect('admin/personal')->with('mensaje', 'Datos actualizados con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $personal = Personal::findOrFail($id);
            if (Personal::destroy($id)) {
                Storage::disk('public')->delete("imagenes/fotos/personal/$personal->foto");
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function ver(Personal $personal){ //personal agarra todos los atributos del modelo Personal
        return view ('admin.personal.foto', compact('personal'));
        //dd($personal);
    }
}
