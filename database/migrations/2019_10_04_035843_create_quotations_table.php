<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seq_no_travel', function (Blueprint $table) {
            $table->increments('id');                        
            $table->timestamps();
        });
        DB::update("ALTER TABLE seq_no_travel AUTO_INCREMENT = 68400000;");
        // Schema::create('seq_no_pa', function (Blueprint $table) {
        //     $table->increments('id');                        
        //     $table->timestamps();
        // });
        // DB::update("ALTER TABLE seq_no_pa AUTO_INCREMENT = 88000000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seq_no_travel');
    }
}
