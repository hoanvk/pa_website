<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('admin')->create('tb_agent_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('agent_id');
            // $table->foreign('agent_id')->references('id')->on('tb_agents')->onDelete('CASCADE');
            $table->unsignedInteger('plan_id');
            // $table->foreign('plan_id')->references('id')->on('tb_plans')->onDelete('CASCADE');
            $table->unique(['plan_id', 'agent_id']);
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
        Schema::connection('admin')->dropIfExists('tb_agent_plans');
    }
}
