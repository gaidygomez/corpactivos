<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\BankEntity;
use Faker\Generator as Faker;

$factory->define(BankEntity::class, function (Faker $faker) {
    return [
        'name_bank' => 'Bank '.$faker->name(),
        'description' => $faker->text(50),
        'acronym' => $faker->unique()->text(5),
        'balance' => $faker->randomFloat(2, 0)
    ];
});
