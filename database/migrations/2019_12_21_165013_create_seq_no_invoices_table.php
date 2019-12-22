<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeqNoInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seq_no_invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('invoice_no');
            $table->string('inv_type',10);
            $table->string('inv_serie',10);
            $table->string('issuer',10);
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
        Schema::dropIfExists('seq_no_invoice');
    }
}
