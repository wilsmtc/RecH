<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = "permisos";
    protected $fillable=['usuario_id','añadir','editar','eliminar'];

    //mutator= es la forma de modificar un atributo antes de ser asignado
    //debe empezar con set y finalizar con atribute
    public function setañadirAttribute($value){
        $this->attributes['añadir']=($value=='on') ? '1' : '0';      
    }
    public function seteditarAttribute($value){
        $this->attributes['editar']=($value=='on') ? '1' : '0';
    }
    public function seteliminarAttribute($value){
        $this->attributes['eliminar']=($value=='on') ? '1' : '0';
    }
}
