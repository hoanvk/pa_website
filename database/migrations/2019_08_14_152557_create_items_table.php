<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('admin')->create('tb_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_item',5);
            $table->string('item_tabl',5);
            $table->string('short_desc',50);
            $table->text('long_desc');
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
        Schema::connection('admin')->dropIfExists('tb_items');
    }
}
