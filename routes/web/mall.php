<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2018/10/29
 * Time: 下午1:39
 */

/*Route::group(['domain' => '{mall}.imoop.com', 'namespace' => 'Mall'],function () {
    Route::get('/', 'MallController@index')->name('mall.home');
});*/

require __DIR__ . '/auth.php';
require __DIR__ . '/user.php';

Route::get('/', 'MallController@index')->name('home');

Route::group(['namespace' => '\User', 'prefix' => 'user'], function () {
    Route::get('/index', 'UserController@index')->name('user.index');
    Route::get('/address', 'UserAddressController@index')->name('user.address');
});