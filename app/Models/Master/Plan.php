<?php

namespace App\Models\Master;

use App\Models\Master\Product;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Plan extends Model
{
    //
    use HasTranslations;
    protected $connection = 'admin';
    protected $table = 'tb_plans';
    protected $fillable = ['id', 'title','name','product_id'];
    public function product()
    {
        # code...
        return $this->belongsTo(Product::class);
    }
    protected $translatable = ['title'];
}
