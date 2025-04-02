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
    // public function handle(Request $request, Closure $next, $role)
    // {
    //     $user = Auth::user();

    //     if (!$user) {
    //         return redirect()->route('login'); 
    //     }

    //     if ($user->hasRole($role)) {
    //         return $next($request);
    //     }

    //     if ($role === 'user' && $user->hasRole('user')) {
    //         return $next($request);
    //     }
    
    //     if ($user->hasRole('user')) {
    //         return redirect()->route('home');
    //     }
    
    //     return redirect()->route('dashboard');

    //     abort(403, 'Unauthorized');
    // }

    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if ($request->user() && $request->user()->hasAnyRole($roles)) {
            return $next($request);
        }

        if ($user->hasRole('user')) {
            return redirect()->route('home');
        }
    
        return redirect()->route('dashboard');

        abort(403, 'Unauthorized');
    }
}
