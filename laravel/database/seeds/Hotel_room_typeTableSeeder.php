<?php

use Illuminate\Database\Seeder;
use App\Models\Hoteltype;
class Hotel_room_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hoteltype::create([
        	'hotel_room_type_id'=>2,
        	'hotel_id'=>1
        	]);
    }
}
