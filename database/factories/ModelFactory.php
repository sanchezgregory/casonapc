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

use App\Department;
use App\Device;
use App\DeviceStatus;
use App\Status;
use App\User;

$factory->define(User::class, function (Faker\Generator $faker) {

    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'role' => $faker->randomElement(['user','tecnico']),
        'active' => $faker->boolean(),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Device::class, function (Faker\Generator $faker) {
    return [
        'description'   => $faker->sentence,
        'code'        => $faker->countryCode,
        'department_id' => rand(1,5)
    ];
});

$factory->define(Department::class, function (Faker\Generator $faker) {
    return [
        'name'=> $faker->country,
    ];
});

$factory->define(DeviceStatus::class, function(Faker\Generator $faker) {
    return [
        'device_id'     => rand(1,30),
        'usuario_id'    => rand(1,5),
        'status_id'     => rand(1,5)
    ];
});

$factory->define(Status::class, function(Faker\Generator $faker){
    return [
        'name' => $faker->country,

    ];
});
