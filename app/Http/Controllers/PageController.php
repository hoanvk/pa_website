<?php

namespace App\Http\Controllers;
use App\Link;
use App\User;
use App\Agent;
use App\Jumbotron;
use App\SelectList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    //
    public $agent;
    public $user;
    public $jumbotron;
    public $links;
    public $languages;
    public function __construct(Request $request)
    {
        $action = 'TVL';
          if ($request->is('online/pa*') || $request->is('agent/pa*')) {
            //
            $action ='PA';
          }
          $this->languages = SelectList::languages();
          $this->jumbotron = Jumbotron::where('name','=',$action)->first();
          $this->links = Link::all();
          foreach ($this->links as $link) {
            # code...
            if ($link->name == $action) {
              # code...
              $link->active = 'active';
            }
          }
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
            if (Auth::check()){
                $this->agent =optional(Auth::user()->agent);
                View::share(['agent'=> $this->agent,'jumbotron'=>$this->jumbotron, 
                'languages'=> $this->languages,'links'=> $this->links]);
            }
            return $next($request);
        });
        
        
        
    }
}
