<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('admin')->create('tb_products', function (Blueprint $table) {
            // $adminSchema = Schema::connection(null);
            $table->increments('id');
            $table->unsignedInteger('agent_id')->nullable();
            // $table->foreign('agent_id')->references('id')->on($adminSchema->getConnection()->getDatabaseName() . '.tb_agents')->onDelete('SET NULL');
            $table->text('title',1000);
            $table->string('name', 50);
            $table->string('product_type',3)->nullable();
            $table->string('premium_formula', 3)->nullable();
            $table->unsignedInteger('tax_rate')->default(0);
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
        Schema::connection('admin')->dropIfExists('tb_products');
    }
}
