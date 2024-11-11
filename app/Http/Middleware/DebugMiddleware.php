<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DebugMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $startTime = microtime(true);
        $startMemory = memory_get_usage() / 1024;

        $response = $next($request);

        $endTime = microtime(true);
        $endMemory = memory_get_usage() / 1024;

        $debugTime = ($endTime - $startTime) * 1000;
        $debugMemory = $endMemory - $startMemory;

        $response->header('X-Debug-Time', $debugTime);
        $response->header('X-Debug-Memory', $debugMemory);

        return $response;
    }
}

