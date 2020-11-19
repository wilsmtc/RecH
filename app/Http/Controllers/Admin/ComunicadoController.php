<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionComunicado;
use App\Models\Admin\Comunicado;
use App\Models\Admin\Noticomunicado;
use App\Models\Seguridad\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ComunicadoController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $query= trim($request->get('search'));
            $comunicados=Comunicado::where('nombre', 'LIKE', '%'. $query . '%')->orderBy('id','desc')->paginate(15);
            return view('admin.comunicado.index',['comunicados'=>$comunicados,'search'=>$query]);      
        }
        else{
            $comunicados = Comunicado::orderBy('id','desc')->paginate(15);
            return view('admin.comunicado.index', compact('comunicados'));  
        }
    }

    public function create()
    {
        return view ('admin.comunicado.crear');
    }

    public function store(ValidacionComunicado $request)
    {
        $extencion=$request->file('documento_up')->getClientOriginalExtension(); //muestra el nombre original del archivo
        if($documento=Comunicado::setDocumento($request->documento_up))
            $request->request->add(['documento'=>$documento]);
        //dd($request->all());
        $comunicado=Comunicado::create($request->all());
      
        $usuarios=Usuario::all()->except(Auth::id());
        foreach($usuarios as $usuario){
            $notificacion = new Noticomunicado();
            $notificacion->comunicado_id=$comunicado->id;
            $notificacion->notificar_id=$usuario->id;
            $notificacion->autor_id=Auth::id();
            $notificacion->save();
        }
        return redirect('admin/comunicado')->with('mensaje','Capacitación creada con exito');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $comunicado = Comunicado::findOrFail($id);        
        return view('admin.comunicado.editar', compact('comunicado'));
    }

    public function update(ValidacionComunicado $request, $id)
    {
        //dd($request->all());
        $comunicado = Comunicado::findOrFail($id);
        if ($documento = Comunicado::setDocumento($request->documento_up, $comunicado->documento))
            $request->request->add(['documento' => $documento]);
        $comunicado->update($request->all());
        return redirect('admin/comunicado')->with('mensaje', 'Datos actualizados con exito');
    }

    public function destroy(Request $request,$id)
    {
        if ($request->ajax()) {
            $comunicado = Comunicado::findOrFail($id);
            if (Comunicado::destroy($id)) {
                Storage::disk('public')->delete("imagenes/documentos/notificacion/$comunicado->documento");               
                Noticomunicado::where('comunicado_id','=',$id)->delete();
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
        $comunicado = Comunicado::findOrFail($id);
        $file= public_path().'\storage\imagenes\documentos\comunicado/'.$comunicado->documento;
        return response()->file($file);
    }
    public function estadonotificacion($id)
    {
        $notificacion = Noticomunicado::findOrFail($id);
        $notificacion->estado=0;
        $notificacion->update();
        return redirect('admin/comunicado');
    }
}
