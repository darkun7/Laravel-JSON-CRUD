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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::get('/', 'ArticleController@index')->name('home');
Route::resource('article',"ArticleController");
// Route::group(['as' => 'article.' , 'prefix' => 'website'], function () {
//     Route::post('/', 'ArticleController@update')->name('update'); #store new data to db
// });
