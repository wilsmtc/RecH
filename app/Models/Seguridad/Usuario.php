<?php

namespace App\Models\Seguridad;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\Rol;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{
    protected $remember_token = false;
    protected $table = 'usuarios';
    protected $fillable = ['usuario', 'nombre', 'apellido', 'password'];
    protected $guarded = ['id'];

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
                'rol_nombre' => $roles[0]['tipo'],
                'usuario'=> $this->usuario,
                'usuario_id' =>$this->id,
                'nombre_usuario'=>$this->nombre,
                'apellido_usuario'=>$this->apellido
            ]
            );
        }
    }
}
