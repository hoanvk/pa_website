<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    //
    protected $table = 'cashes';
    protected $fillable = [
        'id', 'limit_bal', 'os_bal','agent_id'
    ];
    public function agent()
        {
            # code...
            return $this->belongsTo('App\Agent');
        }
}
