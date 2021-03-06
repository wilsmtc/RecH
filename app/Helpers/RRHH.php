<?php

use App\Models\Admin\Evento;
use App\Models\Admin\Noticomunicado;
use App\Models\Admin\Notificacion;
use App\Models\Admin\Personal;
use App\Models\Admin\Vacacion;
use App\Models\Seguridad\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (!function_exists('getMenuActivo')) {
    function getMenuActivo($ruta)
    {
        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
}
class MyHelper {
    public static function DiasGanados($date){
        $fecha_actual = new \DateTime();
        $fecha_ing =  new \DateTime($date);
        $diferencia = $fecha_actual->diff($fecha_ing);
        $year_difference = $diferencia->format('%y');
        $vacacion_dias = 0;
        if($year_difference <= 5){
            $vacacion_dias = $year_difference*15;
        }elseif($year_difference > 5 && $year_difference <= 10){
            $vacacion_dias = 75+($year_difference-5)*20;
        }elseif($year_difference > 10){
            $vacacion_dias = 75+100+($year_difference-10)*30;
        }
        return $vacacion_dias;
    }
    public static function DiasTomados($id){
        $dias_tomados = Vacacion::where('personal_id',$id)->sum('dias_t');
        return $dias_tomados;
    }
    public static function CantidadEventos(){
        $fecha_hoy= date("Y-m-d H:i:s");
        $eventos=Evento::orderBy('id')->get();
        $cont=0;
        foreach($eventos as $ev)
            if($ev->start>=$fecha_hoy){
                $cont++;
            }               
        return $cont;
    }
    public static function DetalleEventos(){
        $fecha_hoy= date("Y-m-d H:i:s");
        $eventos = Evento::where([
            ['start','>=',$fecha_hoy],
        ])->orderBy('start')->get();
        return $eventos;                     
    }
    public static function DiasEvento($fecha_evento){
        $fecha_hoy= new \DateTime();
        $fecha_ev=new \DateTime($fecha_evento);
        $dias = $fecha_hoy->diff($fecha_ev);
        $dif = $dias->format('%d');
        return $dif;                     
    }
    public static function horasEvento($fecha_evento){
        $fecha_hoy= new \DateTime();
        $fecha_ev=new \DateTime($fecha_evento);
        $dias = $fecha_hoy->diff($fecha_ev);
        $dif = $dias->format('%h');
        return $dif;                     
    }

    public static function CantidadEventos_inv(){
        $fecha_hoy= date("Y-m-d H:i:s");
        //session_start();
        //ob_start();
        $id=$_SESSION['id_invitado'];
        $personal=Personal::findOrfail($id);
        $eventos=Evento::where('unidad_id','=',$personal->unidad_id)->orderBy('id')->get();
        $cont=0;
        foreach($eventos as $ev)
            if($ev->start>=$fecha_hoy){
                $cont++;
            }               
        return $cont;
    }
    public static function DetalleEventos_inv(){
        $fecha_hoy= date("Y-m-d H:i:s");
        //session_start();
        //ob_start();
        $id=$_SESSION['id_invitado'];
        $personal=Personal::findOrfail($id);
        $eventos = Evento::where([
            ['start','>=',$fecha_hoy],
            ['unidad_id','=',$personal->unidad_id],
        ])->orderBy('start')->get();
        return $eventos;                     
    }
    public static function Unidad_inv(){
        //session_start();
        //ob_start();
        $id=$_SESSION['id_invitado'];
        $personal=Personal::findOrfail($id);
        return $personal;                     
    }
    public static function CantidadNotificaciones(){
        
        $notificaciones = Notificacion::where([
            ['notificar_id','=',Auth::id()],
            ['estado','=',1],
        ])->count();
        return $notificaciones;
    }
    public static function DetalleNotificacion(){
        
        $notificaciones = Notificacion::where([
            ['notificar_id','=',Auth::id()],
            ['estado','=',1],
        ])->get();
        return $notificaciones;
    }
    public static function FotoNotificacion($id){
        
        $usuario = Usuario::findOrfail($id);
        return $usuario;
    }
    public static function CantidadNotificacionesComunicados(){
        
        $notificaciones = Noticomunicado::where([
            ['notificar_id','=',Auth::id()],
            ['estado','=',1],
        ])->count();
        return $notificaciones;
    }
    public static function DetalleNotificacionComunicados(){
        
        $notificaciones = Noticomunicado::where([
            ['notificar_id','=',Auth::id()],
            ['estado','=',1],
        ])->get();
        return $notificaciones;
    }

    public static function sueldo($id){
        $personal=Personal::findOrfail($id);
        $date=$personal->fecha_ing;
        $sueldo=$personal->contrato->sueldo_min;
        $fecha_ing =  new \DateTime($date);
        if($personal->estado==1){
           $fecha_actual = new \DateTime(); 
        }
        else{
            $retiro=$personal->fecha_ret;
            $fecha_actual = new \DateTime($retiro);
        }
        $diferencia = $fecha_actual->diff($fecha_ing);
        $dias = ( $diferencia->y * 365 ) +($diferencia->m * 30)+ $diferencia->d;
        $meses = ( $diferencia->y * 12 ) + $diferencia->m;
        $total=0;
        if($dias <= 30){
            $total=($sueldo/30)*$dias;
            return $total;
        }elseif($meses>=1){  
            $total=$meses*$sueldo;
            return $total;         
        }       
    }
    public static function meses_trabajados($id){
        $personal=Personal::findOrfail($id);
        $date=$personal->fecha_ing;
        $fecha_ing =  new \DateTime($date);
        if($personal->estado==1){
            $fecha_actual = new \DateTime();    
        }
        else{
            $retiro=$personal->fecha_ret;
            $fecha_actual = new \DateTime($retiro);
        }
        $diferencia = $fecha_actual->diff($fecha_ing);
        $meses = ( $diferencia->y * 12 ) + $diferencia->m;
        if($meses>=1){  
            return $meses;         
        }
        else{
            return 0;
        }       
    }
    public static function dias_trabajados($id){
        $personal=Personal::findOrfail($id);
        $date=$personal->fecha_ing;
        $fecha_ing =  new \DateTime($date);
        if($personal->estado==1){
            $fecha_actual = new \DateTime();          
        }
        else{
            $retiro=$personal->fecha_ret;
            $fecha_actual = new \DateTime($retiro);
        }       
        $diferencia = $fecha_actual->diff($fecha_ing);
        $dias = ( $diferencia->y * 365 ) +($diferencia->m * 30)+ $diferencia->d;
        return $dias;                
    }
}