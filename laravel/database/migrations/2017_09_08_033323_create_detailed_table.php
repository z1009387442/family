<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('detailed', function (Blueprint $table) {
            $table->increments('detailed_id');
            $table->Integer('user_id');
            $table->Integer('goods_id');
            $table->decimal('goods_price',7);
            $table->tinyInteger('status')->default(0)->comment('0 :使用  1:未使用');
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
