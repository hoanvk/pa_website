<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'nationalities';
    protected $fillable = ['id','ctry_code', 'name'];
}
