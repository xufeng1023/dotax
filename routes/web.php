<?php

Auth::routes();

Route::get('/{any?}', 'HomeController@index')->name('home')->where('any', '.*');
Route::get('/see/fields', 'HomeController@fields');
Route::post('/userTax', 'HomeController@save')->name('save');

Route::post('/8843', 'HomeController@generate8843')->name('8843pdf');
