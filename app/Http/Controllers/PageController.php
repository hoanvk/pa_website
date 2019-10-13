<?php

namespace App\Http\Controllers;
use App\Agent;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
class PageController extends Controller
{
    //
    public $agent;
    public $user;

    public function __construct(Request $request)
    {
        
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
            if (Auth::check()){
                $this->agent =optional(Auth::user()->agent);
                View::share('agent', $this->agent);
            }
            return $next($request);
        });
        
        
        
    }
}
