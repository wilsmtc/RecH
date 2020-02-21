<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UsuarioRol extends Model
{
    protected $table = "usuario_rol";
    protected $fillable=['rol_id','usuario_id','estado'];
}
