<?php

use Illuminate\Database\Seeder;

class create_multi_langs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('admin')->table('tb_items')->insert([
            'item_item' => 'vi',
            'item_tabl' => 'TV410',
            'short_desc' => 'Vietnamese',
            'long_desc'=>'Vietnamese'
        ]);
        DB::connection('admin')->table('tb_items')->insert([
            'item_item' => 'en',
            'item_tabl' => 'TV410',
            'short_desc' => 'English',
            'long_desc'=>'English'
        ]);
        DB::connection('admin')->table('tb_items')->insert([
            'item_item' => 'jp',
            'item_tabl' => 'TV410',
            'short_desc' => 'Japanese',
            'long_desc'=>'Japanese'
        ]);
    }
}
