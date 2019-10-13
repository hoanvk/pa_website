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
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('agent_id');
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('CASCADE');
            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('CASCADE');
            $table->unsignedInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('CASCADE');
            $table->unsignedInteger('day_range_id');
            $table->foreign('day_range_id')->references('id')->on('day_ranges')->onDelete('CASCADE');
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
        Schema::dropIfExists('prices');
    }
}
