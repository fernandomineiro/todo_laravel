<?php
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Str;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'image' => $faker->imageUrl(),
        'user_id' => User::factory(),
        'completed' => false,
    ];
});