<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->sentence(3);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'image' => 'posts/book.png',
        'description' => $faker->paragraph(4),
        'price' => $faker->numberBetween(100, 1000)
    ];
});
