<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Beneficiary;
use Faker\Generator as Faker;

$factory->define(Beneficiary::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'gender' => $faker->randomElement(['Male','Female']),
        'phone_number' => $faker->phoneNumber,
        'national_id_number' => $faker->randomNumber($nbDigits = 8, $strict = false) ,
        'mother_name' => $faker->name('female'),
        'martial_status' => $faker->randomElement(['Single','Married','Divorced']),
        'employment_status' => $faker->randomElement([1,0]),
        'monthly_income' => $faker->randomFloat($nbMaxDecimals = 2, $min = 500, $max = 2000),
        'beneficiary_photo' => $faker->imageUrl($width = 500, $height = 500)
    ];
});
