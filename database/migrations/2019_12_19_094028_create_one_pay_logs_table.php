<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnePayLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('tb_payment_logs', function (Blueprint $table) {
            $table->bigIncrements('id');                     
            $table->unsignedInteger('policy_id');
            $table->text('request_url')->nullable();
            $table->text('response_url')->nullable();
            $table->decimal('amount',18); 
            $table->string('payment_no',40)->nullable();
            $table->string('tran_status',3)->nullable();
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
        Schema::dropIfExists('tb_payment_logs');
     
    }
}
