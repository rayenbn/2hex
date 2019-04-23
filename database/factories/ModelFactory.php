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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\Auth\User\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Post::class, function (Faker\Generator $faker) {
	$title = $faker->sentence;
    return [
    	'title' => $title,
    	'slug' => str_slug($title),
    	'user_id' => function() { 
    		return factory(\App\Models\Auth\User\User::class)->create()->id;
    	},
    	'content' => $faker->randomHtml(2,3),
    	'active' => true,
        'image' => $faker->imageUrl(700, 350, 'cats')
    ];
});

