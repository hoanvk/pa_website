<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('admin')->create('tb_cashes', function (Blueprint $table) {
            $adminSchema = Schema::connection(null);
            $table->bigIncrements('id');
            $table->decimal('limit_bal',18,0);
            $table->decimal('os_bal',18,0)->default(0);
            $table->unsignedInteger('agent_id')->unique();
            // $table->foreign('agent_id')->references('id')->on($adminSchema->getConnection()->getDatabaseName() . '.tb_agents')->onDelete('CASCADE');
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
        Schema::connection('admin')->dropIfExists('tb_cashes');
    }
}
