<?php
namespace App;

use DateTime;
use App\Price;

use App\Item;

class SelectList{
    //Trang thai don 1: Pending/2: Issued
    public static function policyStatus()
    {
        return $status = Item::where('item_tabl','=','TV402')->get();
    }  

    //Quan he voi nguoi yeu cau BH
    public static function relationship()
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
    public static function gender()
    {
        return $status = Item::where('item_tabl','=','TV403')->get();
    }
    //Loai hinh don

    public static function policyType()
    {
        return Item::where('item_tabl','=','TV405')->get();
    }

    //Country
    public static function country()
    {
        return Item::where('item_tabl','=','TV406')->get();
    }
}
