<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Relationship
        DB::table('tb_item')->insert([
            'item_item' => 'M',
            'item_tabl' => 'TV403',
            'short_desc' => 'Male',
            'long_desc'=>'Male'
        ]);
        DB::table('tb_item')->insert([
            'item_item' => 'F',
            'item_tabl' => 'TV403',
            'short_desc' => 'Female',
            'long_desc'=>'Female'
        ]);
        
        
    }
}
