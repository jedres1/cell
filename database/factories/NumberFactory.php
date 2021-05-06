<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Number;
use Faker\Generator as Faker;

$factory->define(Number::class, function (Faker $faker) {
    return [
        'number'=> $faker->unique()->phoneNumber(),
        'company_name'=>$faker->numberBetween(1,3),
        'status'=> 2
    ];
});
