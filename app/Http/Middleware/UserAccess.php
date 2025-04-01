<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if ($user) {
            if ($user->hasRole('user') && $role === 'user') {
                return $next($request);
            } elseif ($user->hasRole($role)) {
                return $next($request);
            }
        }

        if ($user->hasRole('user')) {
            return redirect()->route('home');
        } else {
            return redirect()->route('dashboard');
        }

        abort(403, 'Unauthorized');
    }
}
