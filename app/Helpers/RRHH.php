<?php

use App\Models\Admin\Vacacion;

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
}