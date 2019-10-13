<?php

use Illuminate\Database\Seeder;

class create_policy_status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_item')->insert([
            'item_item' => 'CHPAI',
            'item_tabl' => 'TV401',
            'short_desc' => '68001000',
            'long_desc'=>'Contract header number'
        ]);
        DB::table('tb_item')->insert([
            'item_item' => '1',
            'item_tabl' => 'TV402',
            'short_desc' => 'Pending',
            'long_desc'=>'Policy pending'
        ]);
        DB::table('tb_item')->insert([
            'item_item' => '2',
            'item_tabl' => 'TV402',
            'short_desc' => 'Issued',
            'long_desc'=>'Policy issued'
        ]);
    }
}
