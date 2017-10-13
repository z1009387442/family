<?php

use Illuminate\Database\Seeder;
use App\Models\HotelRoomType;
class Hotel_room_typeTableSeeder extends Seeder
{
    /**
     * 填充酒店与客房类型关联数据
     *
     * @return void
     */
    public function run()
    {
        factory(HotelRoomType::class,1000)->create();
    }
}
