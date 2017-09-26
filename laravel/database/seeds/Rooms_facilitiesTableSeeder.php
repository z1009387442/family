<?php

use Illuminate\Database\Seeder;
use App\Models\RoomsFacilities;
class Rooms_facilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomsFacilities::create([
        	'rooms_facilities_name'=>'有线/卫星电视',
        	'sort'=>50
        	]);
        RoomsFacilities::create([
        	'rooms_facilities_name'=>'电吹风',
        	'sort'=>50
        	]);
        RoomsFacilities::create([
        	'rooms_facilities_name'=>'免费瓶装水',
        	'sort'=>50
        	]);
        RoomsFacilities::create([
        	'rooms_facilities_name'=>'无线WiFi',
        	'sort'=>50
        	]);
        RoomsFacilities::create([
        	'rooms_facilities_name'=>'空调',
        	'sort'=>50
        	]);
        RoomsFacilities::create([
        	'rooms_facilities_name'=>'免费茶包',
        	'sort'=>50
        	]);
        RoomsFacilities::create([
        	'rooms_facilities_name'=>'音响',
        	'sort'=>50
        	]);
        RoomsFacilities::create([
        	'rooms_facilities_name'=>'电水壶',
        	'sort'=>50
        	]);
        RoomsFacilities::create([
        	'rooms_facilities_name'=>'冰箱',
        	'sort'=>50
        	]);
        RoomsFacilities::create([
        	'rooms_facilities_name'=>'免费洗漱用品',
        	'sort'=>50
        	]);
        RoomsFacilities::create([
        	'rooms_facilities_name'=>'拖鞋',
        	'sort'=>50
        	]);
    }
}
