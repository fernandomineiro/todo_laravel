<?php

use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Str;

$factory->define(Log::class, function (Faker $faker) {
    return [
        'user_id' => User::factory(),
        'action' => $faker->word,
        'description' => $faker->sentence,
    ];
});