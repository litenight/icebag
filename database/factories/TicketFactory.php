<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use App\Customer;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'customer_id' => create(Customer::class)->id,
        'user_id' => 1,
        'priority_id' => rand(1, 3),
        'subject' => $faker->sentence(4),
        'description' => $faker->paragraph(7),
        'status' => $faker->randomElement(['Open', 'Closed'])
    ];
});
