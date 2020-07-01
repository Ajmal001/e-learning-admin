<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class authAdmin
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
        if(Auth::User()->role == 2)
        {
            return $next($request);
        }
    }
}
