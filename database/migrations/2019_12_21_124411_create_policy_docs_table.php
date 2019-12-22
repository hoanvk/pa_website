<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_policy_docs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->binary('document')->nullable();
            $table->unsignedInteger('policy_id');
            $table->string('doc_type',3);
            $table->string('file_name',150);
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
        Schema::dropIfExists('tb_policy_docs');
    }
}
