<?php

namespace App\Models\Travel;

use App\Models\Master\Agent;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'tb_cashes';
    protected $fillable = [
        'id', 'limit_bal', 'os_bal','agent_id'
    ];
    public function agent()
        {
            # code...
            return $this->belongsTo(Agent::class);
        }
}
