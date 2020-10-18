<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = "notificacion";
    protected $fillable=['capacitacion_id','notificar_id','autor_id','estado'];

    public function capacitacion()
    {
        return $this->belongsTo(Capacitacion::class); //muchas capacitaciones pertenecen a una unidad
    }
}
