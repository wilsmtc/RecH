<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = "contrato";
    protected $fillable=['nombre','vacacion','sueldo_min','sueldo_max'];
}
