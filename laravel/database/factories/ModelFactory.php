<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Room::class, function (Faker\Generator $faker) {

	$arr = array('朝南','朝北','朝东','朝西');
    return [
        'hotel_id' => rand(1,99),
        'room_type_id'=>rand(1,15),
        'room_floor' => rand(1,4),
        'room_dicection' => $arr[rand(0,3)],
        'room_number'=>rand(1,4).rand(100,999)
    ];
});

$factory->define(App\Models\HotelRoomType::class, function (Faker\Generator $faker) {
    return [
        'hotel_room_type_id'=>rand(1,15),
        'hotel_id'=>rand(1,100)
    ];
});
