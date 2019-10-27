<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Benefit extends Model
{
    use HasTranslations;
    //
    protected $table = 'benefits';
    protected $fillable = ['id','title','name','product_id','description'];
    public function product()
    {
        # code...
        return $this->belongsTo('App\Product');
    }
    protected $translatable = ['title','description'];
    
}
