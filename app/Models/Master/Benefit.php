<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Benefit extends Model
{
    protected $connection = 'admin';
    use HasTranslations;
    //
    protected $table = 'benefits';
    protected $fillable = ['id','title','name','product_id'];
    public function product()
    {
        # code...
        return $this->belongsTo('App\Models\Master\Product');
    }
    protected $translatable = ['title'];
    
}
