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
        Schema::connection('admin')->create('tb_pa_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            // $table->foreign('product_id')->references('id')->on('tb_products')->onDelete('CASCADE');
            $table->unsignedInteger('plan_id');
            // $table->foreign('plan_id')->references('id')->on('tb_plans')->onDelete('CASCADE');
            $table->unsignedInteger('period_id')->nullable();
            // $table->foreign('period_id')->references('id')->on('tb_periods')->onDelete('SET NULL');
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
        Schema::connection('admin')->dropIfExists('tb_pa_prices');
    }
}
