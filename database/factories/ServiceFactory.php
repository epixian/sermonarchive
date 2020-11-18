<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => 'Morning Worship Services (Online)',
        'description' => '',
        'service_date' => Carbon::now(),
        'breeze_id' => '',
    ];
});
