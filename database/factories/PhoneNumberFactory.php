<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use App\Model\PhoneNumber;

//phone number faker

$factory->define(PhoneNumber::class, function (Faker $faker) {
    $contact = DB::table('contact')->inRandomOrder()->first(['id']);
    return [
        'contact_id' => $contact->id,
        'label' => $faker->word,
        'number' => $faker->phoneNumber,
    ];
});