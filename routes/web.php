<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('aset');
});

Route::get('/aset', 'AsetController@index')->name('aset');
Route::get('/aset/detail/{id}', 'AsetController@detail');
Route::get('/aset/edit/{id}', 'AsetController@edit');
Route::post('/aset/store','AsetController@store')->name('aset.store');
Route::post('/aset/update/{id}', 'AsetController@update');
Route::get('/aset/delete/{id}', 'AsetController@delete');