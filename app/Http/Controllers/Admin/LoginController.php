<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        if($request->method() == 'POST'){
            //验证器
            $request->validate([
                'username' => 'required|max:16|min:3',
                'password' => 'required|max:16|min:6',
            ]);
            return '管理员登录成功';
        }else if(Session::get('errors')){
            //输出报错信息
            return Session::get('errors');
        }

        return view('Admin/login');
    }
}
