<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if (isset(\Auth::user()->name) && \Auth::user()->name == 'Admin') {
        return $next($request);
        }
        return redirect('home');
    }
}
