<?php

use Illuminate\Database\Seeder;

class create_relationship extends Seeder
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
            'item_item' => '1',
            'item_tabl' => 'TV404',
            'short_desc' => 'Self',
            'long_desc'=>'Self'
        ]);
        DB::table('tb_item')->insert([
            'item_item' => '2',
            'item_tabl' => 'TV404',
            'short_desc' => 'Spouse',
            'long_desc'=>'Spouse'
        ]);
        DB::table('tb_item')->insert([
            'item_item' => '3',
            'item_tabl' => 'TV404',
            'short_desc' => 'Child',
            'long_desc'=>'Child'
        ]);
        
        DB::table('tb_item')->insert([
            'item_item' => '4',
            'item_tabl' => 'TV404',
            'short_desc' => 'Parents',
            'long_desc'=>'Parents'
        ]);
        DB::table('tb_item')->insert([
            'item_item' => '5',
            'item_tabl' => 'TV404',
            'short_desc' => 'Spouse s parents',
            'long_desc'=>'Spouse s parents'
        ]);
        DB::table('tb_item')->insert([
            'item_item' => '6',
            'item_tabl' => 'TV404',
            'short_desc' => 'Group s members',
            'long_desc'=>'Group s members'
        ]);
    }
}
