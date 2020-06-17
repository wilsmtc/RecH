<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionVacacion;
use App\Models\Admin\Personal;
use App\Models\Admin\Vacacion;
use MyHelper;

class VacacionController extends Controller
{
    public function index()
    {
    }

    public function create($id)
    {  
        $personal=Personal::findOrfail($id);
        $dias_g=MyHelper::DiasGanados($personal->fecha_ing); //dias ganados
        $dias_t=MyHelper::DiasTomados($personal->id); //dias tomados
        $dias_l=$dias_g-$dias_t; //dias q puede utilizar
        return view('admin.vacacion.crear', compact('personal','dias_l'));
    }

    public function store(ValidacionVacacion $request)
    {
        //dd($request->all());
        if($memorandum=Vacacion::setMemorandum($request->memorandum_up))
            $request->request->add(['memorandum'=>$memorandum]);
        Vacacion::create($request->all());
        return redirect('admin/personal')->with('mensaje','descuento de dias realizado con exito');
    }

    public function pdf($id)
    {
        $vacacion = Vacacion::findOrFail($id);
        $file= public_path().'\storage\imagenes\documentos\personal\vacacion/'.$vacacion->memorandum;
        return response()->file($file);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
