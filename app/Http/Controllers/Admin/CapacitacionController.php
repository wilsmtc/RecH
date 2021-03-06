<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCapacitacion;
use App\Models\Admin\Capacitacion;
use App\Models\Admin\Notificacion;
use App\Models\Admin\Unidad;
use App\Models\Seguridad\Usuario;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CapacitacionController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $query= trim($request->get('search'));
            $capacitaciones=Capacitacion::where('nombre', 'LIKE', '%'. $query . '%')->orderBy('id','desc')->paginate(15);
            return view('admin.capacitacion.index',['capacitaciones'=>$capacitaciones,'search'=>$query]);      
        }
        else{
            $capacitaciones = Capacitacion::orderBy('id','desc')->paginate(15);
            return view('admin.capacitacion.index', compact('capacitaciones'));  
        }
    }

    public function create()
    {
        $unidad = Unidad::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view ('admin.capacitacion.crear', compact('unidad'));
    }

    public function store(ValidacionCapacitacion $request)
    {
        $extencion=$request->file('documento_up')->getClientOriginalExtension(); //muestra el nombre original del archivo
        if($documento=Capacitacion::setDocumento($request->documento_up))
            $request->request->add(['documento'=>$documento]);
        //dd($request->all());
        $capacitacion=Capacitacion::create($request->all());

        //$usuarios=Usuario::where('id','!=',Auth::id());
        $usuarios=Usuario::all()->except(Auth::id());
        foreach($usuarios as $usuario){
            $notificacion = new Notificacion();
            $notificacion->capacitacion_id=$capacitacion->id;
            $notificacion->notificar_id=$usuario->id;
            $notificacion->autor_id=Auth::id();
            $notificacion->save();
        }
        return redirect('admin/capacitacion')->with('mensaje','Capacitación creada con exito');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $unidad = Unidad::orderBy('id')->pluck('nombre', 'id')->toArray();
        $capacitacion = Capacitacion::with('unidad')->findOrFail($id);        
        return view('admin.capacitacion.editar', compact('unidad','capacitacion'));
    }

    public function update(ValidacionCapacitacion $request, $id)
    {
        //dd($request->all());
        $capacitacion = Capacitacion::findOrFail($id);
        if ($documento = Capacitacion::setDocumento($request->documento_up, $capacitacion->documento))
            $request->request->add(['documento' => $documento]);
        $capacitacion->update($request->all());
        
        // $notificaciones=Notificacion::where('capacitacion_id','=',$id);
        // foreach($notificaciones as $noti){
        //     $idcap=$noti->id;
        //     $notificacion = Notificacion::findOrfail($idcap);
        //     $notificacion->estado=1;
        //     $notificacion->save();
        // }
        return redirect('admin/capacitacion')->with('mensaje', 'Datos actualizados con exito');
    }

    public function destroy(Request $request,$id)
    {
        if ($request->ajax()) {
            $capacitacion = Capacitacion::findOrFail($id);
            if (Capacitacion::destroy($id)) {
                Storage::disk('public')->delete("imagenes/documentos/capacitacion/$capacitacion->documento");               
                Notificacion::where('capacitacion_id','=',$id)->delete();
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function documento($id)
    {
        $capacitacion = Capacitacion::findOrFail($id);
        $file= public_path().'\storage\imagenes\documentos\capacitacion/'.$capacitacion->documento;
        return response()->file($file);
    }
    public function estadonotificacion($id)
    {
        $notificacion = Notificacion::findOrFail($id);
        $notificacion->estado=0;
        $notificacion->update();
        return redirect('admin/capacitacion');
    }
}
