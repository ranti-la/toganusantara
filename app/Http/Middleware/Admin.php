<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login dan bertipe admin
        if (Auth::check() && Auth::user()->usertype === 'admin') {
            return $next($request);
        }

        // Kalau bukan admin, tolak dengan 403
        abort(403, 'Unauthorized access - Admins only');
    }
}
