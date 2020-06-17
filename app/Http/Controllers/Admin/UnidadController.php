<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionUnidad;
use App\Models\Admin\Personal;
use App\Models\Admin\Unidad;
use Barryvdh\DomPDF\Facade as PDF;


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

    public function ver($id)
    {
        $unid = Unidad::findOrfail($id);
        $personal = Personal::where('estado',1)->orderBy('id')->get();
        return view('admin.unidad.ver-unidad', compact('unid', 'personal'));
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
    public function pdf($id)
    {
        $personal = Personal::where('estado',1)->orderBy('id')->get();
        $unid=Unidad::findOrFail($id);
        $pdf=PDF::loadview('admin.reportes.unidad-personal', compact('unid','personal'));
        return $pdf->stream('unidad.pdf');

    }
}
