<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $limit = 'auth:' . $request->ip;
        if (RateLimiter::tooManyAttempts($limit, 5)) {
            return response()->json('Unauthorized', 401);
        }

        if ($request->header('X-Token') != config('app.api_token')) {
            RateLimiter::increment($limit);
            
            return response()->json('Unauthorized', 401);
        } 
    
        return $next($request);
    }
}
