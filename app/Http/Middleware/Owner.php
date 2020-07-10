<?php

namespace App\Http\Middleware;

use Closure;

class Owner
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
        if (\Auth::guard('admin')->user()->name == 'admin') {
            return $next($request);
        }        
        
        if (\Auth::guard('admin')->user()->name == 'tester') {
            return $next($request);
        }

        return redirect('/admin');
    }
}
