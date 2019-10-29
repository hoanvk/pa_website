<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePAPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pa_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('CASCADE');
            $table->unsignedInteger('period_id')->nullable();
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('SET NULL');
            $table->decimal('amount',18);
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
        Schema::dropIfExists('pa_prices');
    }
}
