<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckInfluencer
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
        if ($request->type == 0) {
            return redirect()->route('restaurateur');
        } else if ($request->type != 1 || $request->type == null) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
