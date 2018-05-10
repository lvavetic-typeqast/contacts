<?php

use Faker\Generator as Faker;
use App\Model\Contact;

//contact faker

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->email,
        'is_favorite' => ($faker->boolean(20) ? 1 : null),
    ];
});