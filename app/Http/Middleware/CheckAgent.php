<?php

namespace App\Http\Middleware;

use Closure;
use Route;
class CheckAgent
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
        $route = Route::getRoutes()->match($request);
        // echo 'Agent '.implode($route->parameters());
        echo 'Agent '.$route->parameter('id');
        // echo 'Agent '.$request->id;
        // echo 'Agent '.$request->route('id');
        return $next($request);
    }
}
