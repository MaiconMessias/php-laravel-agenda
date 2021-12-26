<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\PessoaController@paginaPrincipal');
Route::post('/enviar', 'App\Http\Controllers\PessoaController@enviar');
Route::get('/lista/{campoOrdenacao}', 'App\Http\Controllers\PessoaController@lista');
Route::get('/editar/{id}', 'App\Http\Controllers\PessoaController@editar');
Route::get('/deletar/{id}', 'App\Http\Controllers\PessoaController@deletar');
Route::get('/dados', 'App\Http\Controllers\PessoaController@index');