<?php

use Faker\Generator as Faker;
use App\Models\NewFeed;

$factory->define(NewFeed::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'url' => $faker->url,
    ];
});
