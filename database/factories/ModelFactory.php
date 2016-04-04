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
$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'full_name' => $faker->name,
        'email' => $faker->safeEmail,
    ];
});

$factory->define(App\Type::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement([
            'Altbier', 'Amber Ale', 'Barley wine', 'Berliner weisse', 'Bière de Garde', 'Bitter',
            'Blonde Ale', 'Bock', 'Brown Ale', 'California Common', 'Cream Ale', 'Dortmunder Export',
            'Doppelbock', 'Dunkel', 'Dunkelweizen', 'Eisbock', 'Flanders Red Ale', 'Golden Ale',
            'Gose', 'Gueuze', 'Hefeweizen', 'Helles', 'India Pale Ale', 'Kolsch', 'Lambic',
            'Light Ale', 'Maibock', 'Malt Liquor', 'Mild', 'Oktoberfestbier', 'Old Ale', 'Oud Bruin',
            'Pale Ale', 'Pilsener', 'Porter', 'Red Ale', 'Red Ale', 'Roggenbier', 'Saison', 'Scotch Ale',
            'Stout', 'Schwarzbier', 'Vienna Lager', 'Witbier', 'Weissbier', 'Weizenbock'
        ])
    ];
});

$factory->define(App\Beer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(10),
        'client_id' => $faker->numberBetween(1, 10),
        'type_id' => $faker->numberBetween(1, 50),
        'created_at' => $faker->dateTimeBetween('-6 months', 'now')
    ];
});