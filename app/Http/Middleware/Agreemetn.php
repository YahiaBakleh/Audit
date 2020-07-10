<?php

namespace App\Http\Middleware;

use Closure;

class Agreemetn
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
        if(auth()->user() and auth()->user()->agreement_accepted)
            return $next($request);
        elseif (!auth()->user()){
            return redirect('/login');
        }
        return redirect(route('agreement'));
    }
}
