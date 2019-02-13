<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipoTransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        \DB::table('mtipotrans')->delete();
        
        \DB::table('mtipotrans')->insert(array (
            0 => 
            array (
                'tx_coditipotran' => 'DEP',
                'tx_desctipotran' => 'DEPOSITO',
                'tx_sumaoresta' => '+',
                'tx_estadotiptran' => 'ACTIVO',
            ),
            1 => 
            array (
                'tx_coditipotran' => 'NDD',
                'tx_desctipotran' => 'NOTA DE DEBITO',
                'tx_sumaoresta' => '-',
                'tx_estadotiptran' => 'ACTIVO',
            ),
            2 => 
            array (
                'tx_coditipotran' => 'NDC',
                'tx_desctipotran' => 'NOTA DE CREDITO',
                'tx_sumaoresta' => '+',
                'tx_estadotiptran' => 'ACTIVO',
            ),
            3 => 
            array (
                'tx_coditipotran' => 'CHE',
                'tx_desctipotran' => 'CHEQUE',
                'tx_sumaoresta' => '-',
                'tx_estadotiptran' => 'ACTIVO',
            ),
            4 => 
            array (
                'tx_coditipotran' => 'CHA',
                'tx_desctipotran' => 'CHEQUE ANULADO',
                'tx_sumaoresta' => '+',
                'tx_estadotiptran' => 'ACTIVO',
            ),
            5 => 
            array (
                'tx_coditipotran' => 'TRA',
                'tx_desctipotran' => 'TRANSFERENCIA ELECTRONICA',
                'tx_sumaoresta' => '-',
                'tx_estadotiptran' => 'ACTIVO',
            ),
            5 => 
            array (
                'tx_coditipotran' => 'COM',
                'tx_desctipotran' => 'COMISIONES BANCARIAS',
                'tx_sumaoresta' => '-',
                'tx_estadotiptran' => 'ACTIVO',
            ),

        ));
    }
}
