<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->is('*admin*')) {
                return action('AuthAdmin\LoginController@showLoginForm');
            }
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        dd("asd");
        $this->authenticate($guards);

        return $next($request);
    }
}
