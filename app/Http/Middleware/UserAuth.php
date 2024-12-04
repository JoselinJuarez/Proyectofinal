<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
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

            if ($userRole === 'Cobrador')
            {
                return $next($request);
            }
            else
            {
                if ($userRole === 'Administrador')
                {
                    return redirect(route('adminDashboard'));
                }
            }
        }
        return redirect(route('login'));
    }
}
