<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if(Auth::user()->role == 'admin'){
                    return redirect()->route('admin.dashboard');
                }elseif(Auth::user()->role == 'staff'){
                    return redirect()->route('staff.dashboard');
                }elseif(Auth::user()->role == 'dokter'){
                    return redirect()->route('dokter.dashboard');
                }
            }
        }

        return $next($request);
    }
}
