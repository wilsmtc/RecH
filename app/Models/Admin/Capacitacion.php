<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Capacitacion extends Model
{
    protected $table = "capacitacion";
    protected $fillable=['nombre','unidad_id','descripcion','documento'];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class); //muchas capacitaciones pertenecen a una unidad
    }

    public static function setDocumento($documento, $actual = false) //documento (al crear), actual (al editar)
    {
        if ($documento) {
            $extencion=$documento->getClientOriginalExtension();
            if ($actual) {
                Storage::disk('public')->delete("imagenes/documentos/capacitacion/$actual"); // si es actual borra la anterior
            }
            if($extencion=="pdf"){
                $docName = Str::random(10) . '.pdf';  //STR para llamar a rando q crea un nombre aleatorio de 15 caracteres con la extension .jpg
            }
            if($extencion=="docx"){
                $docName = Str::random(10) . '.docx';  //STR para llamar a rando q crea un nombre aleatorio de 15 caracteres con la extension .jpg
            }
            if($extencion=="pptx"){
                $docName = Str::random(10) . '.pptx';  //STR para llamar a rando q crea un nombre aleatorio de 15 caracteres con la extension .jpg
            }
            $documento->move(public_path().'/storage/imagenes/documentos/capacitacion/', $docName);
            return $docName; //retorna el nombre de la imagen
        } else {
            return false;
        }        
    }
}
