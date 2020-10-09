<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionContrato;
use App\Models\Admin\Contrato;
use App\Models\Admin\Personal;
use Barryvdh\DomPDF\Facade as PDF;

class ContratoController extends Controller
{

    public function index()
    {
        $contratos = Contrato::orderBy('id','desc')->get();
        return view('admin.contrato.index', compact('contratos'));
    }

    public function create()
    {
        return view ('admin.contrato.crear');
    }

    public function store(ValidacionContrato $request)
    {
        Contrato::create($request->all());
        return redirect('admin/contrato')->with('mensaje','Contrato creado con exito');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $contrato = Contrato::findOrfail($id);
        return view ('admin.contrato.editar', compact('contrato'));
    }

    public function update(ValidacionContrato $request, $id)
    {
        Contrato::findOrFail($id)->update($request->all());
        return redirect('admin/contrato')->with('mensaje', 'Datos actualizados con exito');
    }

    public function destroy(Request $request, $id)
    {     
        if ($request->ajax()) {    
            if(Contrato::destroy($id)){                
                return response()->json(['mensaje' => 'ok']);                                  
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
             abort(404);
        }
    }
    public function ver($id)
    {
        $contrato = Contrato::findOrfail($id);
        $personal = Personal::where('estado',1)->orderBy('id')->get();
        return view('admin.contrato.ver-contrato', compact('contrato', 'personal'));
    }
    public function pdf($id)
    {
        $personal = Personal::where('estado',1)->orderBy('id')->get();
        $contrato=Contrato::findOrFail($id);
        $pdf=PDF::loadview('admin.reportes.contrato-personal', compact('personal','contrato'));
        return $pdf->stream('contrato.pdf');
    }
}
