<?php

namespace App\Http\Controllers;

use App\Exports\PriceExport;
use Illuminate\Http\Request;

use App\Exports\PolicyExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
    public function prices()
    {
        # code...
        return Excel::download(new PriceExport, 'prices.xlsx');
    }
    public function travel()
    {
        # code...
        $agent =optional(Auth::user()->agent);
        return Excel::download(new PolicyExport($agent->id), 'travel.xlsx');
    }
}
