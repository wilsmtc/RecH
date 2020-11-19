<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Noticomunicado extends Model
{
    protected $table = "noticomunicado";
    protected $fillable=['comunicado_id','notificar_id','autor_id','estado'];

    public function comunicado()
    {
        return $this->belongsTo(Comunicado::class); 
    }
}
