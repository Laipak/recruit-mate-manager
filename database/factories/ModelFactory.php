<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Applicant::class, function (Faker\Generator $faker) {
    $courses = Config::get('hook.courses');

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'gender' => $faker->randomElement(['M', 'F']),
        'nationality' => $faker->country,
        'nric' => $faker->creditCardNumber,
        'dob' => $faker->date(),
        'mobile' => $faker->phoneNumber,
        'address_line_1' => $faker->streetAddress,
        'address_line_2' => $faker->city,
        'postal' => $faker->postcode,
        'address_country' => $faker->country,
        'english_proficiency' => $faker->randomElement(['None', 'IELTS', 'Other']),
        'course_type' => $faker->randomElement(['Full time', 'Part time']),
        'gpa' => $faker->randomFloat(2, 0, 4),
        'expected_start_date' => $faker->date(),
        'course_of_interest_1' => $courses['accounting, banking and finance'][array_rand([0,1,2,3,4,5], 1)],
        'course_of_interest_2' => $courses['business and management'][array_rand([0,1,2,3,4,5], 1)],
        'course_of_interest_3' => $courses['hospitality and tourism management'][array_rand([0,1,2,3,4,5], 1)],
        'device_name' => $faker->userName,
        'is_emailed' => $faker->boolean,
    ];
});
