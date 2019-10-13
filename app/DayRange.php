<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayRange extends Model
{
    //
    protected $table = 'day_ranges';
    protected $fillable = ['id', 'title','day_from', 'day_to'];
}
