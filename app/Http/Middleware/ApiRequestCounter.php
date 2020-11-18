<?php

namespace App\Http\Middleware;

use App\Events\ApiRequestHit;
use Closure;
use Illuminate\Http\Request;

class ApiRequestCounter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        event(new ApiRequestHit($request->user()));
        return $next($request);
    }
}
