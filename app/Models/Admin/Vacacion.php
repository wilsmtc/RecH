<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Vacacion extends Model
{
    protected $table = "vacacion";
    protected $fillable=['tipo','razon','fecha_ini','dias_t','observacion','personal_id'];
    public function personal()
    {
        return $this->belongsTo(Personal::class); //muchas vacaciones pertenecen a un personal
    }
}
