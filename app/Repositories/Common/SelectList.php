<?php
namespace App\Repositories\Common;

use DateTime;
use App\Models\Master\Item;
use App\Models\Master\Link;
use App\Models\Master\Plan;
use App\Models\Master\Price;
use App\Models\Master\Period;
use App\Models\Master\Product;
use App\Models\Master\Province;
use App\Models\Master\Jumbotron;
use App\Models\Master\Nationality;

class SelectList implements ISelectList{
    //Trang thai don 1: Pending/2: Issued
    public function policyStatus()
    {
        return $status = Item::where('item_tabl','=','TV402')->get();
    }  

    //Quan he voi nguoi yeu cau BH
    public function relationship()
    {
        return $status = Item::where('item_tabl','=','TV404')->get();
    }
    // public static function relationship_item($ownship)
    //     {
    //         # code...
    //         return Item::where('item_tabl','=', 'TV404')
    //             ->where('item_item','=',$ownship)->first();
    //     }
    //Gioi tinh
    public function gender()
    {
        return $status = Item::where('item_tabl','=','TV403')->get();
    }
    //Loai hinh don

    public function policyType()
    {
        return Item::where('item_tabl','=','TV405')->get();
    }

    //Country
    public function country()
    {
        return Nationality::all();
    }

    public function province()
    {
        return Province::all();
    }

    //Product Type
    public function productType()
    {
        return Item::where('item_tabl','=','TV407')->get();
    }
    
    //Period unit
    public function periodUnit()
    {
        return Item::where('item_tabl','=','TV408')->get();
    }
    
    public function languages()
    {
        return Item::where('item_tabl','=','TV410')->get();
    }
    public function productPlan($product_id){
        return Plan::where('product_id','=',$product_id)->orderBy('title')->pluck('title', 'id');
    }
    public function productPeriod($product_id){
        return Period::where('product_id','=',$product_id)->orderBy('title')->pluck('title', 'id');
    }
    public function productLine($line){
        return Product::where('product_type','=',$line)->orderBy('name')->get();
    }
}
