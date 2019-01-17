<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRestaurateur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type == 1) {
            return route('influencer::search');
        } else if (!Auth::check()) {
            return route('guest::home');
        }
        return $next($request);
    }
}
