<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lote;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Lote::class, function (Faker $faker) {
    $code = Str::random(5).$faker->word;
    return [
        'code'=> $faker->shuffle($code),
        'quantity'=>$faker->randomNumber($nbDigits = 4, $strict = false),
        'user_id'=>$faker->numberBetween($min = 1, $max = 3),
        'state'=>'F',
        'date_in'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'date_out'=> $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
