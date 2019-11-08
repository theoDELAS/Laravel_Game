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

Route::get('/inscription', function () {
    return view('inscription');
});

Route::get('/connexion', function () {
    return view('connexion');
});

Route::get('/miseEnPlace', function () {
    return view('miseEnPlace');
});

Route::get('/choixPerso', function () {
    return view('choixPerso');
});

Route::get('/histoireTuto', function () {
    return view('histoireTuto');
});
