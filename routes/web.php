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
    return view('index');
});

Route::get('articulos/{articulo}/aVenta', 'ArticuloController@aVenta')->name('articulos.aVenta');
Route::resource('vendedors', 'VendedorController');
Route::resource('categorias', 'CategoriaController');
Route::resource('articulos', 'ArticuloController');
Route::post('venta', 'ArticuloController@anadirVenta')->name('articulos.anadirVenta');
