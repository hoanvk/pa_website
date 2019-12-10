<?php

use Illuminate\Database\Seeder;

class create_product_type extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::connection('admin')->table('tb_items')->insert([
            'item_item' => 'PA',
            'item_tabl' => 'TV407',
            'short_desc' => 'Personal Accident Insurance',
            'long_desc'=>'Personal Accident Insurance'
        ]);
        DB::connection('admin')->table('tb_items')->insert([
            'item_item' => 'MTT',
            'item_tabl' => 'TV407',
            'short_desc' => 'Motor Insurance',
            'long_desc'=>'Motor Insurance'
        ]);
        DB::connection('admin')->table('tb_items')->insert([
            'item_item' => 'TVL',
            'item_tabl' => 'TV407',
            'short_desc' => 'Travel Insurance',
            'long_desc'=>'Travel Insurance'
        ]);
        
    }
}
