<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Query\Expression;
class CreateRolesAndPermissionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('admin')->create('tb_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
        Schema::connection('admin')->create('tb_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->timestamps();
        });
        Schema::connection('admin')->create('tb_role_permission', function (Blueprint $table) {
            // $database = DB::connection("admin")->getDatabaseName();
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            // $table->foreign('role_id')->references('id')->on(new Expression($database . '.tb_roles'))->onDelete('CASCADE');
            $table->integer('permission_id')->unsigned();
            // $table->foreign('permission_id')->references('id')->on(new Expression($database . '.tb_permissions'))->onDelete('CASCADE');
            // $table->primary(['role_id','permission_id']);
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
        Schema::connection('admin')->dropIfExists('tb_roles');
        Schema::connection('admin')->dropIfExists('tb_permissions');
        Schema::connection('admin')->dropIfExists('tb_role_permission');
    }
}
