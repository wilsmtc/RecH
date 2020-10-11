<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    Protected $table = "roles";
    protected $fillable = ['tipo','añadir','editar','eliminar'];

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
