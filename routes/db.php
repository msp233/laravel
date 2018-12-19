<?php
/**
 * Created by PhpStorm.
 * User: msp
 * Date: 2018/12/19
 * Time: 下午8:05
 */
Route::get('db',function(){
    dd(config());
});
Route::get('con','DbController@index');