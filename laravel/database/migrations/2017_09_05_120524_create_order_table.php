<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->smallInteger('user_id');//用户ID
            $table->string('order_sn', 30);//订单号
            $table->string('check_time', 30);//入住时间
            $table->string('end_time', 30);//
            $table->smallInteger('room_num');
            $table->string('resident_people', 100);
            $table->string('cell_phone', 11);       
            $table->tinyInteger('status')->default(0)->comment('是否评价 0未评价 1已评价');
            $table->smallInteger('sort');
            $table->smallInteger('hotel_id');
            $table->smallInteger('room_type_id');
            $table->decimal('total_price',5,2);
            $table->tinyInteger('pay_status')->default('0');//支付状态
            $table->tinyInteger('pay_type')->default('0');//支付方式
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
        Schema::drop('order');
    }
}
