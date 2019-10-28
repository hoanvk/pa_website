<?php

use Illuminate\Database\Seeder;

class create_benefits_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('benefits')->insert([
            'name' => 'PA',            
            'product_id' => 7,
            'title'=>'{"en":"Personal Accident Insurance"}'
        ]);
        DB::table('benefits')->insert([
            'name' => 'MTT',            
            'product_id' => 7,
            'title'=>'{"en":"Motor Insurance"}'
        ]);
        DB::table('benefits')->insert([
            'name' => 'TVL',            
            'product_id' => 7,
            'title'=>'{"en":"Travel Insurance"}'
        ]);
    }
}
