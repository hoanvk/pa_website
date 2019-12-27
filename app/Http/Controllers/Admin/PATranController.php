<?php

namespace App\Http\Controllers\Admin;

use App\Models\PA\PARisk;
use App\Models\Master\Plan;
use Illuminate\Http\Request;
use App\Models\Master\Period;
use App\Models\Common\PolicyHeader;
use App\Http\Controllers\Controller;

class PATranController extends Controller
{
    //
    public function index()
    {
        $model = PolicyHeader::where('status','>=',5)->latest()->paginate(15);
        $plans = Plan::all();
        $periods = Period::all();
        $risk = PARisk::where('policy_id','=',$model->id)->first();
        return view('patrans.index')->with(['model'=>$model, 'plans'=>$plans, 'periods'=>$periods,'risk'=>$risk,
            'i' => (request()->input('page', 1) - 1) * 10]);
    }
}
