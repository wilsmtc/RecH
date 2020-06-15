<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Evento;
use App\Models\Admin\Personal;
use App\Models\Admin\Unidad;
use App\Models\Seguridad\Usuario;

class AdminController extends Controller
{
    public function index()
    {
        $us=Usuario::all()->count(); //cantidad de usuarios de la BD
        $un=Unidad::all()->count(); //cantidad de unidades de la BD
        $pe=Personal::all()->count(); //cantidad de personales de la BD
        $ev=Evento::all()->count(); //cantidad de personales de la BD
        return view('admin.admin.index',compact('us','un','pe','ev'));
    }
}
