<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_album', function (Blueprint $table) {
            $table->increments('hotel_album_id');
            $table->Integer('hotel_id')->comment('所属酒店id');
            $table->string('hotel_img',100)->comment('酒店内部图片');
            $table->Integer('sort')->comment('排序');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('hotel_album');
    }
}
