<?php
/**
 * Created by PhpStorm.
 * User: msp
 * Date: 2018/12/24
 * Time: 上午9:27
 */

Route::get('model','Model\MspController@index');

//反向关联
Route::get('role','Model\MspController@role');

//一对多
Route::get('roles','Model\MspController@roles');

//远程一对多
Route::get('with','Model\MspController@with');

//获取器
Route::get('attr','Model\MspController@attr');