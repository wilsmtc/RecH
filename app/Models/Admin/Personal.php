<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Personal extends Model
{
    protected $table = "personal";
    protected $fillable=['nombre','apellido','ci','celular','cargo','fecha_nac','unidad_id'];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class); //muchos personales pertenecen a una unidad
    }
    public function setSession($unidad)
    {
        // if (count($unidad) == 1) {
        //     Session::put(
        //     [
        //         'unidad_id' => $unidad[0]['id'],
        //         'unidad_nombre' => $unidad[0]['nombre'],
        //         'personal_id' =>$this->id,
        //         'nombre_personal'=>$this->nombre
        //     ]
        //     );
        // }
    }
}
