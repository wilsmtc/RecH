<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionInvitado;
use App\Models\Admin\Capacitacion;
use App\Models\Admin\Personal;
use App\Models\Admin\Vacacion;
use Illuminate\Support\Facades\DB;
use MyHelper;

class InvitadoController extends Controller
{

    public function create()
    {
        return view ('admin.invitado.auth');
    }

    public function verinfo()
    {
        session_start();
        ob_start();
        $id=$_SESSION['id_invitado'];
        $personal=Personal::findOrfail($id);
        $dias_g=MyHelper::DiasGanados($personal->fecha_ing);
        $dias_t=MyHelper::DiasTomados($personal->id);
        $dias_libres=$dias_g-$dias_t;
        $capacitacion=Capacitacion::where('unidad_id','=',$personal->unidad_id)->orderBy('id')->get();
        return view ('admin.invitado.info', compact('personal','dias_libres','capacitacion')); 
    }

    public function store(ValidacionInvitado $request)
    {
        //dd($request->all());
        $ci=$request->ci;
        $vec=DB::select("SELECT id FROM personal WHERE ci='$ci'"); //$vec agarra el id q correspond el ci si esq hubiese
        if($vec==null){
            return redirect('invitado')->with('mensajeerror', 'Su C.I. no corresponde a nuestros registros');
        }
        else{       
            $id=$vec[0]->id;
            $personal=Personal::findOrfail($id);
            if($personal->estado==1){
                // $dias_g=MyHelper::DiasGanados($personal->fecha_ing);
                // $dias_t=MyHelper::DiasTomados($personal->id);
                // $dias_libres=$dias_g-$dias_t;
                // $capacitacion=Capacitacion::where('unidad_id','=',$personal->unidad_id)->orderBy('id')->get();
                // return view ('admin.invitado.info', compact('personal','dias_libres','capacitacion')); 
                session_start();
                ob_start();
                $_SESSION['id_invitado']=$personal->id;
                return redirect('/');
            }
            else{
                return redirect('invitado')->with('mensajeerror', 'Usted esta retirado de la Institución');
            }                    
        }

    }

    public function show($id)
    {
        //
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
