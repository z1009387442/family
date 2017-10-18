<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_name',20);
            $table->string('user_pwd',50);
            $table->string('email',60);
            $table->string('tel',11);
            $table->string('img',50);
            $table->integer('integral')->default(0)->comment("积分");
            $table->decimal('balance', 8, 2)->default(0)->comment("余额");
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
        Schema::drop('user');
    }
}
