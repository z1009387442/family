<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);//姓名
            $table->string('pwd', 20);//密码
            $table->smallInteger('dept');//所属部门
            $table->smallInteger('position');//职务
            $table->char('tel', 11);//电话
            $table->string('email', 60);//邮箱
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
        Schema::drop('admin');
    }
}
