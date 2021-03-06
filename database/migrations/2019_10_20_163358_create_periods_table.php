<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('admin')->create('tb_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            // $table->foreign('product_id')->references('id')->on('tb_products')->onDelete('CASCADE');
            $table->text('title',1000)->nullable();
            $table->string('name',50)->nullable();
            $table->unsignedInteger('qty');
            $table->string('unit',2)->nullable();
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
        Schema::connection('admin')->dropIfExists('tb_periods');
    }
}
