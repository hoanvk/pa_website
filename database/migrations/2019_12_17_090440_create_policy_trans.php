<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_policy_trans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('policy_no',10)->nullable();
            $table->dateTime('tran_date');
            $table->string('tran_type',3);
            $table->string('tran_stat',1);
            $table->text('remarks')->nullable();
            $table->unsignedInteger('header_id');
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
        Schema::dropIfExists('tb_policy_trans');
    }
}
