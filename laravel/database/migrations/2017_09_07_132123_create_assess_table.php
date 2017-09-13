<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assess', function (Blueprint $table) {
            $table->increments('assess_id');
            $table->string('assess_desc');//
            $table->Integer('assess_num');
            $table->smallInteger('user_id');
            $table->smallInteger('order_id');
            $table->smallInteger('hotel_id');
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
        Schema::drop('assess');
    }
}
