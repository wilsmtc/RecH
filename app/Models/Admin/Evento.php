<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    Protected $table = "eventos";
    protected $fillable = ['titulo','lugar','descripcion','color','textcolor','inicio','fin'];
}
