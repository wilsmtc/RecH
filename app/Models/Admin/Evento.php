<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    Protected $table = "eventos";
    protected $fillable = ['titulo','lugar','descripcion','color','textcolor','inicio','fin','unidad_id'];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class); //muchas actividades pertenecen a una unidad
    }
}
