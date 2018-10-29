<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2018/10/29
 * Time: 下午1:39
 */

Route::group(['middleware' => []], function () {
    Route::get('/', 'MallController@index')->name('mall.home');
});
