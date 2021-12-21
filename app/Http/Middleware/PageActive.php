<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class PageActive extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request , Closure $next){
        if (!env('ACTIVE_KEY')){
            return response()->json(['error' => 'Page is not ready.'], 401);
        }
        return  $next($request);
    }
}
