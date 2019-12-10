<?php

use Illuminate\Database\Seeder;

class create_policy_type extends Seeder
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
            'item_item' => 'I',
            'item_tabl' => 'TV405',
            'short_desc' => 'Individual',
            'long_desc'=>'Individual'
        ]);
        DB::connection('admin')->table('tb_items')->insert([
            'item_item' => 'G',
            'item_tabl' => 'TV405',
            'short_desc' => 'Group',
            'long_desc'=>'Group'
        ]);
        DB::connection('admin')->table('tb_items')->insert([
            'item_item' => 'F',
            'item_tabl' => 'TV405',
            'short_desc' => 'Family',
            'long_desc'=>'Family'
        ]);
    }
}
