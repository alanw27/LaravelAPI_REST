<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace("API")->name("api.")->group(function(){
    Route::get("/tipo_operacao", "TipoOperacaoController@index")->name("tipo_operacao");
    Route::get("/conta/{agencia}/{nconta}", "ContaController@index")->name("conta_index");

    Route::post("/operacao", "OperacaoController@salvar")->name("operacao");
    Route::post("/conta", "ContaController@salvar")->name("conta");
});