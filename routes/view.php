<?php
/**
 * Created by PhpStorm.
 * User: msp
 * Date: 2018/12/19
 * Time: 下午5:41
 */

//view方法传参
Route::get('view',function (){
    return view('view.index',['name'=>'msp','sex'=>'男']);
});

//with方法传参
Route::get('with2','View\TestController@with2');