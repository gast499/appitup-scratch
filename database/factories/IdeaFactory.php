<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Idea::class, function (Faker $faker) {
    return [
        'platform' => $faker->lastName,
        'title'=> $faker->name
    ];
});
