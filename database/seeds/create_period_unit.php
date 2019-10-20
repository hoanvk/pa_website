<?php

use Illuminate\Database\Seeder;

class create_period_unit extends Seeder
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
            'item_item' => 'DD',
            'item_tabl' => 'TV408',
            'short_desc' => 'Days',
            'long_desc'=>'Days'
        ]);
        DB::table('tb_item')->insert([
            'item_item' => 'MM',
            'item_tabl' => 'TV408',
            'short_desc' => 'Months',
            'long_desc'=>'Months'
        ]);
        DB::table('tb_item')->insert([
            'item_item' => 'YY',
            'item_tabl' => 'TV408',
            'short_desc' => 'Years',
            'long_desc'=>'Years'
        ]);
    }
}
