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

Route::get('/users/create', 'UserController@create');
Route::post('/users', 'UserController@store');

Route::get('/connexion', function () {
    return view('connexion');
});

Route::get('/introduction', function () {
    return view('introduction');
});

Route::get('/choixPerso', function () {
    return view('choixPerso');
});

Route::get('/histoireTuto', function () {
    return view('histoireTuto');
});
