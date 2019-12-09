<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('admin')->create('day_ranges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->integer('day_from');
            $table->integer('day_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('admin')->dropIfExists('day_ranges');
    }
}
