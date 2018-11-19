<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2018/11/17
 * Time: 下午5:51
 */

Route::group(['namespace' => '\User', 'prefix' => 'user'], function (){
    Route::get('activate/email', 'UserController@activateEmail');
});
