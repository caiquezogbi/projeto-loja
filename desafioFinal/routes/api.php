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







route::prefix('v1')->namespace('App\Http\Controllers\Api')->group(function () {


    route::get('/search', 'ProdutoSearchController@index')->name('search'); //rota de pesquisa por nome



    route::name('lista_produtos')->group(function () {


        route::get('/produtos', 'ProdutoController@index');
        route::post('/produtos', 'ProdutoController@store');
        route::put('/produtos/{id}', 'ProdutoController@update');
        route::delete('/produtos/{id}', 'ProdutoController@delete');


        //route::resource('produtos', 'ProdutoController');    //rota padrao do ProdutoController de get,post,put e delete
    });
});
