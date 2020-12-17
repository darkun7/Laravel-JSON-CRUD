<?php
Route::get('/', 'ArticleController@index')->name('home');
Route::resource('article',"ArticleController");
