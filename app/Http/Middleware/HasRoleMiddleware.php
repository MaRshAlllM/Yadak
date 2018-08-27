<?php

namespace App\Http\Middleware;

use Closure;

class HasRoleMiddleware
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

        if(!$request->user()->roles()->get()->isNotEmpty()){
           return redirect()->back();
        }

         return $next($request);


    }
}
