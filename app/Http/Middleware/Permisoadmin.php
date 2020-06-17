<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Permisoadmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::guest()){
            return redirect('/');
        }
        $aux=Auth::user()->roles[0]['tipo'];//agarra el rol de ese usuario
        if($aux=='Administrador'){
            return $next($request);
        }
        else{
            return back()->with('mensajeerror','No tienes privilegios de Administrador');
        }
    }
}
