<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    //
    protected $table = 'app_settings';
    protected $fillable = ['id','item_tabl', 'short_desc','long_desc','valid_flag'];
}
