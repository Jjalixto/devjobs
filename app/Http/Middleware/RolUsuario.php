<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(($request->user()->rol === 1)){
            //en caso en que no sea el rol 2 redireccionar a home
            //middleware nos redirecciona y no nos bota 403 como los policy
            return redirect()->route('home');
        };
        return $next($request);
    }
}
