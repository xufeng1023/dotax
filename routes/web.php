<?php

Auth::routes();
Route::get('/see/fields', 'HomeController@fields');
Route::get('/{any?}', 'HomeController@index')->name('home')->where('any', '.*');

Route::post('/userTax', 'HomeController@save')->name('save');

Route::post('/8843', 'HomeController@generate8843')->name('8843pdf');
Route::post('/1040nr', 'HomeController@generate1040nr')->name('1040nrpdf');
