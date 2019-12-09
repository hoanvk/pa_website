<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'destinations';
    protected $fillable = ['id', 'title','name'];
}
