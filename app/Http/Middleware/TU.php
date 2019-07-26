<?php

namespace App\Http\Middleware;

use Closure;

class TU
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
        if (Auth::check() && Auth::user()->role == 'tendik'){
            return $next($request);
        }        
        return abort(404);    
    }
}
