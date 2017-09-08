<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegralLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integral_log', function (Blueprint $table) {
            $table->increments('log_id');
            $table->string('action', 200)->default('')->comment('积分操作');
            $table->string('order_sn')->default('')->comment('看不懂死去');
            $table->Integer('num')->default(0)->comment('分值');
            $table->Integer('jj')->comment('加分 1， 减分 2');
            $table->Integer('detailed_id')->default(null)->comment('兑换券ID')->nullable();
            $table->Integer('user_id');
            $table->Integer('create_at')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('integral_log');
    }
}
