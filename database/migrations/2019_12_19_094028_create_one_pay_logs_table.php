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
        Schema::create('one_pay_request', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->unsignedInteger('policy_id');
            $table->string('vpc_Command',16)->nullable();
            $table->string('vpc_OrderInfo',34)->nullable();
            $table->string('vpc_Version',2)->nullable();
            $table->string('vpc_MerchTxnRef',40);
            $table->string('vpc_Amount',12);
            $table->string('vpc_Merchant',12)->nullable();
            $table->string('vpc_AccessCode',8)->nullable();
            $table->string('vpc_CurrencyCode',3);                                                                                
            $table->string('vpc_SecureHash',64);
            $table->timestamps();
        });
        Schema::create('one_pay_response', function (Blueprint $table) {
            $table->bigIncrements('id');                     
            $table->unsignedInteger('policy_id');
            $table->string('vpc_Command',16)->nullable();
            $table->string('vpc_OrderInfo',34)->nullable();
            $table->string('vpc_Version',2)->nullable();
            $table->string('vpc_MerchTxnRef',40);
            $table->string('vpc_Merchant',12)->nullable();
            $table->string('vpc_AccessCode',8)->nullable();
            $table->string('vpc_CurrencyCode',3);                        
            $table->string('vpc_Amount',12);
            $table->string('vpc_TxnResponseCode',3)->nullable();
            $table->string('vpc_TransactionNo',12)->nullable();
            $table->string('vcp_Message',200)->nullable();            
            $table->string('vpc_SecureHash',64);
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
        Schema::dropIfExists('one_pay_request');
        Schema::dropIfExists('one_pay_response');
    }
}
