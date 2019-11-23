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

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('passer/{user}', 'TutoController@passerTuto')->name('passer');


Route::post('personnages', 'PersonnageController@store');

Route::get('personnages/create', 'PersonnageController@create')->name('personnage.create');

Route::get('tuto/introduction', 'TutoController@index')->name('introduction');

Route::get('tuto/tuto1', 'TutoController@tuto1')->name('tuto.tuto1');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
