<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Personal;
use App\Models\Admin\Unidad;
use App\Models\Seguridad\Usuario;

class AdminController extends Controller
{
    public function index()
    {
        $us=Usuario::all()->count();
        $un=Unidad::all()->count();
        $pe=Personal::all()->count();
        return view('admin.admin.index',compact('us','un','pe'));
    }
}
