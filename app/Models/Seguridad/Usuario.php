<?php

namespace App\Models\Seguridad;

use App\Models\Admin\Permiso;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Usuario extends Authenticatable
{
    protected $remember_token = false;
    protected $table = 'usuarios';
    protected $fillable = ['usuario', 'nombre', 'apellido', 'email', 'password','foto'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol'); //se relaciona con el modelo Rol mediate la tabla usuario_rol
    }

    public function permiso()
    {
        return $this->hasOne(Permiso::class); // un usuario tiene un permiso(permiso:add,edit,del)
    }
    public function setSession($roles)
    {
        if (count($roles) == 1) {
            Session::put(
            [
                'rol_id' => $roles[0]['id'],
                'rol_tipo' => $roles[0]['tipo'],              
                'usuario'=> $this->usuario,
                'usuario_id' =>$this->id,
                'nombre_usuario'=>$this->nombre,
                'apellido_usuario'=>$this->apellido,
                'email_usuario'=>$this->email,
                'foto_usuario'=>$this->foto
            ]
            );
        }
    }

    public function setPasswordAttribute($pass) //esta funcion es de laravel para encriptar password
    {
        $this->attributes['password']=Hash::make($pass);
    }

    public static function setFoto($foto, $actual = false) //foto (al crear), actual (al editar)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("imagenes/fotos/usuario/$actual"); // si es actual borra la anterior
            }
            $imageName = Str::random(15) . '.jpg';  //STR para llamar a rando q crea un nombre aleatorio de 15 caracteres con la extension .jpg
            $imagen = Image::make($foto)->encode('jpg', 75); //codifica a jpg con un 75% de la imagen real
            $imagen->resize(500, 550, function ($constraint) { //redimensiona la imagen
                $constraint->upsize();
            });
            Storage::disk('public')->put("imagenes/fotos/usuario/$imageName", $imagen->stream()); //guarda la imagen
            return $imageName; //retorna el nombre de la imagen
        } else {
            return false;
        }        
    }
}
