<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MeasureLatency
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $startTime = microtime(true);
        $request->header('X-Request-Start-Time', $startTime);

        $response = $next($request);

        $latency = microtime(true) - $startTime;

        $response->header('X-Request-Latency', $latency);

        return $response;
    }
}
