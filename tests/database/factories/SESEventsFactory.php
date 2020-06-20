<?php

use \Faker\Generator;
use Narwanimonish\SESEvents\Models\SESEvent;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(SESEvent::class, function (Generator $faker) {
    return [
        'message_id' => $faker->uuid,
        'event_type' => $faker->randomElement(config('ses-events.types')),
        'from_email' => $faker->email,
        'to_email' => $faker->email,
        'subject' => $faker->realText(50),
    ];
});
