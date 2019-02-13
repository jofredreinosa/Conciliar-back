<?php

use App\mcuenbanc;


$factory->define(mcuenbanc::class, function (Faker\Generator $faker) {

    $intCodigo = $faker->unique()->numberBetween($min = 101000000, $max = 199000000);

    return [
        'tx_numecuenbanc' => '0' . $intCodigo . '0' . $intCodigo,
        'tx_desccuenbanc' => 'Banco ' . $intCodigo . ' - ' . $intCodigo,
        'tx_codicontcuba' => $intCodigo,
        'tx_tipocuenbanc' => $faker->randomElement(['AHORRO','CORRIENTE']),
        'tx_tipobanco'    => $faker->randomElement(['PUBLICO','PRIVADO']),
        'tx_impucuenta'   => 'NO',
        'nu_porcimpu'     => 0
    ];

});

