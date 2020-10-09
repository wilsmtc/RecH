<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Evento;
use App\Models\Admin\Unidad;

class CalendarioController extends Controller
{
    public function index()
    {
        $evento = Evento::orderBy('id')->get();
        $unidad = Unidad::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('admin.calendario.index', compact('unidad'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $datos=request()->except(['_token','_method']);//en la variable $datos almacena todo lo q se envio en el array excepto lo q es el _token y _method del request
        Evento::insert($datos);
        print_r($datos);//muestra en consola lo q se guardara en la BD
        
    }
    public function show()
    {
        $evento=Evento::all();
        $fecha_hoy= date("Y-m-d H:i:s");
        foreach($evento as $eve){
            if($eve->start<$fecha_hoy){
                $aux=Evento::findOrFail($eve->id);
                $aux->color="#ff0000";
                $aux->save();
            }
        }
        $data['eventos']=Evento::all();
        return response()->json($data['eventos']);
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $datos=request()->except(['_token','_method']);
        $resp=Evento::where('id','=',$id)->update($datos);
        return response()->json($resp);
    }
    public function destroy($id)
    {
        $eventos=Evento::FindOrFail($id);
        Evento::destroy($id);
        return response()->json($id);
    }
}
