<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',250)->nullable();
            $table->dateTime('dob');
            $table->string('address',500)->nullable();
            $table->string('status',1);
            $table->unsignedBigInteger('policy_id')->nullable();
            // $table->foreign('policy_id')->references('id')->on('tb_policy_header')->onDelete('SET NULL');
            $table->string('email',100)->nullable();
            $table->string('natlty',50)->nullable();
            $table->string('city',50)->nullable();
            $table->string('gender',1); 
            $table->string('tgram',50)->nullable();
            $table->string('mobile',50)->nullable();
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
        Schema::dropIfExists('tb_customers');
    }
}
