<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sermon;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Sermon::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'publish_date' => Carbon::now(),
        'stream_key' => $faker->uuid
    ];
});
