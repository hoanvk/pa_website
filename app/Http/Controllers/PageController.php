<?php

namespace App\Http\Controllers;
use App\Agent;
use App\User;
use App\SelectList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
class PageController extends Controller
{
    //
    public $agent;
    public $user;
    public $jumbotron;
    public function __construct(Request $request)
    {
        $action = 'TVL';
          if ($request->is('online/pa*') || $request->is('agent/pa*')) {
            //
            $action ='PA';
          }
          
          $this->jumbotron = SelectList::jumbotron($action);
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
            if (Auth::check()){
                $this->agent =optional(Auth::user()->agent);
                View::share(['agent'=> $this->agent,'jumbotron'=>$this->jumbotron]);
            }
            return $next($request);
        });
        
        
        
    }
}
