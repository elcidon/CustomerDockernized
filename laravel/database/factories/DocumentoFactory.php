<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Documento;
use Faker\Generator as Faker;

$factory->define(Documento::class, function (Faker $faker) {
    return [
        "cpf_cnpj" => rand(1000, 10000)
    ];
});
