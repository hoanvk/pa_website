<?php

namespace App\Http\Middleware;

use Closure;
use Route;
class CheckUserOnline
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
        // $route = Route::getRoutes()->match($request);
        $policy_id = $request->route('policy_id');
        if($policy_id){
            if (session('policy_id') != $policy_id) {
                # code...
                return redirect()->route('pa.index',['project'=>1]);
              }
        }
        
        // echo 'Agent '.implode($route->parameters());
        // echo 'Agent '.$route->parameter('id');
        // echo 'Agent '.$request->id;
        // echo 'Agent '.$request->route('id');
        return $next($request);
    }
}
