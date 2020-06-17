<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Vacacion extends Model
{
    protected $table = "vacacion";
    protected $fillable=['tipo','razon','fecha_ini','dias_t','observacion','personal_id','memorandum'];
    public function personal()
    {
        return $this->belongsTo(Personal::class); //muchas vacaciones pertenecen a un personal
    }

    public static function setMemorandum($memorandum, $actual = false) //documento (al crear), actual (al editar)
    {
        if ($memorandum) {
            if ($actual) {
                Storage::disk('public')->delete("imagenes/documentos/personal/vacacion/$actual"); // si es actual borra la anterior
            }
            $docName = Str::random(10) . '.pdf';  //STR para llamar a rando q crea un nombre aleatorio de 10 caracteres con la extension .jpg
            //$doc = ->encode('pdf'); //codifica a jpg con un 75% de la imagen real
            
            //Storage::disk('public')->put("imagenes/documentos/personal/$docName", $documento); //guarda la imagen
            $memorandum->move(public_path().'/storage/imagenes/documentos/personal/vacacion/', $docName);
            return $docName; //retorna el nombre de la imagen
        } else {
            return false;
        }
        
    }
}
