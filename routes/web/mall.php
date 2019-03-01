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

Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'namespace' => '\User'], function () {
    Route::get('/index', 'UserController@index')->name('user.index');


    Route::get('/addresses', 'UserAddressController@index')->name('user.address.index');            //收货地址列表
    Route::post('/address', 'UserAddressController@store')->name('user.address.store');             //收货地址保存
    Route::put('/address/{id}', 'UserAddressController@update')->name('user.address.update');       //收货地址编辑
    Route::put('/default_address/{id}', 'UserAddressController@updateDefault')->name('user.address.destroy');  //收货地址编辑(默认地址设置)
    Route::delete('/address/{id}', 'UserAddressController@destroy')->name('user.address.destroy');  //收货地址删除
});