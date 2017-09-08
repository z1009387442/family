<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailedTable extends Migration
{
    /**
     * Run the migrations.
     *detailed_id  user_id goods_id goods_price   status(默认0  使用状态)
     * @return void
     */
    public function up()
    {
         Schema::create('detailed', function (Blueprint $table) {
            $table->increments('detailed_id');          
            $table->Integer('goods_id')->comment('兑换券id');
            $table->Integer('user_id')->comment('所属用户id');
            $table->Integer('goods_price')->comment('所消耗积分');
            $table->tinyInteger('status')->default('0')->comment('使用状态');      
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
         Schema::drop('detailed');
    }
}
