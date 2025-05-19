<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BlockAdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario está autenticado y si es administrador
        if (Auth::check() && Auth::user()->is_admin == 1) {
            // Redirigir al administrador fuera de esta sección
            return redirect('/'); // Redirigir a la página de inicio u otra página
        }

        // Si no es administrador, continuar con la solicitud
        return $next($request);
    }
}
