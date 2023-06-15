<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Provider;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    $name = $faker->realText(rand(20, 30));
    return [
        'name' => $name,
        'content' => $faker->realText(rand(150, 200)),
        'slug' => Str::slug($name),
    ];
});