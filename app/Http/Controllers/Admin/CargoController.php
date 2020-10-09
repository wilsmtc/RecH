<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCargo;
use App\Models\Admin\Cargo;
use App\Models\Admin\Personal;
use App\Models\Admin\Unidad;
use Barryvdh\DomPDF\Facade as PDF;

class CargoController extends Controller
{

    public function index()
    {
        $cargos = Cargo::orderBy('id','desc')->get();
        return view('admin.cargo.index', compact('cargos'));
    }

    public function create()
    {
        return view ('admin.cargo.crear');
    }

    public function store(ValidacionCargo $request)
    {
        //dd($request->all());
        Cargo::create($request->all());
        return redirect('admin/cargo')->with('mensaje','Cargo creado con exito');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $cargo = Cargo::findOrfail($id);
        return view ('admin.cargo.editar', compact('cargo'));
    }

    public function update(ValidacionCargo $request, $id)
    {
        Cargo::findOrFail($id)->update($request->all());
        return redirect('admin/cargo')->with('mensaje', 'Datos actualizados con exito');
    }

    public function destroy(Request $request, $id)
    {     
        if ($request->ajax()) {    
            if(Cargo::destroy($id)){                
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
        $cargo = Cargo::findOrfail($id);
        $personal = Personal::where('estado',1)->orderBy('id')->get();
        return view('admin.cargo.ver-cargo', compact('cargo', 'personal'));
    }
    public function pdf($id)
    {
        $personal = Personal::where('estado',1)->orderBy('id')->get();
        $cargo=Cargo::findOrFail($id);
        $pdf=PDF::loadview('admin.reportes.cargo-personal', compact('cargo','personal'));
        return $pdf->stream('cargo.pdf');
    }
}
