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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/book', 'BookController');
Route::resource('/graph', 'GraphController');
Route::resource('/chart', 'ChartController');
Route::post('/graphtest', 'GraphController@graphdisplay');

#types addition
Route::resource('/typesadd', 'TypesadditionController');
Route::post('/typesadd/addnew', 'TypesadditionController@store');
Route::post('/typesadd/{type_id}/edit', 'TypesadditionController@edit');
Route::post('/typesadd/{type_id}/update', 'TypesadditionController@update');
Route::get('/typesadd/{type_id}/delete', 'TypesadditionController@destroy');

#types calendar
Route::resource('/typescal', 'TypescalendarController');

