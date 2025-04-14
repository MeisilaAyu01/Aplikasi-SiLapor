<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            // Redirect atau tampilkan error jika tidak sesuai peran
            return redirect('/')->with('error', 'Access denied');
        }

        return $next($request);
    }
}
