<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Customer::class, function (Faker $faker) {
    return [
        'company_id' => factory(\App\Company::class)->create(),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'active' => 1
    ];
});
