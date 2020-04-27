<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionUnidad;
use App\Models\Admin\Unidad;

class UnidadController extends Controller
{
    public function index()
    {
        $unidades = Unidad::orderBy('id')->get();
        return view('admin.unidad.index', compact('unidades'));
    }

    public function create()
    {
        return view ('admin.unidad.crear');
    }

    public function store(ValidacionUnidad $request)
    {
        //$may=strtoupper($request->sigla); //vuelve la sigla en mayusculas
       // $request->request->add(['sigla'=>$may]);
        Unidad::create($request->all());
        return redirect('admin/unidad')->with('mensaje','unidad creada con exito');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $unid = Unidad::findOrfail($id);
        //dd($unid);
        return view('admin.unidad.editar', compact('unid'));

    }

    public function update(ValidacionUnidad $request, $id)
    {
        //$may=strtoupper($request->sigla); //vuelve la sigla en mayusculas
        //$request->request->add(['sigla'=>$may]);
        Unidad::findOrFail($id)->update($request->all());
        return redirect('admin/unidad')->with('mensaje', 'Datos actualizados con exito');
    }

    public function destroy(Request $request, $id)
    {     
        if ($request->ajax()) {          
            if(Unidad::destroy($id)){                
                return response()->json(['mensaje' => 'ok']);                                  
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
             abort(404);
        }
    }
}
