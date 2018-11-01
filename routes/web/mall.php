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

Route::get('/', 'MallController@index')->name('mall.home');
