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
        $datos=request()->except(['_token','_method']);
        Evento::insert($datos);
        print_r($datos);
    }
    public function show()
    {
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
