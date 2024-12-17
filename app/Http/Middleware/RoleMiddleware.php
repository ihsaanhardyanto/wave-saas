<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role = null): Response
    {
        // Periksa jika pengguna sudah login dan role-nya sesuai
        if (!$role || (Auth::check() && Auth::user()->role === $role)) {
            return $next($request);
        }

        // Jika tidak, abort dengan error 403 (Forbidden)
        abort(403, 'Unauthorized action.');
    }
}
