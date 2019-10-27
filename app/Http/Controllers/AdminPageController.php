<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\SelectList;

use Illuminate\Support\Facades\View;
class AdminPageController extends Controller
{
    //
    public $languages;
    public function __construct(Request $request)
    {
        
          $this->languages = SelectList::languages();
          
         
          View::share(['languages'=> $this->languages]);
          
    }
}
