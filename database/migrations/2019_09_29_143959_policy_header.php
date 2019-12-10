<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PolicyHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tb_policy_header', function (Blueprint $table) {
            // $adminSchema = Schema::connection(null);
            $table->bigIncrements('id');
            $table->unsignedInteger('product_id')->nullable();
            // $table->foreign('product_id')->references('id')->on('tb_products')->onDelete('SET NULL');
            $table->string('quotation_no', 20);
            $table->string('policy_no', 10)->nullable();
            
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedInteger('agent_id')->nullable();
            // $table->foreign('agent_id')->references('id')->on('tb_agents')->onDelete('SET NULL');
            $table->decimal('premium',18,0);                        
            $table->integer('period')->nullable();
            $table->string('status',1);
            $table->string('ref_number',255)->nullable();
            $table->string('promo_code',30)->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            // $table->foreign('customer_id')->references('id')->on('tb_customers')->onDelete('SET NULL');
            $table->timestamps();
        });
        
        Schema::create('tb_travel_risks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('policy_id')->nullable();
            // $table->foreign('policy_id')->references('id')->on('tb_policy_header')->onDelete('SET NULL');
            $table->string('policy_type', 3);                                                           
            $table->decimal('premium',18,0);            
            $table->unsignedInteger('plan_id')->nullable();
            // $table->foreign('plan_id')->references('id')->on('tb_plans')->onDelete('SET NULL');
            $table->unsignedInteger('destination_id')->nullable();
            // $table->foreign('destination_id')->references('id')->on('tb_destinations')->onDelete('SET NULL');
            $table->integer('adult_qty')->nullable(); 
            $table->integer('dependent_qty')->nullable(); 
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
        //
        Schema::dropIfExists('tb_policy_header');
        Schema::dropIfExists('tb_travel_risks');
        
    }
}
