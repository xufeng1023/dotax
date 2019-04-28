<?php

Auth::routes();

Route::get('/{any?}', 'HomeController@index')->name('home')->where('any', '.*');

Route::post('/userTax', 'HomeController@save')->name('save');
