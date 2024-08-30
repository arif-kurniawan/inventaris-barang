<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $hak_akses): Response
    {
        $hak_akses = explode('|', $hak_akses);
        if (!in_array($request->user()->hak_akses, $hak_akses)) {
            return redirect('home');
        }
        return $next($request);
    }
}
