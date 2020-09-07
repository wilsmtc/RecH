<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCargo;
use App\Models\Admin\Cargo;

class CargoController extends Controller
{

    public function index()
    {
        $cargos = Cargo::orderBy('id')->get();
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
}
