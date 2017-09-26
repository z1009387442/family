<?php

use Illuminate\Database\Seeder;
use App\Models\Room as Room;
class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Room::class,52000)->create();
    }
}
