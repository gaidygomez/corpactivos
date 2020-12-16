<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\ColombianBank;
use Faker\Generator as Faker;

$factory->define(ColombianBank::class, function (Faker $faker) {
    return [
        'name' => 'Bank '.$faker->name(),
        'description' => $faker->text(50),
        'acronym' => $faker->unique()->text(5),
        'ban' => $faker->randomNumber(),
        'type' => $faker->randomElement(['a', 'c']),
        'balance' => $faker->randomFloat(2, 0)
    ];
});