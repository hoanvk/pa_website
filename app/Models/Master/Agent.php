<?php

namespace App\Models\Master;
use App\User;
use App\Models\PA\Policy;
use App\Models\Master\Plan;
use App\Models\Travel\Cash;
use App\Models\Master\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'tb_agents';
    protected $fillable = ['id', 'title','name', 'client_no', 'address','taxnum','email'];
    public function policies()
    {
        # code...
        return $this->hasMany(Policy::class, 'agent_id');
    }
    public function products()
    {
        # code...
        return $this->hasMany(Product::class, 'product_id');
    }
    public function cash()
    {
        # code...
        return $this->hasOne(Cash::class, 'agent_id');
    }
   
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
