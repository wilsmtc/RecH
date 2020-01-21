<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    Protected $table = "roles";
    protected $fillable = ['tipo'];
}
