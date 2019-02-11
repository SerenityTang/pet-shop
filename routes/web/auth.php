<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2018/11/2
 * Time: 上午10:57
 */

Route::group(['namespace' => '\Auth'], function (){
    Route::get('login', 'LoginController@showLoginForm')->name('login');                    //登录页面
    Route::post('login', 'LoginController@login');                                          //登录处理
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');    //注册页面
    Route::post('register', 'RegisterController@register');                                 //注册处理
    Route::any('logout', 'LoginController@logout')->name('logout');                        //登出

    Route::get('forgot/password', 'ForgotPasswordController@showForgotPasswordForm')->name('forgot.password');
    Route::post('forgot/password', 'ForgotPasswordController@forgotPassword');
});
