<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Evento;

class CalendarioController extends Controller
{
    public function index()
    {
        return view('admin.calendario.index');
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
        //$ev=Evento::all()->count();
        //if($ev!=0)
            //for(int i=1,i<=$ev,i++)
                //$evento=Evento::findOrfail(i);
                //if($evento->start<fecha_actual){
                    //$evento->color=red;
                    //$evento->save();}
                //if($evento->start==fecha_actual){
                    //$evento->color=amarillo;
                    //$evento->save();}
                //if($evento->start>fecha_actual){
                    //$evento->color=verde;
                    //$evento->save();}
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
