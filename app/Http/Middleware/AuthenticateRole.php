<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateRole
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->user_role === $role) {
            return $next($request);
        }

        return redirect()->route('login'); 
    }
}
