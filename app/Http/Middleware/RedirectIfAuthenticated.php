<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && $request->route()->named('login')) {
                return redirect('/'); // Redirige a la raíz si el usuario está autenticado y está intentando acceder a la página de inicio de sesión.
            } elseif (Auth::guard($guard)->check()) {
                return redirect("/catalogos"); // Redirige a la página de inicio si el usuario está autenticado y no está intentando acceder a la página de inicio de sesión.
            }
        }

        return $next($request);
    }
}
