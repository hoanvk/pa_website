<?php

namespace App\Models\Master;

use App\Models\Admin\Plan;
use App\Models\Master\Agent;
use Illuminate\Database\Eloquent\Model;

class AgentPlan extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'tb_agent_plans';
    protected $fillable = [
        'id', 'agent_id', 'plan_id'
    ];
    public function agent()
        {
            # code...
            return $this->belongsTo(Agent::class);
        }

        public function plan()
        {
            # code...
            return $this->belongsTo(Plan::class);
        }
}
