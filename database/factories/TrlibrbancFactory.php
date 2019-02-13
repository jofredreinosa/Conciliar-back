<?php

use App\mcuenbanc;
use App\mtipotran;
use App\trlibrbanc;


$factory->define(trlibrbanc::class, function (Faker\Generator $faker) {
    $numetran = $faker->randomNumber($nbDigits = NULL, $strict = false);
    $numetran = str_pad($numetran, 10, "0", STR_PAD_LEFT);
    return [
        'id_cuenbanc' => $faker->numberBetween($min=1, $max=mcuenbanc::all()->count()),
        'id_tipotran' => $faker->numberBetween($min=1, $max=mtipotran::all()->count()),
        'fe_fechtran' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'tx_numetran' => $numetran,
        'nu_monttran' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = NULL)
    ];

});



