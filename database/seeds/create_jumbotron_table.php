<?php

use Illuminate\Database\Seeder;

class create_jumbotron_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        

        DB::table('jumbotrons')->insert([
            'name' => 'PA',            
            'title' => '{"en":"Personal Accident Insurance"}',
            'description'=>'{"en":"The Insurers shall indemnify for all bodily injury suffered anywhere in the world caused solely by an Accident and not by sickness, disease or gradual physical or mental wear and tear."}'
        ]);
        DB::table('jumbotrons')->insert([
            'name' => 'MTT',            
            'title' => '{"en":"Motor Insurance"}',
            'description'=>'{"en":"Our Motor Insurance plans cover your vehicles against accidental damage, theft and liabilities towards third parties. We offer a selection of covers to suit your needs and budget, including compulsory third party liability insurance as required by the regulation."}'
        ]);
        DB::table('jumbotrons')->insert([
            'name' => 'TVL',            
            'title' => '{"en":"Travel Insurance"}',
            'description'=>'{"en":"Flight delays, loss of baggage, loss of personal money, accidents and sickness are common predicaments that travellers experience. That’s why we provide you with convenient travel protection plans to let you enjoy your business trip or holiday more."}'
        ]);
    }
}
