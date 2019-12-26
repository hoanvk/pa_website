<?php

namespace App\Http\Controllers;

use App\Imports\PriceImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    //
    public function prices()
    {
       return view('prices.import');
    }
    public function prices_store() 
    {
        Excel::import(new PriceImport,request()->file('file'));
           
        return back();
    }
    public function policy()
    {
       return view('policy.import');
    }
    public function policy_store() 
    {
        $agent =optional(Auth::user()->agent);
        Excel::import(new PolicyImport($agent->id),request()->file('file'));
           
        return back();
    }
}
