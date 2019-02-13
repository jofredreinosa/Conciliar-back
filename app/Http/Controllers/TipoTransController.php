<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mtipotran;
use Illuminate\Support\Facades\Response;

class TipoTransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$tipotrans = mtipotran::all();
        $response = Response::json($tipotrans,200);
        return $response;*/

         return response()->json([
            'data' => mtipotran::all(),
        ], 200);
    }

     public function getTipoTran($id)
    {
        $tipotran = mtipotran::where('id_tipotran',$id)
        ->orWhere('tx_coditipotran',$id)
        ->get();
        if($tipotran->count() > 0) {
	         return response()->json([
	            'data' => $tipotran,
	            'message' => 'OK'
	        ], 200);
        }
        else {
        	 return response()->json([
	            'data' => null,
	            'message' => 'No se hallaron datos para el Tipo de Transacción ' . $id
	        ], 200);
        }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
}
