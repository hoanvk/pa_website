<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Product extends Model
{
    //
    protected $connection = 'admin';
    use HasTranslations;
    protected $table = 'tb_products';
    protected $fillable = ['id', 'title','name','product_type','agent_id','tax_rate'];
    public function benefits()
    {
        # code...
        return $this->hasMany(Benefit::class);
        
    }
    public function agent()
    {
        # code...
        return $this->belongsTo(Agent::class);
    }
    protected $translatable = ['title'];
}
