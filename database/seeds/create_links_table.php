<?php

use Illuminate\Database\Seeder;

class create_links_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('links')->insert([
            'name' => 'PA',            
            'route' => 'pa.index',
            'title'=>'{"en":"Personal Accident Insurance'
        ]);
        DB::table('links')->insert([
            'name' => 'MTT',            
            'route' => 'pa.index',
            'title'=>'{"en":"Motor Insurance'
        ]);
        DB::table('links')->insert([
            'name' => 'TVL',            
            'route' => 'travel.index',
            'title'=>'{"en":"Travel Insurance'
        ]);
    }
}
