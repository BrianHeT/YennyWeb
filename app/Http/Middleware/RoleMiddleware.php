<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Importa la fachada Auth

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $roleName El nombre del rol requerido (ej. 'admin', 'client')
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $roleName): Response
    {

        if (!Auth::check()) {

            abort(Response::HTTP_UNAUTHORIZED, 'Debes iniciar sesión para acceder a esta sección.');
        }


        $user = Auth::user();

        if ($user->role?->name === $roleName) {
            return $next($request); 
        }


        abort(Response::HTTP_FORBIDDEN, 'No tienes los permisos necesarios para acceder a esta sección.');
    }
}
