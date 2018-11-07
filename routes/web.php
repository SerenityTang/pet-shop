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

require __DIR__ . '/web/admin.php';
require __DIR__ . '/web/auth.php';
require __DIR__ . '/web/mall.php';

/*Route::group(['domain' => '{www}.imoop.com'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/', function () {
        return view('pc.main_home');
    });
});*/

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
