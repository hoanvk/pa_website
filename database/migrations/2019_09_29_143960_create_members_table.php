<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('insured_name',250);
            $table->string('insured_id',30);
            $table->dateTime('dob');
            $table->unsignedInteger('age');
            $table->string('naty',50);
            $table->string('ownship',50);
            $table->string('gender',1);            
            $table->unsignedBigInteger('policy_id')->nullable();
            // $table->foreign('policy_id')->references('id')->on('tb_policy_header')->onDelete('SET NULL');
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
        Schema::dropIfExists('tb_members');
    }
}
