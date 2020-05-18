<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lote;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Lote::class, function (Faker $faker) {
    $code = Str::random(5).$faker->word;
    return [
        'code'=> $faker->shuffle($code),
        'quantity_male'=>$faker->randomNumber($nbDigits = 4, $strict = false),
        'quantity_female'=>$faker->randomNumber($nbDigits = 4, $strict = false),
        'losses_male'=>$faker->randomNumber($nbDigits = 2, $strict = false),
        'losses_female'=>$faker->randomNumber($nbDigits = 2, $strict = false),
        'user_id'=>$faker->numberBetween($min = 1, $max = 3)
    ];
});
