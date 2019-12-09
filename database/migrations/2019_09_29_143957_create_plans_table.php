<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('admin')->create('tb_plans', function (Blueprint $table) {
            // $adminSchema = Schema::connection(null);
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->unsignedInteger('product_id');
            // $table->foreign('product_id')->references('id')->on('tb_products')->onDelete('CASCADE');
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
        Schema::connection('admin')->dropIfExists('tb_plans');
    }
}
