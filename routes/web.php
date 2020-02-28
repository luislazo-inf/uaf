<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Output\Output;

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

Route::get('formulario','formularioController@index');

Route::post('formularioAgregar','formularioController@store');
Route::get('formu', 'formularioController@index1');
Route::get('formularioMostrar', 'formularioController@store1');
Route::post('formularioGuardar','formularioController@guardar');

Route::get('mantenedor','mantenedorController@index');
Route::get('/tasks', 'mantenedorController@getTabla')->name('datatable.tasks');
Route::get('imprimirpdf', 'mantenedorController@datos');
