<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\trlibrbanc;
use Illuminate\Support\Facades\Response;

class transaccionesController extends Controller
{
    public function storeTrLibrBanc(Request $request) 
    {
        
        $objtrlibrbanc = trlibrbanc::create([
        	'id_cuenbanc' => 1,
		   	'id_tipotran' => $request->id_tipotran,
		   	'tx_numetran' => $request->tx_numetran,
		   	'fe_fechtran' => $request->fe_fechtran,
			'nu_monttran' => (float) $request->nu_monttran
        ]);

        if ($objtrlibrbanc) {
            return response()->json([
                'success'     => true,
                'id_tipotran' => $objtrlibrbanc->id_trlibrbanc,
            ], 201);
        } else {
            return response()->json([
                'message' => 'Error al crear la Transaccion Bancaria',
                'errors' => [],
            ], 422);
        }
    }
}
