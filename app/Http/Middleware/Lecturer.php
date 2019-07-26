<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Lecturer
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
            if (Auth::user()->role == 'koordinator' || Auth::user()->role == 'dosen'){
                return $next($request);
            }
            return abort(404);
        } 
        return redirect()->route('login');        
    }
}
