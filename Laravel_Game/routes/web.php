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
Route::get('tuto/introduction', 'TutoController@index')->name('introduction');
Route::get('tuto/page1', 'TutoController@page1')->name('tuto.page1');
Route::get('tuto/page2', 'TutoController@page2')->name('tuto.page2');
Route::post('tuto/getItem', 'PersonnageController@getItem')->name('personnage.getItem');
Route::post('tuto/lancerCombat', 'PersonnageController@lancerCombat')->name('personnage.lancerCombat');


Route::resource('personnage', 'PersonnageController');


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::resource('/users', 'UsersController', ['except' => ['create', 'store']]);
    Route::resource('/classe', 'ClasseController');
    Route::resource('/monstres', 'MonstresController');
    Route::resource('/items', 'ItemsController');
});
