<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTypeAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_type_album', function (Blueprint $table) {
            $table->increments('album_id');
            $table->Integer('hotel_id')->comment('所属酒店id');
            $table->Integer('room_type_id')->comment('所属类型id');
            $table->string('img_path',100)->comment('图片路径');
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
         Schema::drop('rooms_type_album');
    }
}
