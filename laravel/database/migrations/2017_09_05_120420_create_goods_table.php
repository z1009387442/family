<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('goods_id');
            $table->string('goods_name',60)->comment('商品名称');
            $table->Integer('goods_price')->comment('需要商品积分');
            $table->string('goods_desc',100)->comment('商品名称');
            $table->string('goods_img',100)->comment('商品图片');
            $table->string('use_of',100)->comment('抵用券范围如0-200');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
               Schema::drop('goods');
    }
}
