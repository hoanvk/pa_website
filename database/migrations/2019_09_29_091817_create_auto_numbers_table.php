<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('admin')->create('tb_auto_numbers', function (Blueprint $table) {
            // $adminSchema = Schema::connection(null);
            $table->bigIncrements('id');
            $table->unsignedInteger('product_id');
            // $table->foreign('product_id')->references('id')->on('tb_products')->onDelete('CASCADE');
            $table->integer('start_number')->unsigned();
            $table->integer('end_number')->unsigned();
            $table->integer('last_number')->unsigned();

            $table->timestamps();
        });
    }

    public function boot()
    {
        // $table->unique('table_name');
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('admin')->dropIfExists('tb_auto_numbers');
    }
}
