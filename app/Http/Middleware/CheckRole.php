<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'user' && auth()->user()->is_admin != 0) {
            abort(403);
        }

        if ($role == 'salon' && auth()->user()->is_admin != 1) {
            abort(403);
        }

        if ($role == 'admin' && auth()->user()->is_admin != 2) {
            abort(403);
        }
        return $next($request);
    }
}
