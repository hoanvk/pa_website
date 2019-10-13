<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Agent extends Model
{
    //
    protected $table = 'agents';
    protected $fillable = ['id', 'title','name', 'client_no', 'address','taxnum','email'];
    public function policies()
    {
        # code...
        return $this->hasMany('App\Policy', 'agent_id');
    }
    public function cash()
    {
        # code...
        return $this->hasOne('App\Cash', 'agent_id');
    }
    // public function plans()
    // {
    //     # code...
    //     return $this->hasMany('App\AgentPlan', 'agent_id');
    // }
    public static function plans()
    {
        # code...
        return Plan::whereIn('id', function($query){
            $query->select('plan_id')
            ->from(with(new AgentPlan)->getTable())
            ->where('agent_id', optional(Auth::user()->agent)->id)
            ;
        });
    }
}
