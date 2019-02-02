<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsRestaurateur
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
        if (Auth::check() && Auth::user()->type == 0) {

            return $next($request);
        }

        return redirect()->route('guest::home');
    }
}
