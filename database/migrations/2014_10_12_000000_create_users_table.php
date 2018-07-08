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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cms_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('register_token');
            $table->timestamp('register_token_expired')->useCurrent();
            $table->integer('avail_flg')->default(0);
            $table->integer('role_id')->default(2);
            $table->integer('system_id');
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
        Schema::dropIfExists('users');
    }
}
