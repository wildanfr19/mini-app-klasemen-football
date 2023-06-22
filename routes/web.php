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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/klub/create', 'KlubController@create')->name('klub.create');
Route::post('/klub/store','KlubController@store')->name('klub.store');

Route::get('/skor/create','SkorController@create')->name('skor.create');
Route::get('/skor/create/multiple','SkorController@createMult')->name('skor.create.mult');
Route::post('/skor/store', 'SkorController@store')->name('skor.store');
Route::post('/skor/store/multiple', 'SkorController@storeMult')->name('skor.store.multiple');
Route::get('/klasemen', 'HomeController@klasemen')->name('klasemen');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
