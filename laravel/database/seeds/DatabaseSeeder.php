<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Hotel_room_typeTableSeeder::class);
        $this->call(RoomTableSeeder::class);
    }
}
