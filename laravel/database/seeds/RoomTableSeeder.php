<?php

use Illuminate\Database\Seeder;
use App\Models\Room as Room;
class RoomTableSeeder extends Seeder
{
    /**
     * 填充房间数据
     *
     * @return void
     */
    public function run()
    {
    	factory(Room::class,50000)->create();
    }
}
