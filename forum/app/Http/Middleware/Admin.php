<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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

        if(!Auth::user()->admin)
        {
            return redirect()->back();
        }
        return $next($request);
    }
}
//after creating a middleware go to kernel.php to register the middleware
//so that we can call it by its short name