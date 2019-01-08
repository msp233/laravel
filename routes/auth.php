<?php
/**
 * Created by PhpStorm.
 * User: msp
 * Date: 2019/1/7
 * Time: 下午2:17
 */
Route::get('auth','AuthController@auth');

//自定义认证
Route::post('authentic','AuthController@authentic');

//路由auth认证
Route::get('test3','AuthController@test')->middleware('auth');
Route::get('test4','AuthController@test')->name('test');

//http认证
Route::get('test5','AuthController@basic')->middleware('auth.basic');


//加密 openssl
Route::get('crypt','AuthController@crypt')->name('crypt');
