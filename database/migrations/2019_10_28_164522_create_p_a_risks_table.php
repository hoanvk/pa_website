<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePARisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pa_risks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('policy_id')->nullable();
            // $table->foreign('policy_id')->references('id')->on('tb_policy_header')->onDelete('SET NULL');
            $table->decimal('premium',18,0);            
            $table->unsignedInteger('plan_id')->nullable();
            // $table->foreign('plan_id')->references('id')->on('tb_plans')->onDelete('SET NULL');
            $table->unsignedInteger('period_id')->nullable();
            // $table->foreign('period_id')->references('id')->on('tb_periods')->onDelete('SET NULL');
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
        Schema::dropIfExists('tb_pa_risks');
    }
}
