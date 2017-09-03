<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_type', function (Blueprint $table) {
            $table->increments('room_type_id');
            $table->string('room_type_name',30);
            $table->string('bed_type',20);
            $table->Integer('max_people');
            $table->Integer('room_area');
            $table->decimal('rack_price',5,2);
            $table->decimal('vip_price',5,2);
            $table->string('room_desc',200);
            $table->Integer('sort');
            $table->tinyInteger('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rooms_type');
    }
}
