<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//测试api  注意：api路由需要携带前缀
Route::get('index',function(){
    return 'hello api';
});

//路由是惰性匹配 先后顺序
//定义资源路由 资源控制器的方法不会受于路由控制
Route::resource('index2','Api\V1\UserController');

//分组
Route::group(['prefix'=>'v1','namespace'=>'Api\V1'],function(){
    Route::resource('user','UserController');
    Route::resource('user/{create}','UserController');
});