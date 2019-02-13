<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mcuenbanc;
use Illuminate\Support\Facades\Response;

class CuenBancsController extends Controller
{
    var $cacheCuentas;

    public function __construct() {
        $this->cacheCuentas = 'cuenbancs.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuenbancs = cache()->get($this->cacheCuentas, null);

        if (! $cuenbancs) {
            $cuenbancs = mcuenbanc::select('id_cuenbanc','tx_numecuenbanc','tx_desccuenbanc','tx_tipocuenbanc')->get();
            cache()->put($this->cacheCuentas, $cuenbancs,2);    
        }
        
        //$cuenbancs = mcuenbanc::all();

        return response()->json([
            'data'      => $cuenbancs
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objmcuenbanc = mcuenbanc::create([
            'tx_numecuenbanc' => $request->tx_numecuenbanc,
            'tx_desccuenbanc' => $request->tx_desccuenbanc,
            'tx_codicontcuba' => $request->tx_codicontcuba,
            'tx_tipocuenbanc' => $request->tx_tipocuenbanc,
            'tx_tipobanco'    => $request->tx_tipobanco,
            'tx_impucuenta'   => $request->tx_impucuenta,
            'nu_porcimpu'     => $request->nu_porcimpu,
        ]);

        if ($objmcuenbanc) {
            return response()->json([
                'success'     => true,
                'id_cuenbanc' => $objmcuenbanc->id_cuenbanc,
            ], 201);
        } else {
            return response()->json([
                'message' => 'Error al crear la Cuenta Bancaria',
                'errors' => [],
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuenbancs = mcuenbanc::find($id);
        if($cuenbancs){
           return response()->json([
            'data'      => $cuenbancs
            ], 200);  
        }
        else {
             return response()->json([
            'data'      => 'No se hallaron datos para el id '. $id
            ], 404);    
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existeId = mcuenbanc::where('id_cuenbanc', $id)->get();

        $existeNroCuenta = mcuenbanc::where('tx_numecuenbanc',$request->tx_numecuenbanc)
                                     ->where('id_cuenbanc','!=', $id)
                                     ->get();

        if ($existeId && $existeNroCuenta->count()==0) {
            $cuentaBancaria = mcuenbanc::where('id_cuenbanc', $id)->update([
                'tx_numecuenbanc' => $request->tx_numecuenbanc,
                'tx_desccuenbanc' => $request->tx_desccuenbanc,
                'tx_codicontcuba' => $request->tx_codicontcuba,
                'tx_tipocuenbanc' => $request->tx_tipocuenbanc,
                'tx_tipobanco'    => $request->tx_tipobanco,
                'tx_impucuenta'   => $request->tx_impucuenta,
                'nu_porcimpu'     => $request->nu_porcimpu,
            ]);

            if ($cuentaBancaria) {
                return response()->json([
                    'success' => true,
                    'message' => 'La cuenta bancaria [' . $request->tx_numecuenbanc . '] fue actualizada con éxito '. $cuentaBancaria,
                    'errors' => [],
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Error al actualizar la Cuenta Bancaria ' . $cuentaBancaria,
                    'errors' => [$id],
                ], 200);
            }
        } else {
            return response()->json([
                    'message' => 'Errores al crear la Cuenta Bancaria',
                    'errors' => ['El Número de cuenta [' . $request->tx_numecuenbanc . '] ya existe.']
                ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getListaCuentasBancarias(Request $request){
        $length = $request->length != -1 ? $request->length : mcuenbanc::all()->count();
        
        if ($request->search['value'] == '') {
            $pdrFiltrados = mcuenbanc::orderByColumn($request->columnaOrden, $request->ordenDireccion)
                ->count();

            $mPdr = mcuenbanc::orderByColumn($request->columnaOrden, $request->ordenDireccion)
                ->skip($request->start)
                ->take($length)
                ->get();
        } else {

            $pdrFiltrados = mcuenbanc::busquedaGeneral($request->search['value'])
                ->count();
            
            $mPdr = mcuenbanc::busquedaGeneral($request->search['value'])
                ->orderByColumn($request->columnaOrden, $request->ordenDireccion)
                ->skip($request->start)
                ->take($length)
                ->get();
        }

        return response()->json([
            'vista'     => $request->draw,
            'total'     => $length,
            'filtrados' => $pdrFiltrados,
            'data'      => $mPdr
        ], 200);
        
    }
}
