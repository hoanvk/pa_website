<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('admin')->create('tb_travel_prices', function (Blueprint $table) {
            // $adminSchema = Schema::connection(null);
            $table->increments('id');
            $table->unsignedInteger('agent_id');
            // $table->foreign('agent_id')->references('id')->on('tb_agents')->onDelete('CASCADE');
            $table->unsignedInteger('plan_id');
            // $table->foreign('plan_id')->references('id')->on('tb_plans')->onDelete('CASCADE');
            $table->unsignedInteger('destination_id');
            // $table->foreign('destination_id')->references('id')->on('tb_destinations')->onDelete('CASCADE');
            $table->unsignedInteger('day_range_id');
            // $table->foreign('day_range_id')->references('id')->on('tb_day_ranges')->onDelete('CASCADE');
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
        Schema::connection('admin')->dropIfExists('tb_travel_prices');
    }
}
