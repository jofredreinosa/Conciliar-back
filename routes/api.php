<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'v1' ], function(){
	Route::resource('cuenbancs', 'CuenBancsController');	
	Route::resource('tipotrans', 'TipoTransController');	

	Route::get('tipotran/{id}', 'TipotransController@getTipoTran');

	Route::get('prueba', 'PruebasController@index');
	
	Route::get('cuentas-bancarias','CuenBancsController@getListaCuentasBancarias');

	Route::post('tranlibr','transaccionesController@storeTrLibrBanc');
});
