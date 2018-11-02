<?php

use Faker\Generator as Faker;
use App\Model\Contact;

//contact faker

$factory->define(Contact::class, function (Faker $faker) {
    $path = 'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'profilephoto';

    $uploadImage = $faker->image($path, 600, 400, null, false);

    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->email,
        'profile_photo' => $uploadImage,
        'is_favorite' => ($faker->boolean(20) ? 1 : null),
    ];
});