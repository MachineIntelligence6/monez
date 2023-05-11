<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureItsAdmin
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
        if ($request->user()->role != 'Admin') {
            if($request->user()->role == 'Advertiser'){
                return redirect('/feeds');
            } else if($request->user()->role == 'Publisher') {
                return redirect('/channels');
            }
        }
        return $next($request);
    }
}
