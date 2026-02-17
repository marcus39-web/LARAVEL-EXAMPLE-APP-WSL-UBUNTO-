<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CountryCheck
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $countryCode = $request->header('X-Country-Code');
        if ($countryCode !== 'DE') {
            return response("Access restricted to users from Germany.", 403);
        }
        return $next($request);
    }
}
