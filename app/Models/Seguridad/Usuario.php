<?php

namespace App\Models\Seguridad;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{
    protected $remember_token = false;
    protected $table = 'usuarios';
    protected $fillable = ['usuario', 'nombre', 'apellido', 'email', 'password'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol'); //se relaciona con el modelo Rol mediate la tabla usuario_rol
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
                'email_usuario'=>$this->email
            ]
            );
        }
    }
    public function setPasswordAttribute($pass) //esta funcion es de laravel para encriptar password
    {
        $this->attributes['password']=Hash::make($pass);
    }
}
