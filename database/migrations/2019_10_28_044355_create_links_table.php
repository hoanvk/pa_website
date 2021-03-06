<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('admin')->create('tb_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',10)->unique();
            $table->string('route',50);
            $table->string('title',500);
            $table->string('active',10)->nullable();
            $table->string('status',1)->nullable();
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
        Schema::connection('admin')->dropIfExists('tb_links');
    }
}
