<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->role === 'admin'){
                return redirect()->route('admDashboard');
            }elseif (Auth::user()->role === 'employee'){
                return redirect()->route('empDashboard');
            }elseif (Auth::user()->role === 'company'){
                return redirect()->route('cmpDashboard');
            }elseif (Auth::user()->role === 'modifier'){
                return redirect()->route('modDashboard');
            }
        }

        return $next($request);
    }
}
