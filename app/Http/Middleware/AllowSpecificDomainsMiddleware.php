<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllowSpecificDomainsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedOrigins = env('ALLOWED_ORIGINS', []);

        var_dump($allowedOrigins);

        var_dump($request->getHost());

        // if (!empty($allowedOrigins)) {
        //     $allowedOrigins = explode(',', $allowedOrigins);

        //     if (!in_array($request->getHost(), $allowedOrigins)) {
        //         return response()->json(['message' => 'Unauthorized'], 401);
        //     }
        // }

        return $next($request);
    }
}
