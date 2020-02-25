<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermisoEliminar
{
    public function handle($request, Closure $next)
    {
        if(Auth::guest()){
            return redirect('/');
        }
        if(Auth::user()->permiso->eliminar == 1){
            return $next($request);
        }
        else{
            return redirect('/')->with('mensajeerror','No tienes permisos para Eliminar');
        }
    }
}
