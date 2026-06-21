<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek: Apakah user sudah login DAN dia punya akses admin?
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request); // Kalau admin, silakan masuk
        }

        // Kalau bukan admin, tendang ke dashboard biasa
        return redirect('/dashboard');
    }
}