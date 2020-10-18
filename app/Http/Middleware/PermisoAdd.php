<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermisoAdd
{
    public function handle($request, Closure $next)
    {
        if(Auth::guest()){
            return redirect('/');
        }
        if(Auth::user()->roles[0]->añadir == 1){
            return $next($request);
        }
        else{
            return back()->with('mensajeerror','No tienes permisos para Añadir');
        }
    }
}
