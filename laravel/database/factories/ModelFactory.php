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
    return [
        'hotel_id' => rand(1,99),
        'room_type_id'=>2,
        'room_floor' => 2,
        'room_dicection' => '南',
        'room_number'=>2299
    ];
});
