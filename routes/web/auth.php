<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2018/11/2
 * Time: 上午10:57
 */

Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');
Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'RegisterController@register');
Route::post('logout', 'LoginController@logout')->name('logout');