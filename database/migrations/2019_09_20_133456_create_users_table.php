<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('admin')->create('tb_users', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name',500);
            $table->string('user_name',30)->unique();
            $table->string('email',250);
            $table->unsignedInteger('role_id')->nullable();
            // $table->foreign('role_id')->references('id')->on('tb_roles')->onDelete('SET NULL');
            $table->unsignedInteger('agent_id')->nullable();
            // $table->foreign('agent_id')->references('id')->on('tb_agents')->onDelete('SET NULL');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::connection('admin')->dropIfExists('users');
    }
}
