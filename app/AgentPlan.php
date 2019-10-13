<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentPlan extends Model
{
    //
    protected $table = 'agent_plans';
    protected $fillable = [
        'id', 'agent_id', 'plan_id'
    ];
    public function agent()
        {
            # code...
            return $this->belongsTo('App\Agent');
        }

        public function plan()
        {
            # code...
            return $this->belongsTo('App\Plan');
        }
}
