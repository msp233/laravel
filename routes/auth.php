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