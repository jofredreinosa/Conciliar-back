<?php

use Illuminate\Database\Seeder;
use App\mcuenbanc;
use App\trlibrbanc;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	echo " ->Creando Cuentas Bancarias aleatorias\n";
        factory(mcuenbanc::class, 10000)->create();
        echo " -> Creando Tipos de Transaccion\n";
        $this->call(tipoTransTableSeeder::class);
        echo " ->Creando 20 Transacciones aleatorias en libro de bancos\n";
        factory(trlibrbanc::class, 10)->create();
        echo " ->Fin del sembrado de tablas\n";
    }
}
