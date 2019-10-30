<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Product extends Model
{
    //
    use HasTranslations;
    protected $table = 'products';
    protected $fillable = ['id', 'title','name','product_type','agent_id'];
    public function benefits()
    {
        # code...
        return $this->hasMany('App\Benefit');
        
    }
    public function agent()
    {
        # code...
        return $this->belongsTo('App\Agent');
    }
    protected $translatable = ['title'];
}
