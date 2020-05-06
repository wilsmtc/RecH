<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Personal extends Model
{
    protected $table = "personal";
    protected $fillable=['nombre','apellido','ci','celular','cargo','fecha_nac','unidad_id','foto','genero'];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class); //muchos personales pertenecen a una unidad
    }
    public static function setFoto($foto, $actual = false) //foto (al crear), actual (al editar)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("imagenes/fotos/personal/$actual"); // si es actual borra la anterior
            }
            $imageName = Str::random(15) . '.jpg';  //STR para llamar a rando q crea un nombre aleatorio de 15 caracteres con la extension .jpg
            $imagen = Image::make($foto)->encode('jpg', 75); //codifica a jpg con un 75% de la imagen real
            $imagen->resize(500, 550, function ($constraint) { //redimensiona la imagen
                $constraint->upsize();
            });
            Storage::disk('public')->put("imagenes/fotos/personal/$imageName", $imagen->stream()); //guarda la imagen
            return $imageName; //retorna el nombre de la imagen
        } else {
            return false;
        }
        
    }
}
