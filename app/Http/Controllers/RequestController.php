<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class RequestController extends Controller
{
    //设置cookie
    public function setcookie(Request $request){
        //不能这么设置，设置失败
        //$cookie = cookie('username','msp',10);
        //var_dump($cookie);

        //设置cookie需要从响应来设置
        return response('')->cookie('cookie','test',10);
    }

    //获取cookie
    public function getCookie(){
        //return cookie('cookie');
        return request()->cookie('cookie');
    }

    //删除cookie
    public function delCookie(){
        $coo = Cookie::forget('cookie');
        return response('')->cookie($coo);
    }

    //设置session
    public function setSession(){
        session(['pwd'=>'123456','age'=>12]);
        return \request()->session()->put('name','msp');
    }
    //获取session
    public function getSession(){
        //获取所有session
        var_dump(\request()->session()->all());
        var_dump(session('name','这是默认值'));
        var_dump(session('namedsdd','这是默认值'));
    }

    public function delSession(){
        request()->session()->forget('name');
        var_dump(request()->session()->all());
    }
}
