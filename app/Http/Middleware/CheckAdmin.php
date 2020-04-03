<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Redirect;
//Como lo uso
class CheckAdmin
{
    public function handle($request, Closure $next)
    {
       

        $rol = Session::get('rol');

        if(empty($rol))
        {
            return Redirect::to('/');
        }
        else
        {
            if ($rol!='Administrador') 
            {
               // add('No eres un adminitrador');
                return Redirect::to('/');
            }
        }

        return $next($request);

    }
}
