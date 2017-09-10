<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
         Schema::create('brand', function (Blueprint $table) {
            $table->increments('brand_id');
            $table->string('brand_name',60)->comment('品牌名称');
            $table->tinyInteger('status')->default('1')->comment('状态 默认1');
            $table->Integer('sort')->comment('排序 50');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('brand');
    }
}
