<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel', function (Blueprint $table) {
            $table->increments('hotel_id');
            $table->string('hotel_name');
            $table->Integer('region_id');
            $table->Integer('sort');
            $table->string('hotel_img',60);
            $table->string('hotel_address',60);
            $table->string('hotel_tel',30);
            $table->string('hotel_fax',30);
            $table->string('hotel_desc',200);
            $table->string('hotel_hint',200);
            $table->Integer('service_items_id');
            $table->Integer('room_facilities_id');
            $table->tinyInteger('status')->default('0');
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
        Schema::drop('hotel');
    }
}
