<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('discounts_id');
            $table->Integer('hotel_id')->comment("酒店id");
            $table->Integer('discounts_num')->comment("打折多少");
            $table->Integer('region_id')->comment("城市id");
            $table->tinyInteger('sort')->comment("排序");
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
        Schema::drop('discounts');
    }
}
