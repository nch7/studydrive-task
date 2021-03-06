<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfGuest {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @param null                      $guard
     *
     * @return mixed
     */
    public function handle ($request, Closure $next, $guard = null) {
        if (!Auth::guard($guard)->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
