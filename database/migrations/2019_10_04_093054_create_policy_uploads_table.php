<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_policy_uploads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('agent_id');
            // $table->foreign('agent_id')->references('id')->on('tb_agents')->onDelete('CASCADE');
            $table->integer('master_id');
            $table->string('name',255);
            $table->string('passport_no',30);
            $table->dateTime('issue_date');
            $table->string('issue_place',50);
            $table->string('occupation',100);
            $table->string('position',100);
            $table->dateTime('dob');
            $table->integer('age');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('destination', 255);
            $table->string('area', 50);
            $table->integer('days');
            $table->string('plan',50);
            $table->text('remarks');
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
        Schema::dropIfExists('tb_policy_uploads');
    }
}
