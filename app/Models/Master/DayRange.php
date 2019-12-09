<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class DayRange extends Model
{
    //
    protected $connection = 'admin';
    protected $table = 'day_ranges';
    protected $fillable = ['id', 'title','day_from', 'day_to'];
}
