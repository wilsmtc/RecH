<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPersonal;
use App\Models\Admin\Cargo;
use App\Models\Admin\Contrato;
use App\Models\Admin\Personal;
use App\Models\Admin\Unidad;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $query= trim($request->get('search'));
            //$query = ucfirst($query);//combierte la primera letra en mayuscula
            $personal=Personal::where('nombre', 'LIKE', '%'. $query . '%')->orWhere('apellido', 'LIKE', '%'. $query . '%')->orderBy('id','desc')->paginate(15);
            return view('admin.personal.index',['personal'=>$personal,'search'=>$query]);      
        }
        else{
          ////$personal = Personal::where('estado',1)-> with('unidad:id,nombre')->orderBy('id')->get();
            $personal = Personal::where('estado',1)->orderBy('id','desc')->paginate(15);
            return view('admin.personal.index', compact('personal'));  
        }       
    }

    public function create()
    {
        $unidad = Unidad::orderBy('id')->pluck('nombre', 'id')->toArray();
        $cargo = Cargo::orderBy('nombre')->pluck('nombre', 'id')->toArray();
        $contrato = Contrato::orderBy('nombre')->pluck('nombre', 'id')->toArray();
        return view('admin.personal.crear', compact('unidad', 'cargo', 'contrato'));
    }

    public function store(ValidacionPersonal $request)
    {
        if($foto=Personal::setFoto($request->foto_up))
            $request->request->add(['foto'=>$foto]);
        if($documento=Personal::setDocumento($request->documento_up))
            $request->request->add(['curriculum'=>$documento]);
        //dd($request->all());
        Personal::create($request->all());
        //llamar a crear usuario, y llenarlo con datos
        return redirect('admin/personal')->with('mensaje','Personal creado con exito');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $unidad = Unidad::orderBy('id')->pluck('nombre', 'id')->toArray();
        $cargo = Cargo::orderBy('id')->pluck('nombre', 'id')->toArray();
        $contrato = Contrato::orderBy('nombre')->pluck('nombre', 'id')->toArray();
        $personal = Personal::with('unidad')->findOrFail($id);        
        return view('admin.personal.editar', compact('personal','unidad','cargo','contrato'));
    }

    public function update(ValidacionPersonal $request, $id)
    {
        $personal = Personal::findOrFail($id);
        if ($foto = Personal::setFoto($request->foto_up, $personal->foto))
            $request->request->add(['foto' => $foto]);
        if ($documento = Personal::setDocumento($request->documento_up, $personal->curriculum))
            $request->request->add(['curriculum' => $documento]);
        $personal->update($request->all());
        return redirect('admin/personal')->with('mensaje', 'Datos actualizados con exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $personal = Personal::findOrFail($id);
            if (Personal::destroy($id)) {
                Storage::disk('public')->delete("imagenes/fotos/personal/$personal->foto");
                Storage::disk('public')->delete("imagenes/documentos/personal/$personal->curriculum");
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
        $personal = Personal::findOrFail($id);
        $file= public_path().'\storage\imagenes\documentos\personal/'.$personal->curriculum;
        return response()->file($file);
    }
    
    public function prueba($id){
        $personal = Personal::findOrFail($id);
        return view ('admin.personal.ver', compact('personal'));
        //dd($personal);
    }

    public function retirar($id)
    {
        $personal = Personal::findOrFail($id);        
        return view('admin.personal.retirar', compact('personal'));
    }
    
    public function guardarretiro(Request $request, $id)
    {
        //dd($request->all());
        $personal = Personal::findOrFail($id);
        $personal->estado=0;
        $personal->fecha_ret=$request->fecha_ret;
        $personal->razon_ret=$request->razon_ret;
        if($memorandum = Personal::setMemorandum_ret($request->memorandum_up))
        {
            $request->request->add(['memorandum_ret'=>$memorandum]);
            $personal->memorandum_ret=$request->memorandum_ret;
        }
        $personal->save();
        return redirect('admin/personalret')->with('mensaje', 'Personal retirado con exito');
    }
    public function indexretirado(Request $request)
    {
        if ($request){
            $query= trim($request->get('search'));
            $personal=Personal::where([
                ['estado',0],
                ['nombre', 'LIKE', '%'. $query . '%'],
            ])->orderBy('id','desc')->paginate(10);
            return view('admin.personal.listaretirados',['retirados'=>$personal,'search'=>$query]);      
        }
        else{
            $retirados = Personal::where('estado',0)->orderBy('id','desc')->paginate(10);
            return view('admin.personal.listaretirados', compact('retirados'));  
        } 
    }
    public function activar($id)
    {
        $personal=Personal::findOrFail($id);
        $personal->estado=1;
        $personal->razon_ret=null;
        $personal->fecha_ret=null;
        //$personal->fecha_ing=date("Y-m-d");
        Storage::disk('public')->delete("imagenes/documentos/personal/$personal->memorandum_ret");
        $personal->memorandum_ret=null;
        $personal->save();
        //dd($usuario);
        return redirect('admin/personal')->with('mensaje', 'Personal integrado con exito');
    }

    public function memo_pdf($id)
    {
        $personal = Personal::findOrFail($id);
        $file= public_path().'\storage\imagenes\documentos\personal/'.$personal->memorandum_ret;
        return response()->file($file);
    }
}
