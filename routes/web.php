<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/imoveis', 'PropertyController@index'); //index é o método que está sendo chamado
Route::get('/imoveis/novo', 'PropertyController@create');
Route::post('/imoveis/store', 'PropertyController@store'); //rota para enviar o formulário de inserção no banco

Route::get('/imoveis/{uri}', 'PropertyController@show');

Route::get('/imoveis/editar/{uri}', 'PropertyController@edit');
Route::put('/imoveis/update/{uri}', 'PropertyController@update');

Route::get('/imoveis/remover/{uri}', 'PropertyController@destroy');
