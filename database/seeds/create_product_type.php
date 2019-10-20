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
        DB::table('tb_item')->insert([
            'item_item' => 'PA',
            'item_tabl' => 'TV407',
            'short_desc' => 'PA',
            'long_desc'=>'Personal Accident'
        ]);
        DB::table('tb_item')->insert([
            'item_item' => '2',
            'item_tabl' => 'TV407',
            'short_desc' => 'TVL',
            'long_desc'=>'Travel'
        ]);
    }
}
