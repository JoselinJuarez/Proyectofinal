<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check())
        {
            $userRole = Auth::user()->role;

            if ($userRole === 'Administrador')
            {
                return $next($request);
            }
            else
            {
                if ($userRole === 'Cobrador')
                {
                    return redirect(route('userDashboard'));
                }
            }
        }
        return redirect(route('login'));
    }
}
