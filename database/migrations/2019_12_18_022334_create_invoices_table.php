<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('policy_id');
            $table->string('inv_name',250);
            $table->string('inv_taxcode',50);
            $table->text('inv_address');  
            $table->string('policy_no',10)->nullable();            
            $table->string('invoice_no',10)->nullable();
            $table->string('inv_series',10)->nullable();
            $table->string('inv_type',10)->nullable();
            $table->unsignedInteger('inv_rate')->nullable();            
            $table->decimal('premium',18)->nullable();
            $table->decimal('vat_amt',18)->nullable();
            $table->decimal('total_amt',18)->nullable();
            $table->string('policy_type',10)->nullable();
            $table->string('currency',3)->default('VND');
            $table->decimal('crate',18)->default(1);
            $table->string('in_words',1000)->nullable();
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
        Schema::dropIfExists('tb_invoices');
    }
}
