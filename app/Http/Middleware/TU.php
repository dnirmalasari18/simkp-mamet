<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()){            
            if (Auth::user()->role == 'tendik'){
                return $next($request);
            }
            return abort(404);
        } 
        return redirect()->route('login');
    }
}
