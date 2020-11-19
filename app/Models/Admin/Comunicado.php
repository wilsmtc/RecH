<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Comunicado extends Model
{
    protected $table = "comunicado";
    protected $fillable=['nombre','tipo','documento'];

    public static function setDocumento($documento, $actual = false) //documento (al crear), actual (al editar)
    {
        if ($documento) {
            $extencion=$documento->getClientOriginalExtension();
            if ($actual) {
                Storage::disk('public')->delete("imagenes/documentos/comunicado/$actual"); // si es actual borra la anterior
            }
            if($extencion=="pdf"){
                $docName = Str::random(10) . '.pdf';  //STR para llamar a rando q crea un nombre aleatorio de 15 caracteres con la extension .jpg
            }
            
            $documento->move(public_path().'/storage/imagenes/documentos/comunicado/', $docName);
            return $docName; //retorna el nombre de la imagen
        } else {
            return false;
        }        
    }
}
