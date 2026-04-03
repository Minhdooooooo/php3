<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Quantri
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((int) $request->user()->idgroup === 1) {
            return $next($request);
        }

        return redirect('/thongbao');
    }
}
